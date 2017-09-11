<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

use App\Classes;
use App\Exam;
use App\Mark;
 use App\AcademicYear;
use App\Subject;
 use DB;
 use App\Examname;


class Exams extends Controller
{
  public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
  {

    $i =+1;
    $examid = Exam::paginate(6);;
    $classid = Classes::all();
    $subjectid = Subject::all();
    $studentParent = User::all();
      return view ('template.Exam.exam',compact('examid', 'i' ,'classid', 'subjectid', 'studentParent'));
  }

  public function indexAddExam()
  {
    if(Auth::user()->rule !='admin'){return back();}
     $classid = Classes::select('id','className')->get();
     $subjectid = Subject::select('id','subjectTitle','classSubjects')->get();
      $year =AcademicYear::where('isDefault','1')->select('id')->get();
      $examid = Examname::all();
       return view('template.Exam.addexam', compact('classid','year','subjectid','examid'));
   }

   public function store(Request $request)
   {
     if(Auth::user()->rule !='admin'){return back();}
     $this->validate($request, array(
           'examname'   => 'required|max:255',
        ));

     $exam = new Exam;
     $exam->examTitle          = $request->examname;
     $exam->examDescription     = $request->examDescription;
     $exam->examDate            = $request->examDate;
     $exam->examMark         = $request->examMark;
      $exam->examClasses         = $request->classid;
        $exam->examSubjects 	= $request->subjectid;
        $exam->examAcYear 	= $request->year;
        $exam->save();

        return back();

   }
   public function deleteExam(Exam $examDelete)
       {
         if(Auth::user()->rule !='admin'){return back();}
          $examDelete->delete();
          return back();
            }

    public function edit( Exam $examEdait)
    {
      if(Auth::user()->rule !='admin'){return back();}
        $classid = Classes::select('id','className')->get();
        $year =AcademicYear::where('isDefault','1')->select('id')->get();
            return view('template.Exam.editExam', compact('examEdait','classid','year'));
    }

    public function update(Request $request, Exam $exam )
    {
        if(Auth::user()->rule !='admin'){return back();}
       $exam->update($request->all());
        return redirect('exam');
    }


     public function correctExam(Exam $examMark )
           {
             if(Auth::user()->rule !='admin' && Auth::user()->rule !='teacher'){return back();}

             $i =+1;
             $id= $examMark->examClasses;
             $classid =Classes::all();
             $subjectid = Subject::all( );
             $studentid=User::all();
               return view('template.Exam.marksheet', compact('i', 'examMark', 'classid','id','subjectid','studentid'));
           }

           public function storeMark(Request $request)
           {
             if(Auth::user()->rule !=='admin' && Auth::user()->rule !='teacher'){return back();}
                   $sum = 0;
                   $size = 0;

                foreach($request->exam as $examvalues){
                  $examResult[]   = $examvalues;
                }
                foreach($request->student as $studentvalues){
                  $studentResult[] = $studentvalues;
                }
                foreach($request->subjects as $subjectsvalues){
                  $subjectsResult[] = $subjectsvalues;
                }
                foreach($request->mark as $markvalues){
                  $markResult[] = $markvalues;
                }
                foreach($request->comment as $commentvalues){
                  $commentResult[] = $commentvalues;
                }

                $j = 0;
                while($j < count($request->exam)) {
                  $Resultexam                 = $examResult[$j];
                   $Resultstudent                = $studentResult[$j];
                  $Resultsubjects                = $subjectsResult[$j];
                  $Resultmark                = $markResult[$j];
                  $sum += $Resultmark;
                  $size ++;
                  $Resultcomment                = $commentResult[$j];

                  $mark  = new Mark;
                  $mark->exam_id          = $Resultexam;
                   $mark->subject_id       = $Resultsubjects;
                  $mark->student_id       = $Resultstudent;
                  $mark->examMark        = $Resultmark;
                  $mark->markComments    = $Resultcomment;
                   $mark->save();
                $j++;
                }
                $average = $sum / $size;

                DB::table('exams')
                              ->where('id', $Resultexam)
                              ->update(['average' => $average]);
                 return redirect()->action('Exams@index');
           }


           public function indexCreateExam()
           {
             if(Auth::user()->rule !='admin' ){return back();}
             $i =+1;
             $examid = Examname::all();
                return view('template.Exam.createExam', compact('i','examid'));
            }

            public function createExam(Request $request)
            {
              if(Auth::user()->rule !='admin' ){return back();}
              $this->validate($request, array(
                    'examname'   => 'required|max:255',
                 ));
                  $exam = new Examname;
                  $exam->examName          = $request->examname;
                  $exam->save();
                  return redirect()->action('Exams@indexCreateExam');
            }

}
