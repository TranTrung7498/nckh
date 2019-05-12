<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Teacher;
use App\Faculty;
use App\Topic;
use App\Classes;
use App\Group;
use App\Student;
use App\Outline;
use App\AcceptanceTopic;

class USearchController extends Controller
{
    public function getSearch(){
        $faculty = Faculty::select('id','facultyName')->get()->toArray();
        $year = Topic::select('year')->distinct()->get()->toArray();
        $teacher = Teacher::select('id', 'teacherName','degree')->get()->toArray();
        return view('user.search.search',['khoa'=>$faculty,'nam'=>$year,'giangvien'=>$teacher]);
    }

    public function postSearch(Request $request){
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

        return view('user.search.result', ['data'=>$data]);
    }

    public function getdetail($id){

        $topic = Topic::where('id',$id)->get()->toArray();
        $student = Student::join('tb_student_group','tb_student_group.studentID','=','tb_student.id')
            ->join('tb_group','tb_group.id','=','tb_student_group.groupID')->where('tb_group.topicID','=',$id)->get()->toArray();
        $teacher = Teacher::join('tb_group','tb_group.teacherID','=','tb_teacher.id')
            ->where('tb_group.topicID','=',$id)->get()->toArray();
        $accept = AcceptanceTopic::where('tb_acceptancetopic.topicID','=',$id)->get()->toArray();
        $outline = Outline::where('tb_outline.topicID','=',$id)->get()->toArray();

        return view('user.search.detail',["tp"=>$topic,"student"=>$student,"teacher"=>$teacher,"accept"=>$accept,"outline"=>$outline]);
    }
}
