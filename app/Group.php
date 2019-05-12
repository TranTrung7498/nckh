<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = "tb_group";
    public $timestamps = false;

    public function student(){
        return $this->belongsToMany('App\Student','tb_student_group','groupID','studentID');
    }

    public function topic(){
        return $this->belongsTo('App\Topic','topicID');
    }

    public function teacher(){
        return $this->belongsTo('App\Teacher','teacherID');
    }
}
