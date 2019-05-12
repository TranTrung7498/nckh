<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "tb_teacher";
    public $timestamps = false;

    public function group(){
        return $this->hasMany('App\Group','teacherID');
    }

    public function council(){
        return $this->belongsToMany('App\Council','tb_teacher_council','teacherID','councilID');
    }

    public function faculty(){
        return $this->belongsTo('App\Faculty','facultyID');
    }
}
