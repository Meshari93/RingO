<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function subjects()
   {
     return $this->belongsToMany('App\Subject', 'subject_user');
   }

   public function year()
   {
     return $this->belongsTo('App\AcadmicYear','student_academic_years');
   }

       public function exam()
         {
           return $this->belongsToMany('App\Exam', 'exam_marks');
       }

    public function classes()
      {
        return $this->belongsToMany('App\Classes', 'class_user');
      }



}
