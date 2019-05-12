<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgressReport extends Model
{
    protected $table = "tb_progressreport";
    public $timestamps = false;

    public function topic(){
        return $this->belongsTo('App\Topic','topicID');
    }
}
