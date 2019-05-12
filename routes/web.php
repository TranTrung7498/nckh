<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\File;
use App\Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Teacher;
use App\Faculty;
use App\Topic;
use App\Classes;
use App\Group;
use App\Student;
use App\Outline;
use App\AcceptanceTopic;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('postLogin', 'AuthController@Check');
Route::get('logout','AuthController@logout');
Route::get('homeDetail/{value}','HomeController@homeDetail')->middleware('check');
Route::get('homeDetailU/{value}','UTestController@homeDetail')->middleware('checkuser');
Route::group(['prefix' => 'admin'], function () {
    Route::get('home', function () {
        $faculty = Faculty::all()->toArray();
        $array = array();
        foreach ($faculty as $f){
            $topic = Topic::where('facultyID','=',$f['id'])->count();
            array_push($array,$topic);
        }
        return view('admin.home',['sl'=>$array]);
    });
    Route::group(['prefix' => 'search'], function () {
        Route::get('/', 'SearchController@getsearch')->middleware('check');                  //Done
        Route::post('postSearch', 'SearchController@postsearch');
        Route::get('result', 'SearchController@result')->middleware('check');
        Route::get('detail/{id}', 'SearchController@getdetail')->middleware('check');
        Route::get('add', 'SearchController@getadd')->middleware('check');
        Route::post('postAdd', 'SearchController@postadd');
        Route::get('update/{id}', 'SearchController@getupdate')->middleware('check');
        Route::post('postUpdate', 'SearchController@postupdate');
        Route::get('delete/{id}', 'SearchController@getdelete')->middleware('check');
        Route::get('export','SearchController@export')->middleware('check');
        Route::post('download', 'SearchController@download');
    });
    Route::group(['prefix' => 'outline'], function () {
        Route::get('/', 'OutlineController@getlist')->middleware('check');                   //Done
        Route::get('post/{id}', 'OutlineController@postoutline')->middleware('check');
        Route::post('addOutline', 'OutlineController@addoutline')->middleware('check');
        Route::get('listUpdate','OutlineController@listupdate')->middleware('check');
        Route::get('update/{id}', 'OutlineController@getupdate')->middleware('check');
        Route::post('postUpdate', 'OutlineController@postupdate');
        Route::get('delete/{id}', 'OutlineController@destroy')->middleware('check');
    });
    Route::group(['prefix' => 'accept'], function () {
        Route::get('/', 'AcceptController@getlist')->middleware('check');                   //Done
        Route::get('post/{id}', 'AcceptController@postaccept')->middleware('check');
        Route::post('addAccept', 'AcceptController@addaccept')->middleware('check');
        Route::get('listUpdate','AcceptController@listupdate')->middleware('check');
        Route::get('update/{id}', 'AcceptController@getupdate')->middleware('check');
        Route::post('postUpdate', 'AcceptController@postupdate')->middleware('check');
        Route::get('delete/{id}', 'AcceptController@destroy')->middleware('check');
    });
    Route::group(['prefix' => 'regtopic'], function () {                    //Done
        Route::get('/', 'RegTopicController@getform')->middleware('checkadmin');
        Route::post('post', 'RegTopicController@postform');
    });
    Route::group(['prefix' => 'tested'], function () {                      //Done
        Route::get('/', 'TestedController@getinput')->middleware('check');
        Route::post('post', 'TestedController@postinput');
        Route::get('result', 'TestedController@getresult');
    });
    Route::group(['prefix' => 'account'], function () {                     //Done
        Route::get('/','AccountController@list')->middleware('check');
        Route::get('add','AccountController@getAdd')->middleware('check');
        Route::post('postAdd', 'AccountController@postAdd');
        Route::get('update/{id}','AccountController@update')->middleware('check');
        Route::post('postUpdate', 'AccountController@postUpdate');
        Route::get('delete/{id}','AccountController@delete')->middleware('check');
    });
    Route::group(['prefix' => 'report'], function () {                  //Done
        Route::get('/', 'ReportController@get')->middleware('check');
        Route::get('add/{id}','ReportController@add')->middleware('check');
        Route::post('post','ReportController@post');
        Route::get('detail/{id}','ReportController@detail')->middleware('check');
        Route::get('getdetail','ReportController@getdetail')->middleware('check');
        Route::get('delete/{id}','ReportController@delete')->middleware('check');
    });
    Route::group(['prefix' => 'group'], function () {
        Route::get('/','GroupController@get')->middleware('check');
        Route::get('add','GroupController@getadd')->middleware('check');
        Route::post('post','GroupController@postadd');
        Route::get('addStudent','GroupController@addStudent');
        Route::post('postStudent','GroupController@postStudent');
        Route::get('detail/{id}','GroupController@detail')->middleware('check');
        Route::get('update/{id}','GroupController@update')->middleware('check');
        Route::post('postUpdate','GroupController@postupdate');
        Route::get('delete/{id}','GroupController@delete')->middleware('check');
    });
    Route::group(['prefix' => 'message'], function () {                         //Done
        Route::get('send','MessageController@send')->middleware('check');
        Route::post('postSend','MessageController@postSend');
        Route::get('received','MessageController@received')->middleware('check');
        Route::get('sent','MessageController@sent')->middleware('check');
        Route::get('detail/{id}','MessageController@detail')->middleware('check');
        Route::get('delete/{id}','MessageController@delete')->middleware('check');
    });
    Route::group(['prefix' => 'form'], function () {                        //Done
        Route::get('new','FormController@new')->middleware('check');
        Route::post('post','FormController@post');
        Route::get('list','FormController@listForm')->middleware('check');
        Route::get('delete/{id}','FormController@delete')->middleware('check');
        Route::get('update/{id}','FormController@update')->middleware('check');
        Route::post('postUpdate','FormController@postUpdate');
        Route::get('download/{id}','FormController@download')->middleware('check');
    });
    Route::group(['prefix' => 'secondary'], function () {
        Route::get('teacher','SecondaryController@listTC');
        Route::get('addTC','SecondaryController@addTC');
        Route::post('postTeacher','SecondaryController@postTC');
        Route::get('updateTC/{id}','SecondaryController@updateTC');
        Route::post('postUpdateTC','SecondaryController@postUpdateTC');
        Route::get('classes','SecondaryController@listCL');
        Route::get('addCL','SecondaryController@addCL');
        Route::post('postClasses','SecondaryController@postCL');
        Route::get('updateCL/{id}','SecondaryController@updateCL');
        Route::post('postUpdateCL','SecondaryController@postUpdateCL');
    });
});

Route::group(['prefix' => 'user'], function () {
    Route::get('home', function () {
        $faculty = Faculty::all()->toArray();
        $array = array();
        foreach ($faculty as $f){
            $topic = Topic::where('facultyID','=',$f['id'])->count();
            array_push($array,$topic);
        }
        return view('user.home',['sl'=>$array]);
    });
    Route::group(['prefix' => 'search'], function () {
        Route::get('/', 'USearchController@getSearch')->middleware('checkuser');
        Route::post('postSearch', 'USearchController@postSearch');
        Route::get('detail/{id}','USearchController@getdetail')->middleware('checkuser');
    });
    Route::group(['prefix' => 'tested'], function () {
        Route::get('/', 'UTestController@getTest')->middleware('checkuser');
        Route::post('post', 'UTestController@postTest');
    });
    Route::group(['prefix' => 'message'], function () {
        Route::get('list','UMessageController@getlist')->middleware('checkuser');
        Route::get('detail/{id}','UMessageController@detail')->middleware('checkuser');
    });
    Route::group(['prefix' => 'form'], function () {
        Route::get('/','UFormController@getlist')->middleware('checkuser');
        Route::get('download/{id}','UFormController@download')->middleware('checkuser');
    });
});
