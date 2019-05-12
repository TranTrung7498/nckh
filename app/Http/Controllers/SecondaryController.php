<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Faculty;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SecondaryController extends Controller
{
    public function listTC(){
        $teacher = DB::table('tb_teacher')
            ->join('tb_faculty','tb_faculty.id','=','tb_teacher.facultyID')
            ->select('tb_teacher.id','tb_teacher.teacherName','tb_teacher.teacherCode','tb_teacher.phone','tb_teacher.email','tb_teacher.degree','tb_faculty.facultyName')
            ->get();
        return view('admin.secondary.listTC',['giangvien'=>$teacher]);
    }
    public function addTC(){
        $faculty = Faculty::select('id','facultyName')->get();
        return view('admin.secondary.addTC',['data'=>$faculty]);
    }
    public function postTC(Request $request){

        $this->validate($request,
            [
                'teacherName' => 'required'
            ],
            [
                'required' => ':attribute không được để trống'
            ],
            [
                'teacherName' => 'Tên giảng viên'
            ]
        );

        $teacher = new Teacher;
        $teacher->id = Teacher::max('id')+1;
        $teacher->teacherName = $request->teacherName;
        $teacher->teacherCode = $request->teacherCode;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->degree = $request->degree;
        $teacher->facultyID = $request->faculty;
        $teacher->save();

        return redirect('admin/secondary/teacher');
    }

    public function updateTC($id){
        $teacher = DB::table('tb_teacher')->where('id','=',$id)->get();
        $faculty = Faculty::select('id','facultyName')->get();
        return view('admin.secondary.updateTC',['data'=>$teacher,'id'=>$id,'faculty'=>$faculty]);
    }

    public function postUpdateTC(Request $request){

        $this->validate($request,
            [
                'teacherName' => 'required'
            ],
            [
                'required' => ':attribute không được để trống'
            ],
            [
                'teacherName' => 'Tên giảng viên'
            ]
        );

        $teacher = Teacher::find($request->id);
        $teacher->teacherName = $request->teacherName;
        $teacher->teacherCode = $request->teacherCode;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->degree = $request->degree;
        $teacher->facultyID = $request->faculty;
        $teacher->save();

        return redirect('admin/secondary/teacher');
    }

    public function listCL(){
        $class = DB::table('tb_class')
            ->join('tb_faculty','tb_faculty.id','=','tb_class.facultyID')
            ->select('tb_class.id','tb_class.className','tb_faculty.facultyName')->orderBy('facultyName','DESC')
            ->get();
        return view('admin.secondary.listCL',['lop'=>$class]);
    }
    public function addCL(){
        $faculty = Faculty::select('id','facultyName')->get();
        return view('admin.secondary.addCL',['data'=>$faculty]);
    }
    public function postCL(Request $request){

        $this->validate($request,
            [
                'className' => 'required'
            ],
            [
                'required' => ':attribute không được để trống'
            ],
            [
                'className' => 'Tên giảng viên'
            ]
        );

        $classes = new Classes;
        $classes->id = Classes::max('id')+1;
        $classes->className = $request->className;
        $classes->facultyID = $request->faculty;
        $classes->save();

        return redirect('admin/secondary/classes');
    }

    public function updateCL($id){
        $class = DB::table('tb_class')->where('id','=',$id)->get();
        $faculty = Faculty::select('id','facultyName')->get();
        return view('admin.secondary.updateCL',['data'=>$class,'id'=>$id,'faculty'=>$faculty]);
    }

    public function postUpdateCL(Request $request){

        $this->validate($request,
            [
                'className' => 'required'
            ],
            [
                'required' => ':attribute không được để trống'
            ],
            [
                'className' => 'Tên giảng viên'
            ]
        );

        $class = Classes::find($request->id);
        $class->className = $request->className;
        $class->facultyID = $request->faculty;
        $class->save();

        return redirect('admin/secondary/classes');
    }
}
