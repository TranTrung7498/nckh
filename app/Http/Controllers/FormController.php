<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class FormController extends Controller
{
    public function listForm(){
        $data = Form::get();
        return view('admin.form.list',['data'=>$data]);
    }

    public function new(){
        return view('admin.form.new');
    }

    public function post(Request $request){
        if ($request->hasFile('form')){
            $file = $request->form;
            $file->move('upload',$file->getClientOriginalName());

            $form = new Form;
            $form->id = Form::max('id')+1;
            $form->title = $request->title;
            $form->description = $request->description;
            $form->fileName = $file->getClientOriginalName();
            $form->save();
        }
        return redirect('admin/form/list');
    }

    public function update($id){
        $old = DB::table('tb_form')->where('id','=',$id)->get();
        return view('admin.form.update',['data'=>$old]);
    }

    public function postUpdate(Request $request){
        $form = Form::find($request->id);
        $form->title = $request->title;
        $form->description = $request->description;
        if ($request->hasFile('form')){
            $file = $request->form;
            $file->move('upload',$file->getClientOriginalName());
            $form->fileName = $file->getClientOriginalName();
        }
        $form->save();
        return redirect('admin/form/list');
    }

    public function delete($id){
        $file = DB::table('tb_form')->where('id','=',$id)->get();
        foreach ($file as $f){
            File::delete('upload/'.$f->fileName);
        }
        $form = Form::find($id);
        $form->delete();
        return redirect('admin/form/list');
    }

    public function download($id){
        $file = DB::table('tb_form')->where('id','=',$id)->get();
        foreach ($file as $f){
            return Response::download('upload/'.$f->fileName);
        }
    }
}
