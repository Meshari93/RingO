<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;
use App\User;
use Auth;
use App\Classes;
use App\Subject;
use App\Image;

class Teachers extends Controller
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


   public function index()
  {
    $studentid =0;
    $i=1;
       if (Auth::user()->rule=='admin') {
        $teachers = User::paginate(6);
      }
      else {$teachers = User::all();}
      $classesid = Classes::all();

      return view('template.Teacher.teachers', compact('teachers', 'i','classesid','studentid'));
  }
    public function indexAddTeachers()
    {
       if (Auth::user()->rule !='admin'){return bake();}
      return view ('template.teacher.addTeacher');
    }

   public function delete(User $teacherDelete)
   {
       if (Auth::user()->rule !='admin'){return bake();}
        $teacherDelete->subjects()->detach();
       $teacherDelete->delete();
       return back();
   }

   /////////////////Edit Controller/////////

   public function edit( User $teacherEdit)
   {
     if (Auth::user()->rule !='admin'){return bake();}
      return view('template.teacher.edit', compact('teacherEdit'));
   }

  public function update(Request $request, User $teacher )
  {
    if (Auth::user()->rule !='admin'){return bake();}
     $teacher->update($request->all());
      return redirect('teachers');
  }

  public function leaderBoard(Request $request, User $teacher)
  {
    if (Auth::user()->rule !='admin'){return bake();}
        $teacher->isLeaderBoard     = $request->isLeaderBoard;
      $teacher->save();
      return redirect('teachers');
  }

  protected function create(Request $request)
  {
    if (Auth::user()->rule !='admin'){return bake();}
    $teacher = new User;
    $teacher->fullName     = $request->fullName;
   $teacher->username     = $request->username;
   $teacher->email        = $request->email;
   $teacher->password     = bcrypt($request->password);
       $teacher->rule      = $request->rule;
  $teacher->remember_token = str_random(10);
   $teacher->save();
   return back();
 }
}
