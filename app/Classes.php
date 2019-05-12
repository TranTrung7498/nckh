<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = "tb_class";
    public $timestamps = false;

    public function student(){
        return $this->hasMany('App\Student','classID');
    }

    public function faculty(){
        return $this->belongsTo('App\Faculty','facultyID');
    }
}
