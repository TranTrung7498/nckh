<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;
use App\ProgressReport;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function get(){
        $topic = DB::table('tb_faculty')
            ->join('tb_topic','tb_faculty.id','=','tb_topic.facultyID')
            ->select('tb_topic.id','tb_topic.name','tb_faculty.facultyName','tb_topic.status')
            ->where('status','=','Đang thực hiện')->get()->toArray();
        return view('admin.report.report',['detai'=>$topic]);
    }

    public function add(Request $request){
        $data = $request->id;
        return view('admin.report.add',['id'=>$data]);
    }

    public function post(Request $request){

        $this->validate($request,
            [
                'mainContent' => 'required',
                'result' => 'required',
                'difficulty' => 'required',
                'methods' => 'required',
                'intendTime' => 'required',
            ],

            [
                'required' => ':attribute không được để trống',
            ],

            [
                'mainContent' => 'Trường',
                'result' => 'Trường',
                'difficulty' => 'Trường',
                'methods' => 'Trường',
                'intendTime' => 'Trường',
            ]
        );

        $report = new ProgressReport;
        $report->id = ProgressReport::max('id')+1;
        $report->topicID = $request->topicID;
        $report->mainContent = $request->mainContent;
        $report->result = $request->result;
        $report->difficulty = $request->difficulty;
        $report->method = $request->methods;
        $report->intendTime = $request->intendTime;
        $report->save();

        $topic = Topic::find($request->topicID);
        $topic->status = "Chờ nghiệm thu";
        $topic->save();

        return redirect('admin/home');
    }

    public function detail($id){
        $report = DB::table('tb_progressreport')
            ->join('tb_topic','tb_topic.id','=','tb_progressreport.topicID')
            ->where('tb_progressreport.id','=',$id)
            ->get();
        return view('admin.report.detail',['data'=>$report]);
    }

    public function getdetail(){
        $topic = DB::table('tb_faculty')
            ->join('tb_topic','tb_faculty.id','=','tb_topic.facultyID')
            ->select('tb_topic.id','tb_topic.name','tb_faculty.facultyName','tb_topic.status')
            ->where('status','=','Chờ nghiệm thu')
            ->get()->toArray();
        return view('admin.report.list',["data"=>$topic]);
    }

    public function delete($id){

        $query = DB::table('tb_progressreport')
            ->select('id')
            ->where('topicID','=',$id)
            ->get();
        foreach ($query as $q){
            $report = ProgressReport::find($q->id);
        }
        $report->delete();

        $topics = Topic::find($id);
        $topics->status = "Đang thực hiện";
        $topics->save();
        return redirect('admin/report/getdetail');
    }
}
