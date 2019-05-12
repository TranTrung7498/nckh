<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = "tb_topic";
    public $timestamps = false;

    public function acceptancetopic() {
        return $this->hasOne('App\AcceptanceTopic','topicID');
    }

    public function outline() {
        return $this->hasOne('App\Outline','topicID');
    }

    public function progressreport() {
        return $this->hasOne('App\ProgressReport','topicID');
    }


}
