<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AcceptanceTopic;
use App\Topic;

class AcceptController extends Controller
{
    public function getlist(){
        $topic = DB::table('tb_faculty')
            ->join('tb_topic','tb_faculty.id','=','tb_topic.facultyID')
            ->select('tb_topic.id','tb_topic.name','tb_faculty.facultyName','tb_topic.status')
            ->where('status','=','Chờ nghiệm thu')->get()->toArray();
        return view('admin.acceptance.list',['detai'=>$topic]);
    }

    public function postaccept(Request $request){
        $data = $request->id;
        return view('admin.acceptance.add',['id'=>$data]);
    }

    public function addaccept(Request $request){

        $this->validate($request,
            [
                'situationScore' => 'required|min:0|max:15',
                'ideaScore' => 'required|min:0|max:15',
                'targetScore' => 'required|min:0|max:10',
                'methodScore' => 'required|min:0|max:10',
                'researchScore' => 'required|min:0|max:40',
                'appearanceScore' => 'required|min:0|max:5',
                'publishScore' => 'required|min:0|max:5',
                'totalScore' => 'required|min:0|max:100',
                'appearanceComment' => 'required',
                'situationComment' => 'required',
                'meaningComment' => 'required',
                'contentComment' => 'required',
                'resultComment' => 'required',
                'conclusion' => 'required',
                'proplem' => 'required',
            ],

            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được nhỏ hơn :min',
                'max' => ':attribute không được lớn hơn :max',
            ],

            [
                'situationScore' => 'Điểm',
                'ideaScore' => 'Điểm',
                'targetScore' => 'Điểm',
                'methodScore' => 'Điểm',
                'researchScore' => 'Điểm',
                'appearanceScore' => 'Điểm',
                'publishScore' => 'Điểm',
                'totalScore' => 'Điểm',
                'appearanceComment' => 'Nhận xét',
                'situationComment' => 'Nhận xét',
                'meaningComment' => 'Nhận xét',
                'contentComment' => 'Nhận xét',
                'resultComment' => 'Nhận xét',
                'conclusion' => 'Nhận xét',
                'proplem' => 'Nhận xét',
            ]
        );

        $accept = new AcceptanceTopic;
        $accept->id = AcceptanceTopic::max('id')+1;
        $accept->topicID = $request->topicID;
        $accept->situationScore = $request->situationScore;
        $accept->ideaScore = $request->ideaScore;
        $accept->targetScore = $request->targetScore;
        $accept->methodScore = $request->methodScore;
        $accept->researchScore = $request->researchScore;
        $accept->appearanceScore = $request->appearanceScore;
        $accept->publishScore = $request->publishScore;
        $accept->totalScore = $request->totalScore;
        $accept->appearanceComment = $request->appearanceComment;
        $accept->situationComment = $request->situationComment;
        $accept->meaningComment = $request->meaningComment;
        $accept->contentComment = $request->contentComment;
        $accept->resultComment = $request->resultComment;
        $accept->conclusion = $request->conclusion;
        $accept->proplem = $request->proplem;
        $accept->date = date('Y-m-d');
        $accept->save();

        $topic = Topic::find($request->topicID);
        $temp = (int)$request->totalScore;
        if ($temp >= 90 && $temp <=100){
            $topic->rating = 'Xuất sắc';
        }
        elseif ($temp >= 80 && $temp <=89){
            $topic->rating = 'Tốt';
        }
        elseif ($temp >= 70 && $temp <=79){
            $topic->rating = 'Khá';
        }
        elseif ($temp >= 50 && $temp <=69){
            $topic->rating = 'Đạt';
        }
        else {
            $topic->rating = 'Không đạt';
        }
        $topic->status = "Đã nghiệm thu";
        $topic->save();

