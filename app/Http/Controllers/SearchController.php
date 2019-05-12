<?php

namespace App\Http\Controllers;

use App\AcceptanceTopic;
use App\Exports\TopicExport;
use App\ProgressReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Faculty;
use App\Topic;
use App\Teacher;
use App\Group;
use App\Student;
use App\Outline;
use Maatwebsite\Excel\Facades\Excel;


class SearchController extends Controller
{
    public function getsearch(){
        $faculty = Faculty::select('id','facultyName')->get()->toArray();
        $year = Topic::select('year')->distinct()->get()->toArray();
        $teacher = Teacher::select('id', 'teacherName','degree')->get()->toArray();
        return view('admin.search.search',['khoa'=>$faculty,'nam'=>$year,'giangvien'=>$teacher]);
    }

    public function postsearch(Request $request){

        $query = DB::table('tb_group')
            ->join('tb_topic','tb_topic.id','=','tb_group.topicID')
            ->join('tb_faculty','tb_faculty.id','=','tb_topic.facultyID')
            ->join('tb_teacher','tb_teacher.id','=','tb_group.teacherID')
            ->select('tb_topic.name','tb_topic.id','tb_topic.rating','tb_topic.year','tb_topic.status','tb_faculty.facultyName','tb_teacher.teacherName','tb_teacher.degree');

        if ($request->inputText != ''){
            $query->where('tb_topic.name','LIKE','%'.$request->inputText.'%');
        }
        if ($request->facultyName != ''){
            $query->where('tb_faculty.facultyName','=',$request->facultyName);
        }
        if ($request->year != ''){
            $query->where('tb_topic.year','=',$request->year);
        }
        if ($request->teacher != ''){
            $query->where('tb_teacher.teacherName','=',$request->teacher);
        }
        if ($request->status != ''){
            $query->where('tb_topic.status','=',$request->status);
        }
        if ($request->rating != ''){
            $query->where('tb_topic.rating','=',$request->rating);
        }
        $data = $query->get();

        return view('admin.search.resultlist', ['data'=>$data]);
    }

    public function getdetail($id){

        $topic = Topic::where('id',$id)->get()->toArray();
        $student = Student::join('tb_student_group','tb_student_group.studentID','=','tb_student.id')
            ->join('tb_group','tb_group.id','=','tb_student_group.groupID')->where('tb_group.topicID','=',$id)->get()->toArray();
        $teacher = Teacher::join('tb_group','tb_group.teacherID','=','tb_teacher.id')
            ->where('tb_group.topicID','=',$id)->get()->toArray();
        $accept = AcceptanceTopic::where('tb_acceptancetopic.topicID','=',$id)->get()->toArray();
        $outline = Outline::where('tb_outline.topicID','=',$id)->get()->toArray();
        $report = ProgressReport::where('tb_progressreport.topicID','=',$id)->get();
        return view('admin.search.detail',["tp"=>$topic,"student"=>$student,"teacher"=>$teacher,"accept"=>$accept,"outline"=>$outline,"report"=>$report]);
    }

    public function getadd(){
        $faculty = Faculty::select('id','facultyName')->get()->toArray();
        $group = Group::select('id','groupName')->get()->toArray();
        $teacher = Teacher::select('id', 'teacherName','facultyID')->get()->toArray();
        return view('admin.search.add',["khoa"=>$faculty,'nhom'=>$group,'giangvien'=>$teacher]);
    }

