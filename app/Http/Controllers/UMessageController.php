<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UMessageController extends Controller
{
    public function getlist(){
        $data = Notification::select('id','sender','description','isRead','date')->where('receiver','=', Auth::user()->username)
            ->orderBy('date','DESC')->get();
        return view('user.message.list',['data'=>$data]);
    }

    public function detail($id){
        $data = Notification::find($id);
        $data->isRead = 1;
        $data->save();

        $read = DB::table('tb_notification')->where('id','=',$id)->get();
        return view('user.message.detail',['data'=>$read]);
    }
}
