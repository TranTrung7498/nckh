<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outline extends Model
{
    protected $table = "tb_outline";
    public $timestamps = false;

    public function topic(){
        return $this->belongsTo('App\Topic','topicID');
    }
}
