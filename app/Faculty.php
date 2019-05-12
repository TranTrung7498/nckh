<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = "tb_faculty";
    public $timestamps = false;

    public function student() {
        return $this->hasManyThrough('App\Student','App\Classes','facultyID','classID','id');
    }

    public function classes(){
        return $this->hasMany('App\Classes','facultyID');
    }

    public function topic(){
        return $this->hasMany('App\Topic','facultyID');
    }

    public function teacher(){
        return $this->hasMany('App\Teacher','facultyID');
    }
}