        return redirect('admin/accept/');
    }

    public function listupdate(){
        $temp = DB::table('tb_acceptancetopic')->join('tb_topic','tb_topic.id','=','tb_acceptancetopic.topicID')
            ->select('tb_topic.name', 'tb_topic.status', 'tb_acceptancetopic.id','tb_topic.rating')
            ->where('tb_topic.status','=','Đã nghiệm thu')->get()->toArray();
        return view('admin.acceptance.update',['danhsach'=>$temp]);
    }

    public function getupdate(Request $request){
        $i = $request->id;
        $data = AcceptanceTopic::find($i)->toArray();
        return view('admin.acceptance.updateForm',['dulieu'=>$data]);
    }

    public function postupdate(Request $request){

        $this->validate($request,
            [
                'situationScore' => 'required|min:0|max:15',
                'ideaScore' => 'required|min:0|max:15',
                'targetScore' => 'required|min:0|max:10',
                'methodScore' => 'required|min:0|max:10',
                'researchScore' => 'required|min:0|max:40',
                'appearanceScore' => 'required|min:0|max:5',
                'publishScore' => 'required|min:0|max:5',
                'totalScore' => 'required|min:0|max:100',
                'appearanceComment' => 'required',
                'situationComment' => 'required',
                'meaningComment' => 'required',
                'contentComment' => 'required',
                'resultComment' => 'required',
                'conclusion' => 'required',
                'proplem' => 'required',
            ],

            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được nhỏ hơn :min',
                'max' => ':attribute không được lớn hơn :max',
            ],

            [
                'situationScore' => 'Điểm',
                'ideaScore' => 'Điểm',
                'targetScore' => 'Điểm',
                'methodScore' => 'Điểm',
                'researchScore' => 'Điểm',
                'appearanceScore' => 'Điểm',
                'publishScore' => 'Điểm',
                'totalScore' => 'Điểm',
                'appearanceComment' => 'Nhận xét',
                'situationComment' => 'Nhận xét',
                'meaningComment' => 'Nhận xét',
                'contentComment' => 'Nhận xét',
                'resultComment' => 'Nhận xét',
                'conclusion' => 'Nhận xét',
                'proplem' => 'Nhận xét',
            ]
        );

        $accept = AcceptanceTopic::find($request->id);
        $accept->situationScore = $request->situationScore;
        $accept->ideaScore = $request->ideaScore;
        $accept->targetScore = $request->targetScore;
        $accept->methodScore = $request->methodScore;
        $accept->researchScore = $request->researchScore;
        $accept->appearanceScore = $request->appearanceScore;
        $accept->publishScore = $request->publishScore;
        $accept->totalScore = $request->totalScore;
        $accept->appearanceComment = $request->appearanceComment;
        $accept->situationComment = $request->situationComment;
        $accept->meaningComment = $request->meaningComment;
        $accept->contentComment = $request->contentComment;
        $accept->resultComment = $request->resultComment;
        $accept->conclusion = $request->conclusion;
        $accept->proplem = $request->proplem;
        $accept->save();

        $topic = Topic::find($request->topicID);
        $temp = (int)$request->totalScore;
        if ($temp >= 90 && $temp <=100){
            $topic->rating = 'Xuất sắc';
        }
        elseif ($temp >= 80 && $temp <=89){
            $topic->rating = 'Tốt';
        }
        elseif ($temp >= 70 && $temp <=79){
            $topic->rating = 'Khá';
        }
        elseif ($temp >= 50 && $temp <=69){
            $topic->rating = 'Đạt';
        }
        else {
            $topic->rating = 'Không đạt';
        }
        $topic->status = "Đã nghiệm thu";
        $topic->save();

        return redirect('admin/accept/listUpdate');
    }

    public function destroy($id)
    {
        $accepts = AcceptanceTopic::find($id)->toArray();
        $a = $accepts["topicID"];
        $accept = AcceptanceTopic::find($id);
        $accept->delete();

        $topics = Topic::find($a);
        $topics->status = 'Chờ nghiệm thu';
        $topics->rating = null;
        $topics->save();

        return redirect('admin/accept/listUpdate');
    }

}
