<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "tb_student";
    public $timestamps = false;

    public function group(){
        return $this->belongsToMany('App\Group','tb_student_group','studentID','groupID');
    }
    public function classes(){
        return $this->belongsTo('App\Classes','classID');
    }

}
