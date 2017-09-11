<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Classes;
use Auth;

class Students extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
  protected function validator(array $data)
  {
      return Validator::make($data, [
          'username' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|min:6|confirmed',
          'rule' => 'required',
       ]);
  }

  public function shaw()
  {
     $i=1;
       if (Auth::user()->rule=='admin')
       {
         $students = User::paginate(6);
       }
        else {$students = User::all();}
      $classid = Classes::select('id','className')->get();
      return view('template.Student.student', compact('students', 'classid', 'i'));
  }
  public function indexAddStudent()
  {
    if(Auth::user()->rule !='admin' ){return back();}
    $classid = Classes::select('id','className')->get();
    $parent = User::where('rule','parent')->select('id','fullName')->get();
     return view('template.Student.addStudent', compact('classid','parent'));
   }
      protected function create(Request $request)
      {
        if(Auth::user()->rule !='admin' ){return back();}
        $student = new User;
        $student->fullName     = $request->fullName;
       $student->username     = $request->username;
       $student->email        = $request->email;
       $student->password     = bcrypt($request->password);
       $student->rule         = $request->rule;
       $student->studentClass         = $request->classid;
       $student->studentParent         = $request->parent;
            $student->save();
           return back();
      }


     public function delete(User $studentDelete)
     {
       if(Auth::user()->rule !='admin' ){return back();}

         $studentDelete->delete();
         return back();
     }

     public function edit( User $studentEdit)
     {
       if(Auth::user()->rule !='admin' ){return back();}
        return view('template.student.edit', compact('studentEdit'));
     }

     public function update(Request $request, User $student )
     {
       if(Auth::user()->rule !='admin' ){return back();}
        $student->update($request->all());
         return redirect('student');
     }

     public function leaderBoard(Request $request, User $student)
     {
       if(Auth::user()->rule !='admin' ){return back();}
           $student->isLeaderBoard     = $request->isLeaderBoard;
           $student->save();
         return redirect('student');
     }
  }
