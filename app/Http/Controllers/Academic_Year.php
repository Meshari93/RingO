<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;
 use App\User;
 use Auth;
use App\AcademicYear;
use Illuminate\Support\Facades\Input;

class Academic_Year extends Controller
{

        public function __construct()
      {
        $this->middleware('auth');
      }
      public function index()
      {
        if(Auth::user()->rule !='admin'){return back();}

        $i =+1;
        $years = DB::table('academic_years')->get();
        return view ('template.Academic_Years.academicYear', compact('years', 'i'));
      }

      public function shaw()
      {   if(Auth::user()->rule !='admin'){return back();}
          return view('template.Academic_Years.addAcademicYears');
      }

      public function store(Request $request)
      {
        if(Auth::user()->rule !='admin'){return back();}
        $Default = Input::has('isDefault') ? true :false;
          $years = new AcademicYear;
       $years->semester     = $request->semester;
         $years->isDefault        = $Default;
        $years->save();
         return back();

      }
      public function delete(AcademicYear $academicYearDelete)
      {
        if(Auth::user()->rule !='admin'){return back();}
            if($academicYearDelete->isDefault == 1){
                return 'ca';
            }
             $academicYearDelete->delete();
          return back();
      }

      /////////////////Edit Controller/////////

      public function edit( AcademicYear $academicYearEdit)
      {
        if(Auth::user()->rule !='admin'){return back();}
         return view('template.Academic_Years.editAcademicYears', compact('academicYearEdit'));
      }

     public function update(Request $request )
     {
       if(Auth::user()->rule !='admin'){return back();}
       $academicYear = DB::table('academic_years');
        $academicYear->update(['semester' => 'mm']);
         return redirect('academicYear');
     }
     function active($academicYearActive){
       if(Auth::user()->rule !='admin'){return back();}

       DB::table('academic_years')->update(array('isDefault' => 0));
       $academicYear = AcademicYear::query()->find($academicYearActive);
  		$academicYear->isDefault = "1";
  		$academicYear->save();
         return back();
     }

}
