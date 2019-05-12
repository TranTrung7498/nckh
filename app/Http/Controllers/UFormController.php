<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class UFormController extends Controller
{
    public function getlist(){
        $data = Form::get();
        return view('user.form.form',['data'=>$data]);
    }

    public function download($id){
        $file = DB::table('tb_form')->where('id','=',$id)->get();
        foreach ($file as $f){
            return Response::download('upload/'.$f->fileName);
        }
    }
}