    public function postadd(Request $request){

        $this->validate($request,
            [
                'title' => 'required',
                'timeStart' => 'required',
                'timeFinish' => 'required',
                'overview' => 'required',
                'target' => 'required',
                'contents' => 'required',
                'methods' => 'required',
                'expected' => 'required',
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
                'situationScore' => 'required|min:0|max:15',
                'ideaScore' => 'required|min:0|max:15',
                'targetScore1' => 'required|min:0|max:10',
                'methodScore' => 'required|min:0|max:10',
                'researchScore' => 'required|min:0|max:40',
                'appearanceScore' => 'required|min:0|max:5',
                'publishScore' => 'required|min:0|max:5',
                'totalScore' => 'required|min:0|max:100',
                'appearanceComment1' => 'required',
                'situationComment' => 'required',
                'meaningComment' => 'required',
                'contentComment' => 'required',
                'resultComment1' => 'required',
                'conclusion' => 'required',
                'proplem' => 'required',
            ],

            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được nhỏ hơn :min',
                'max' => ':attribute không được lớn hơn :max',
            ],

            [
                'title' => 'Tiêu đề',
                'timeStart' => 'Thời gian bắt đầu',
                'timeFinish' => 'Thời gian kết thúc',
                'overview' => 'Tổng quan',
                'target' => 'Mục tiêu',
                'contents' => 'Nội dung',
                'methods' => 'Phương pháp',
                'expected' => 'Kết quả dự kiến',
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
                'situationScore' => 'Điểm',
                'ideaScore' => 'Điểm',
                'targetScore1' => 'Điểm',
                'methodScore' => 'Điểm',
                'researchScore' => 'Điểm',
                'appearanceScore' => 'Điểm',
                'publishScore' => 'Điểm',
                'totalScore' => 'Điểm',
                'appearanceComment1' => 'Nhận xét',
                'situationComment' => 'Nhận xét',
                'meaningComment' => 'Nhận xét',
                'contentComment' => 'Nhận xét',
                'resultComment1' => 'Nhận xét',
                'conclusion' => 'Nhận xét',
                'proplem' => 'Nhận xét',
            ]
        );
        $id = Topic::max('id')+1;
        $topic = new Topic;
        $topic->id = $id;
        $topic->name =$request->title;
        $topic->timeStart = $request->timeStart;
        $topic->timeFinish = $request->timeFinish;
        $topic->overview = $request->overview;
        $topic->content = $request->contents;
        $topic->method = $request->methods;
        $topic->expected = $request->expected;
        $topic->target = $request->target;
        $topic->description = $request->description;
        $topic->status = "Đã nghiệm thu";
        $topic->year = date('Y',strtotime($request->timeFinish));
        $topic->facultyID = $request->faculty;
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
        $topic->save();

        $outline = new Outline;
        $outline->id = Outline::max('id')+1;
        $outline->topicID = $id;
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

        $accept = new AcceptanceTopic;
        $accept->id = AcceptanceTopic::max('id')+1;
        $accept->topicID = $id;
        $accept->situationScore = $request->situationScore;
        $accept->ideaScore = $request->ideaScore;
        $accept->targetScore = $request->targetScore1;
        $accept->methodScore = $request->methodScore;
        $accept->researchScore = $request->researchScore;
        $accept->appearanceScore = $request->appearanceScore;
        $accept->publishScore = $request->publishScore;
        $accept->totalScore = $request->totalScore;
        $accept->appearanceComment = $request->appearanceComment1;
        $accept->situationComment = $request->situationComment;
        $accept->meaningComment = $request->meaningComment;
        $accept->contentComment = $request->contentComment;
        $accept->resultComment = $request->resultComment1;
        $accept->conclusion = $request->conclusion;
        $accept->proplem = $request->proplem;
        $accept->date = date('Y-m-d');
        $accept->save();

        $grid = Group::max('id')+1;
        $group = new Group;
        $group->id = $grid;
        $group->groupName = $request->title;
        $group->level = 1;
        $group->topicID = $id;
        $group->teacherID = $request->teacher;
        $group->save();

        for ($i=0;$i<10;$i++){
            if (isset($request->code[$i])){
                $query = Student::where('studentCode',$request->code[$i])->get()->toArray();
                foreach ($query as $value){
                    $ids = DB::table('tb_student_group')->max('id')+1;
                    DB::table('tb_student_group')
                        ->insert(['studentID' => $value['id'], 'groupID'=> $grid,'id' => $ids]);
                }
            }
        }


