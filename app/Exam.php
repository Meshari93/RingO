<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{

public $table="exams";

public function academic_years()
{
    return $this->belongsTo('App\AcademicYear','examAcYear');
}

public function classes()
  {
      return $this->belongsTo('App\Classes');
  }

 

  public function users()
  {
    return $this->belongsToMany('App\User', 'exam_marks');
  }
}
