<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use Illuminate\Support\Facades\DB;

class UTestController extends Controller
{
    public function getTest(){
        return view('user.tested.test');
    }

    public function postTest(Request $request){

        $query = Topic::where('name','LIKE','%'.$request->inputText.'%')->get();
        return view('user.tested.result',["data"=>$query]);
    }

    public function homeDetail($value)
    {
        $query = DB::table('tb_group')
            ->join('tb_topic','tb_topic.id','=','tb_group.topicID')
            ->join('tb_faculty','tb_faculty.id','=','tb_topic.facultyID')
            ->join('tb_teacher','tb_teacher.id','=','tb_group.teacherID')
            ->select('tb_topic.name','tb_topic.id','tb_topic.rating','tb_topic.year','tb_topic.status','tb_faculty.facultyName','tb_teacher.teacherName','tb_teacher.degree')
            ->where('tb_topic.facultyID','=', $value)->get();
        return view('user.search.result', ['data'=>$query]);
    }
}
