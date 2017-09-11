<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;

class EmailController extends Controller
{
  public function index()
    {
      if(Auth::user()->rule !='admin'){return back();}
       return view ('template.mailbox.index');
    }


    public function sendView()
      {
        if(Auth::user()->rule !='admin'){return back();}
         return view ('template.mailbox.send');
      }
}
