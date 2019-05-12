<?php

namespace App\Http\Controllers;

use App\Classes;
use Illuminate\Http\Request;
use App\Topic;
use App\Group;
use App\Faculty;
use App\Teacher;
use App\Student;
use Illuminate\Support\Facades\DB;

class RegTopicController extends Controller
{
    public function getform(){
        $faculty = Faculty::select('id','facultyName','sign')->get()->toArray();
        $teacher = Teacher::select('id', 'teacherName','facultyID')->get()->toArray();
        $student = Student::select('id','studentCode','studentName')->orderBy('id','DESC')->get()->toArray();
        return view('admin.regtopic.form',['giangvien'=>$teacher,'khoa'=>$faculty,'student'=>$student]);
    }

    public function postform(Request $request){

       $this->validate($request,
            [
                'title' => 'required',
                'timeStart' => 'required',
                'timeFinish' => 'required',
                'overview' => 'required',
                'target' => 'required',
                'contents' => 'required',
                'methods' => 'required',
                'expected' => 'required'
            ],

            [
                'required' => ':attribute không được để trống',
            ],

            [
                'title' => 'Tiêu đề',
                'timeStart' => 'Thời gian bắt đầu',
                'timeFinish' => 'Thời gian kết thúc',
                'overview' => 'Tổng quan',
                'target' => 'Mục tiêu',
                'contents' => 'Nội dung',
                'methods' => 'Phương pháp',
                'expected' => 'Kết quả dự kiến'
            ]
        );

        $id = Topic::max('id')+1;
        $topic = new Topic;
        $topic->id = $id;
        $topic->name =$request->title;
        $topic->timeStart = $request->timeStart;
        $topic->timeFinish = $request->timeFinish;
        $topic->overview = $request->overview;
        $topic->target = $request->target;
        $topic->content = $request->contents;
        $topic->method = $request->methods;
        $topic->expected = $request->expected;
        $topic->description = $request->description;
        $topic->status = 'Chờ xét duyệt';
        $topic->rating = null;
        $topic->facultyID = $request->faculty;
        $topic->year = date('Y',strtotime($request->timeFinish));
        $topic->save();

        $grid = Group::max('id')+1;
        $group = new Group;
        $group->id = $grid;
        $group->groupName = $request->title;
        $group->level = 1;
        $group->topicID = $id;
        for ($i=0;$i<12;$i++){
            if ($request->teacher[$i]!=""){
                $group->teacherID = $request->teacher[$i];
            }
        }
        $group->save();

        for ($i=0;$i<5;$i++){
            if ($request->student[$i]!=""){
                $ids = DB::table('tb_student_group')->max('id')+1;
                DB::table('tb_student_group')
                    ->insert(['studentID' => $request->student[$i], 'groupID'=> $grid,'id' => $ids]);
            }
        }
        return redirect('admin/home');

/*        var_dump($request->teacher);*/
    }
}
