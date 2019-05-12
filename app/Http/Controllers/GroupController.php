<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Student;
use App\Teacher;
use App\Classes;
use App\Topic;
use Illuminate\Http\Request;
use App\Group;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class GroupController extends Controller
{
    public function get(){
        $data = DB::table('tb_group')
            ->join('tb_teacher','tb_teacher.id','=','tb_group.teacherID')
            ->select('tb_group.id','tb_group.groupName','tb_teacher.teacherName','tb_teacher.degree')
            ->where('tb_group.level','=',0)
            ->get();
        return view('admin.group.list', ['data'=>$data]);
    }

    public function getadd(){

        $teacher = Teacher::select('id', 'teacherName','facultyID','degree')->get()->toArray();
        $classes = Classes::select('id', 'className')->get()->toArray();
        $faculty = Faculty::select('id', 'facultyName')->get()->toArray();
        $student = Student::select('id','studentCode','studentName')->get()->toArray();
        return view('admin.group.add',['giangvien'=>$teacher,'lop'=>$classes,'khoa'=>$faculty,'student'=>$student]);
    }


    public function postadd(Request $request){

        $grid = Group::max('id')+1;
        $group = new Group;
        $group->id = $grid;
        $group->groupName = $request->title;
        $group->level = 0;
        $group->topicID = null;
        $group->teacherID = $request->teacher;
        $group->save();

        for ($i=0;$i<15;$i++){
            if (isset($request->student[$i])){
                    $ids = DB::table('tb_student_group')->max('id')+1;
                    DB::table('tb_student_group')
                        ->insert(['studentID' => $request->student[$i], 'groupID'=> $grid,'id' => $ids]);
            }
        }

        return redirect('admin/group/');
    }

    public function detail($id){
        $group = Group::where('id',$id)->get()->toArray();
        $student = Student::join('tb_student_group','tb_student_group.studentID','=','tb_student.id')
            ->join('tb_group','tb_group.id','=','tb_student_group.groupID')->where('tb_group.id','=',$id)->get()->toArray();
        $teacher = Teacher::join('tb_group','tb_group.teacherID','=','tb_teacher.id')
            ->where('tb_group.id','=',$id)->get()->toArray();

        return view('admin.group.detail',["group"=>$group,"student"=>$student,"teacher"=>$teacher]);

    }

    public function delete($id){
        DB::table('tb_student_group')->where('groupID','=',$id)->delete();
        Group::where('id',$id)->delete();
        Student::join('tb_student_group','tb_student_group.studentID','=','tb_student.id')
            ->join('tb_group','tb_group.id','=','tb_student_group.groupID')->where('tb_group.id','=',$id)->delete();

        return redirect('admin/group/');
    }

    public function update($id){
        $group = Group::where('id',$id)->get()->toArray();
        $teacher = Teacher::select('id', 'teacherName','facultyID')->get()->toArray();
        $classes = Classes::select('id', 'className')->get()->toArray();
        $faculty = Faculty::select('id', 'facultyName')->get()->toArray();
        $student = Student::join('tb_student_group','tb_student_group.studentID','=','tb_student.id')
            ->join('tb_group','tb_group.id','=','tb_student_group.groupID')->where('tb_group.id','=',$id)->get()->toArray();

        return view('admin.group.update',['group'=>$group,'student'=>$student,'giangvien'=>$teacher,'lop'=>$classes,'khoa'=>$faculty,'grid'=>$id]);
    }

    public function postupdate(Request $request){

        DB::table('tb_student_group')->where('groupID','=',$request->groupID)->delete();
        Student::join('tb_student_group','tb_student_group.studentID','=','tb_student.id')
            ->join('tb_group','tb_group.id','=','tb_student_group.groupID')->where('tb_group.id','=',$request->groupID)->delete();
        Group::where('id',$request->groupID)->delete();

        $grid = Group::max('id')+1;
        $group = new Group;
        $group->id = $grid;
        $group->groupName = $request->title;
        $group->level = 0;
        $group->topicID = null;
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

        return redirect('admin/group/');
    }

    public function addStudent(){
        $classes = DB::table('tb_class')->get();
        return view('admin.group.addStudent',['lop'=>$classes]);
    }
    public function postStudent(Request $request){

        $this->validate($request,
            [
                'code' => 'required|unique:tb_student,studentCode',
                'name' => 'required',
                'dob' => 'required',
                'place' => 'required',
                'year' => 'required|min:1',
                'address'=> 'required',
                'email' => 'required|email',
                'image' => 'required'
            ],
            [
                'required' => ':attribute không được để trống',
                'unique' => ':attribute đã tồn tại, hãy kiểm tra lại !',
                'min' => ':attribute không được nhỏ hơn :min',
                'email' => ':attribute phải đúng định dạng'
            ],
            [
                'code' => 'Mã sinh viên',
                'name' => 'Họ tên',
                'dob' => 'Ngày sinh',
                'place' => 'Nơi sinh',
                'year' => 'Khóa',
                'address'=> 'Địa chỉ',
                'email' => 'Email',
                'image' => 'Ảnh sinh viên'
            ]
        );

        $file = $request->image;
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = time() . "_" . rand(0,9999999) . "." . $fileExtension;
        $image_resize = Image::make($file->getRealPath());
        $image_resize->resize(153, 230);
        $image_resize->save(public_path('image/' .$fileName));

        $students = new Student;
        $students->id = Student::max('id') + 1;
        $students->studentCode = $request->code;
        $students->studentName = $request->name;
        $students->dateOfBirth = $request->dob;
        $students->placeOfBirth = $request->place;
        $students->year = $request->year;
        $students->address = $request->address;
        $students->phone = $request->phone;
        $students->email = $request->email;
        $students->image = $fileName;
        $students->year1Rating = $request->year1r;
        $students->year1Achievement = $request->year1achi;
        $students->year2Rating = $request->year2r;
        $students->year2Achievement = $request->year2achi;
        $students->year3Rating = $request->year3r;
        $students->year3Achievement = $request->year3achi;
        $students->year4Rating = $request->year4r;
        $students->year4Achievement = $request->year4achi;
        $students->classID = $request->classes;
        $students->save();

        return view('admin.group.continue');
    }

    public function getNum(){
        return view('admin.group.number');
    }


}
