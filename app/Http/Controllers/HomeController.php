<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->permission<3){
            return redirect('admin/home');
        } else {
            return redirect('user/home');
        }
    }
    public function homeDetail($value)
    {
        $query = DB::table('tb_group')
            ->join('tb_topic','tb_topic.id','=','tb_group.topicID')
            ->join('tb_faculty','tb_faculty.id','=','tb_topic.facultyID')
            ->join('tb_teacher','tb_teacher.id','=','tb_group.teacherID')
            ->select('tb_topic.name','tb_topic.id','tb_topic.rating','tb_topic.year','tb_topic.status','tb_faculty.facultyName','tb_teacher.teacherName','tb_teacher.degree')
            ->where('tb_topic.facultyID','=', $value)->get();
        return view('admin.search.resultlist', ['data'=>$query]);
    }
}
