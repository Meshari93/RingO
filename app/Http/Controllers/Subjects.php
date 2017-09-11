<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;
use Auth;
use App\Subject;
use App\Classes;
 use App\Image;
use App\User;

class Subjects extends Controller


{

  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
   if(Auth::user()->rule !='admin'){return back();}
     $i =+1;
    $subjects = Subject::paginate(6);
    $classes = Classes::all();
    return view ('template.Subjects.subjects', compact('subjects', 'i' ,'classes'));
  }


  public function store(Request $request)
  {
    if(Auth::user()->rule !='admin'){return back();}

    $this->validate($request, array(
          'subjectTitle'   => 'required|max:255',
           'passGrade'     => 'required',
            'finalGrade'   => 'required'
      ));
    $subjects = new Subject;
   $subjects->subjectTitle     = $request->subjectTitle;
   $subjects->classSubjects         = $request->classid;
    $subjects->passGrade        = $request->passGrade;
   $subjects->finalGrade       = $request->finalGrade;
   $subjects->save();

   if (isset($request->teacher)) {
     $subjects->users()->sync($request->teacher);}
     else {
       $subjects->users()->sync(array());}
    return back();

  }

 public function shaw()
 {
   if(Auth::user()->rule !='admin'){return back();}
   $classid = Classes::select('id','className')->get();
    $teachers = User::where('rule','teacher')->select('id','fullName')->get();
    return view('template.Subjects.addSubjects', compact('teachers','classid'));
 }


 public function edit( Subject $subjectEdit)
       {
          if(Auth::user()->rule !='admin'){return back();}


         $teachers = User::where('rule','teacher')->select('id','fullName')->get();
         $teacher2 = array();
         foreach ($teachers as $teacher) {
           $teacher2[$teacher->id] = $teacher->fullName;
         }
           return view('template.Subjects.editSubjects', compact('subjectEdit','teachers', 'teacher2'));
       }



 public function delete(Subject $subjectDelete)
     {
        if(Auth::user()->rule !='admin'){return back();}
       $subjectDelete->users()->detach();
         $subjectDelete->delete();
         return back();
     }
 public function updateSubject(Request $request,Subject $subjectUpdate)
     {
       if(Auth::user()->rule !='admin'){return back();}
       $subjectUpdate->update($request->all());
       if (isset($request->teacher)) {
         $subjectUpdate->users()->sync($request->teacher);}
         else {
           $subjectUpdate->users()->sync(array());}
         return redirect('subjects');
     }




}
