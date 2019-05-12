<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptanceTopic extends Model
{
    protected $table = "tb_acceptancetopic";
    public $timestamps = false;

    public function topic(){
        return $this->belongsTo('App\Topic','topicID');
    }
}
