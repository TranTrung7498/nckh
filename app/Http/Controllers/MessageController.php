<?php

namespace App\Http\Controllers;

use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function send(){
        $receiver = User::select('username')->get();
        return view('admin.message.send',['nhan'=>$receiver]);
    }

    public function postSend(Request $request){
        $noti = new Notification;
        $noti->id = Notification::max('id')+1;
        $noti->sender = Auth::user()->username;
        $noti->receiver = $request->receiver;
        $noti->description = $request->description;
        $noti->content = $request->contents;
        $noti->isRead = 0;
        $noti->date = date('Y-m-d',time());
        $noti->save();

        return redirect('admin/home');
    }

    public function received(){
        $data = Notification::select('id','sender','receiver','description','isRead','date')->where('receiver','=', Auth::user()->username)
            ->orderBy('date','DESC')->get();
        return view('admin.message.list',['data'=>$data]);
    }

    public function detail($id){
        $data = Notification::find($id);
        $data->isRead = 1;
        $data->save();

        $read = DB::table('tb_notification')->where('id','=',$id)->get();
        return view('admin.message.detail',['data'=>$read]);
    }

    public function sent(){
        $data = Notification::select('id','sender','receiver','description','isRead','date')->where('sender','=', Auth::user()->username)
            ->orderBy('date','DESC')->get();
        return view('admin.message.list',['data'=>$data]);
    }

    public function delete($id){
        $data = Notification::find($id);
        $data->delete();
        return redirect()->back();
    }
}
