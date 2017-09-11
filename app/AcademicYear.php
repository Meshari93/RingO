<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
  public $table="academic_years";

  public function exam()
  {
      return $this->hasOne('App\Exam');
  }
 
}
