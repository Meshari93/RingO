<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
  public $table="classes";

public function users()
{
  return $this->belongsToMany('App\User','class_user');
}
     public function exam()
  {
      return $this->hasOne('App\Exam');
  }

     public function subjects()
    {
        return $this->hasMany('App\Subject');
    }
}
