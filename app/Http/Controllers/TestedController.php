<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;


class TestedController extends Controller
{
    public function getinput(){
        return view('admin.tested.input');
    }

    public function postinput(Request $request){

        $query = Topic::where('name','LIKE','%'.$request->inputText.'%')->get();
        return view('admin.tested.result',["data"=>$query]);
    }
}
