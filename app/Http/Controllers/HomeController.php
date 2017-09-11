<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
      $parent = 0;
      $studnet = 0;
      $teacher =0;
      foreach ($users as $user) {
        if($user->rule=='student'){$studnet = $studnet + 1;}
        elseif($user->rule=='teacher') {$teacher = $teacher + 1;}
         elseif ($user->rule=='parent') {$parent = $parent + 1;}
      }
        return view('home', compact('users','parent','studnet','teacher'));
    }
    
 }
