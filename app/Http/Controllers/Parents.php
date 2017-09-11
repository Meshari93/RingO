<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Classes;
use Auth;

class Parents extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
  protected function validator(array $data)
  {
      return Validator::make($data, [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|min:6|confirmed',
      ]);
  }
  public function shaw()
  {
    if(Auth::user()->rule !='admin' && Auth::user()->rule !='teacher' ){return back();}

    $i=1;
      if (Auth::user()->rule=='admin') { $parents = User::paginate(6);}
       else {$parents = User::all();}
       $classid = Classes::select('id','className')->get();
      return view('template.Parent.parent', compact('parents', 'classid', 'i'));
  }

  public function indexAddParent()
  {
    if(Auth::user()->rule !='admin'){return back();}
      return view ('template.Parent.addParent');

  }

  public function create(Request $request)
  {
    if(Auth::user()->rule !='admin'){return back();}
    $parent = new User;

   $parent->fullName     = $request->fullName;
   $parent->username     = $request->username;
   $parent->email        = $request->email;
   $parent->password     = bcrypt($request->password);
   $parent->gender       = $request->gender;
   $parent->birthday     = $request->birthday;
   $parent->address      = $request->address;
   $parent->phoneNo      = $request->phoneNo;
   $parent->address      = $request->address;
   $parent->rule         = $request->rule;

   $parent->save();
   return back();
 }

 public function delete(User $parentDelete)
 {
   if(Auth::user()->rule !='admin'){return back();}
     $parentDelete->delete();
     return back();
 }

 public function edit( User $parentEdit)
 {
   if(Auth::user()->rule !='admin'){return back();}
    return view('template.parent.edit', compact('parentEdit'));
 }

 public function update(Request $request, User $parent )
 {
   if(Auth::user()->rule !='admin'){return back();}

    $parent->update($request->all());
     return redirect('parent');
 }
}
