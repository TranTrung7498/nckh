<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = "tb_manager";
    public $timestamps = false;

    public function council(){
        return $this->belongsToMany('App\Council','tb_manager_council','managerID','councilID');
    }
}
