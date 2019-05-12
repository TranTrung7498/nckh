<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Council extends Model
{
    protected $table = "tb_council";
    public $timestamps = false;
    
    public function teacher(){
        return $this->belongsToMany('App\Teacher','tb_teacher_council','councilID','teacherID');
    }

    public function manager(){
        return $this->belongsToMany('App\Manager','tb_manager_council','councilID','managerID');
    }
}