        return redirect('admin/search/');
    }

    public function getupdate(Request $request){

        $id = $request->id;
        $topic = Topic::where('id',$id)->get()->toArray();
        $student = Student::join('tb_student_group','tb_student_group.studentID','=','tb_student.id')
            ->join('tb_group','tb_group.id','=','tb_student_group.groupID')->where('tb_group.topicID','=',$id)->get()->toArray();
        $teacher = Teacher::select('id', 'teacherName','facultyID')->get()->toArray();
        $accept = AcceptanceTopic::where('tb_acceptancetopic.topicID','=',$id)->get()->toArray();
        $outline = Outline::where('tb_outline.topicID','=',$id)->get()->toArray();
        $faculty = Faculty::select('id','facultyName','sign')->get()->toArray();


        return view('admin.search.update',["topic"=>$topic,"student"=>$student,"giangvien"=>$teacher,"accept"=>$accept,"outline"=>$outline,"faculty"=>$faculty]);
    }

    public function postupdate(Request $request){
        $this->validate($request,
            [
                'title' => 'required',
                'timeStart' => 'required',
                'timeFinish' => 'required',
                'overview' => 'required',
                'target' => 'required',
                'contents' => 'required',
                'methods' => 'required',
                'expected' => 'required',
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
                'situationScore' => 'required|min:0|max:15',
                'ideaScore' => 'required|min:0|max:15',
                'targetScore1' => 'required|min:0|max:10',
                'methodScore' => 'required|min:0|max:10',
                'researchScore' => 'required|min:0|max:40',
                'appearanceScore' => 'required|min:0|max:5',
                'publishScore' => 'required|min:0|max:5',
                'totalScore' => 'required|min:0|max:100',
                'appearanceComment1' => 'required',
                'situationComment' => 'required',
                'meaningComment' => 'required',
                'contentComment' => 'required',
                'resultComment1' => 'required',
                'conclusion' => 'required',
                'proplem' => 'required',
            ],

            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được nhỏ hơn :min',
                'max' => ':attribute không được lớn hơn :max',
            ],

            [
                'title' => 'Tiêu đề',
                'timeStart' => 'Thời gian bắt đầu',
                'timeFinish' => 'Thời gian kết thúc',
                'overview' => 'Tổng quan',
                'target' => 'Mục tiêu',
                'contents' => 'Nội dung',
                'methods' => 'Phương pháp',
                'expected' => 'Kết quả dự kiến',
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
                'situationScore' => 'Điểm',
                'ideaScore' => 'Điểm',
                'targetScore1' => 'Điểm',
                'methodScore' => 'Điểm',
                'researchScore' => 'Điểm',
                'appearanceScore' => 'Điểm',
                'publishScore' => 'Điểm',
                'totalScore' => 'Điểm',
                'appearanceComment1' => 'Nhận xét',
                'situationComment' => 'Nhận xét',
                'meaningComment' => 'Nhận xét',
                'contentComment' => 'Nhận xét',
                'resultComment1' => 'Nhận xét',
                'conclusion' => 'Nhận xét',
                'proplem' => 'Nhận xét',
            ]
        );

        $topic = Topic::find($request->id);
        $topic->name =$request->title;
        $topic->timeStart = $request->timeStart;
        $topic->timeFinish = $request->timeFinish;
        $topic->overview = $request->overview;
        $topic->content = $request->contents;
        $topic->method = $request->methods;
        $topic->expected = $request->expected;
        $topic->target = $request->target;
        $topic->description = $request->description;
        $topic->status = "Đã nghiệm thu";
        $topic->year = date('Y',strtotime($request->timeFinish));
        $topic->facultyID = $request->faculty;
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
        $topic->save();

        $outline = Outline::where('topicID','=',$request->id)->first();
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
        $outline->save();

        $accept = AcceptanceTopic::where('topicID','=',$request->id)->first();
        $accept->situationScore = $request->situationScore;
        $accept->ideaScore = $request->ideaScore;
        $accept->targetScore = $request->targetScore1;
        $accept->methodScore = $request->methodScore;
        $accept->researchScore = $request->researchScore;
        $accept->appearanceScore = $request->appearanceScore;
        $accept->publishScore = $request->publishScore;
        $accept->totalScore = $request->totalScore;
        $accept->appearanceComment = $request->appearanceComment1;
        $accept->situationComment = $request->situationComment;
        $accept->meaningComment = $request->meaningComment;
        $accept->contentComment = $request->contentComment;
        $accept->resultComment = $request->resultComment1;
        $accept->conclusion = $request->conclusion;
        $accept->proplem = $request->proplem;
        $accept->save();

        $group = Group::where('topicID','=',$request->id)->first();
        $group->groupName = $request->title;
        $group->level = 1;
        $group->topicID = $request->id;
        $group->teacherID = $request->teacher;
        $group->save();

        $temp = Group::where('topicID','=',$request->id)->get()->toArray();
        foreach($temp as $t){
            DB::table('tb_student_group')->where('groupID','=',$t["id"])->delete();
        }

        for ($i=0;$i<10;$i++){
            if (isset($request->code[$i])){
                $query = Student::where('studentCode',$request->code[$i])->get()->toArray();
                foreach ($query as $value){
                    $ids = DB::table('tb_student_group')->max('id')+1;
                    DB::table('tb_student_group')
                        ->insert(['studentID' => $value['id'], 'groupID'=> $temp["id"],'id' => $ids]);
                }
            }
        }

        return redirect('admin/search/');
    }

    public function getdelete($id){
        $outline = Outline::where('topicID','=',$id)->first();
        if(isset($outline)){
            $outline->delete();
        }
        $accept = AcceptanceTopic::where('topicID','=',$id)->first();
        if(isset($outline)){
            $accept->delete();
        }
        $temp = Group::where('topicID','=',$id)->get()->toArray();
        foreach($temp as $t){
            DB::table('tb_student_group')->where('groupID','=',$t["id"])->delete();
        }
        $group = Group::where('topicID','=',$id)->first();
        if(isset($group)){
            $group->delete();
        }
        $topic = Topic::find($id);
        $topic->delete();

        return redirect('admin/search/');
    }

    public function export(){
        $faculty = Faculty::select('id','facultyName')->get()->toArray();
        $year = Topic::select('year')->distinct()->get()->toArray();
        $teacher = Teacher::select('id', 'teacherName')->get()->toArray();
        return view('admin.search.export',['khoa'=>$faculty,'nam'=>$year,'giangvien'=>$teacher]);
    }

    public function download(Request $request)
    {

        $query = DB::table('tb_group')
            ->join('tb_topic', 'tb_topic.id', '=', 'tb_group.topicID')
            ->join('tb_faculty', 'tb_faculty.id', '=', 'tb_topic.facultyID')
            ->join('tb_teacher', 'tb_teacher.id', '=', 'tb_group.teacherID')
            ->select( 'tb_topic.name', 'tb_faculty.facultyName', 'tb_topic.year', 'tb_topic.status', 'tb_topic.rating', 'tb_teacher.teacherName');

        if ($request->facultyName != '') {
            $query->where('tb_faculty.facultyName', '=', $request->facultyName);
        }
        if ($request->year != '') {
            $query->where('tb_topic.year', '=', $request->year);
        }
        if ($request->teacher != '') {
            $query->where('tb_teacher.teacherName', '=', $request->teacher);
        }
        if ($request->status != '') {
            $query->where('tb_topic.status', '=', $request->status);
        }
        if ($request->rating != '') {
            $query->where('tb_topic.rating', '=', $request->rating);
        }
        $data = $query->orderBy('rating','DESC')->get()->toArray();

        return Excel::download(new TopicExport($data),'export.xlsx');
    }
}
