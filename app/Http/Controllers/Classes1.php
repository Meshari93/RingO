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
 use App\Classes;
use App\User;



class Classes1 extends Controller
{
  public function __construct()
    {
      $this->middleware('auth');
    }

public function index()
  {
    if(Auth::user()->rule !='admin'){return back();}
    $i =+1;
    $classesid = Classes::all();
     return view ('template.Class.class', compact('classesid', 'i'));
  }

  public function shaw()
  {
       if(Auth::user()->rule !='admin'){return back();}
     $teachers = User::where('rule','teacher')->select('id','fullName')->get();
     return view('template.Class.addClasses', compact('teachers'));
  }


    public function store(Request $request)
    {
      if(Auth::user()->rule !='admin'){return back();}
      $this->validate($request, array(
            'className'   => 'required|max:255',
         ));
      $classes = new Classes;
     $classes->className     = $request->className;
      $classes->save();

     if (isset($request->teacher)) {
       $classes->users()->sync($request->teacher);}
       else {
         $classes->users()->sync(array());}
      return back();

    }


    public function delete(Classes $classDelete)
        {
          if(Auth::user()->rule !='admin'){return back();}

          $classDelete->users()->detach();
            $classDelete->delete();
            return back();
        }
}
