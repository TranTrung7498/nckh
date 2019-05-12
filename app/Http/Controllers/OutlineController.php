<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Outline;
use App\Topic;

class OutlineController extends Controller
{
    public function getlist(){
        $topic = DB::table('tb_faculty')
            ->join('tb_topic','tb_faculty.id','=','tb_topic.facultyID')
            ->select('tb_topic.id','tb_topic.name','tb_faculty.facultyName','tb_topic.status')
            ->where('status','=','Chờ xét duyệt')->get()->toArray();
        return view('admin.outline.list',['detai'=>$topic]);
    }

    public function postoutline(Request $request){
        $data = $request->id;
        return view('admin.outline.add',['id'=>$data]);
    }

    public function addoutline(Request $request){

        $this->validate($request,
            [
                'titleScore' => 'required|min:0|max:10',
                'resultScore' => 'required|min:0|max:20',
                'targetScore' => 'required|min:0|max:20',
                'contentScore' => 'required|min:0|max:30',
                'applyScore' => 'required|min:0|max:20',
                'summaryScore' => 'required',
                'appearanceComment' => 'required',
                'targetComment' => 'required',
                'summaryComment' => 'required',
                'methodComment' => 'required',
                'resultComment' => 'required',
                'additionalComment' => 'required',
                'adjustedComment' => 'required',
            ],

            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được nhỏ hơn :min',
                'max' => ':attribute không được lớn hơn :max',
            ],

            [
                'titleScore' => 'Điểm',
                'resultScore' => 'Điểm',
                'targetScore' => 'Điểm',
                'contentScore' => 'Điểm',
                'applyScore' => 'Điểm',
                'summaryScore' => 'Điểm',
                'appearanceComment' => 'Nhận xét',
                'targetComment' => 'Nhận xét',
                'summaryComment' => 'Nhận xét',
                'methodComment' => 'Nhận xét',
                'resultComment' => 'Nhận xét',
                'additionalComment' => 'Nhận xét',
                'adjustedComment' => 'Nhận xét',
            ]
        );

        $outline = new Outline;
            $outline->id = Outline::max('id')+1;
            $outline->topicID = $request->id;
            $outline->titleScore = $request->titleScore;
            $outline->resultScore = $request->resultScore;
            $outline->targetScore = $request->targetScore;
            $outline->contentScore = $request->contentScore;
            $outline->applyScore = $request->applyScore;
            $outline->totalScore = $request->summaryScore;
            $outline->appearanceComment = $request->appearanceComment;
            $outline->targetComment = $request->targetComment;
            $outline->summaryComment = $request->summaryComment;
            $outline->methodComment = $request->methodComment;
            $outline->resultComment = $request->resultComment;
            $outline->additional = $request->additionalComment;
            $outline->adjusted = $request->adjustedComment;
            $outline->date = date('Y-m-d');
            $outline->save();

            $topic = Topic::find($request->id);
            $topic->status = "Đang thực hiện";
            $topic->save();

            return redirect('admin/outline/');
    }

    public function listupdate(){
        $temp = DB::table('tb_topic')->join('tb_outline','tb_topic.id','=','tb_outline.topicID')
            ->select('tb_topic.name', 'tb_topic.status', 'tb_outline.id')
            ->where('status','=','Đang thực hiện')
            ->get()->toArray();
        return view('admin.outline.update',['danhsach'=>$temp]);
    }

    public function getupdate(Request $request){
        $i = $request->id;
        $data = Outline::find($i)->toArray();
        return view('admin.outline.updateForm',['dulieu'=>$data]);
    }

    public function postupdate(Request $request){

        $this->validate($request,
            [
                'titleScore' => 'required|min:0|max:10',
                'resultScore' => 'required|min:0|max:20',
                'targetScore' => 'required|min:0|max:20',
                'contentScore' => 'required|min:0|max:30',
                'applyScore' => 'required|min:0|max:20',
                'summaryScore' => 'required',
                'appearanceComment' => 'required',
                'targetComment' => 'required',
                'summaryComment' => 'required',
                'methodComment' => 'required',
                'resultComment' => 'required',
                'additionalComment' => 'required',
                'adjustedComment' => 'required',
            ],

            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được nhỏ hơn :min',
                'max' => ':attribute không được lớn hơn :max',
            ],

            [
                'titleScore' => 'Điểm',
                'resultScore' => 'Điểm',
                'targetScore' => 'Điểm',
                'contentScore' => 'Điểm',
                'applyScore' => 'Điểm',
                'summaryScore' => 'Điểm',
                'appearanceComment' => 'Nhận xét',
                'targetComment' => 'Nhận xét',
                'summaryComment' => 'Nhận xét',
                'methodComment' => 'Nhận xét',
                'resultComment' => 'Nhận xét',
                'additionalComment' => 'Nhận xét',
                'adjustedComment' => 'Nhận xét',
            ]
        );

        $outline = Outline::find($request->id);
        $outline->topicID = $request->topicID;
        $outline->titleScore = $request->titleScore;
        $outline->resultScore = $request->resultScore;
        $outline->targetScore = $request->targetScore;
        $outline->contentScore = $request->contentScore;
        $outline->applyScore = $request->applyScore;
        $outline->totalScore = $request->summaryScore;
        $outline->appearanceComment = $request->appearanceComment;
        $outline->targetComment = $request->targetComment;
        $outline->summaryComment = $request->summaryComment;
        $outline->methodComment = $request->methodComment;
        $outline->resultComment = $request->resultComment;
        $outline->additional = $request->additionalComment;
        $outline->adjusted = $request->adjustedComment;
        $outline->date = date('Y-m-d');
        $outline->save();

        $topic = Topic::find($request->topicID);
        $topic->status = "Đang thực hiện";
        $topic->save();

        return redirect('admin/outline/listUpdate');
    }

    public function destroy($id)
    {
        $outlines = Outline::find($id)->toArray();
        $a = $outlines["topicID"];
        $outline = Outline::find($id);
        $outline->delete();

        $topics = Topic::find($a);
        $topics->status = 'Chờ xét duyệt';
        $topics->save();

        return redirect('admin/outline/listUpdate');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("products")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}
