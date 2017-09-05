<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

//    public $directory = "images/";

    public function user(){
        return $this->belongsTo('App\User');
    }

//    public function getPathAttribute($value){
//        return $this->directory . $value;
//    }
}
