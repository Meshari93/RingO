<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
 use App\User;
use App\Classes;
use Auth;
use App\Subject;
use App\Mark;
use App\Exam;
use DB;
use Charts;


class Marksheet extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function shawMark()
    {
      $i =+1;
      $sum =0;
      $subjects = Subject::all();
      $examName = Exam::all();
      $classid = Classes::select('id','className')->get();
      $markStudent = Mark::all();


      return view('template.Mark.marksheet', compact('classid', 'subjects', 'i','examName','markStudent', 'sum'));

    }

    public function shawChart()
    {

      $sum = 0;
      $avg =0;
      $subjectName = [];
      $totalMark = [];
      $totalAvg = [];

      $subjects = Subject::all();
      $markStudent = Mark::all();
      $examName = Exam::all();
      $classid = Classes::select('id','className')->get();
      foreach ($subjects as $subject) {
        if(Auth::user()->studentClass == $subject->classSubjects)
        {
        $subjectName[] =  $subject->subjectTitle;

    /////////////////////////////////////////////////////////////////////////////
           foreach ($examName as $exam)
           {
                foreach ($markStudent as $mark)
                {
                    if( $exam->examSubjects == $subject->id && $exam->examTitle == 'First Exam' && $exam->id == $mark->exam_id)
                    {
                      if($exam->examSubjects == $mark->subject_id   && Auth::user()->id == $mark->student_id)
                      {$sum = $sum + ($exam->examMark - $mark->examMark);}
                    }
               }
            }
         foreach ($examName as $exam)
         {
              foreach ($markStudent as $mark)
              {
                  if( $exam->examSubjects == $subject->id && $exam->examTitle == 'First Exam' && $exam->id == $mark->exam_id)
                  {
                    if($exam->examSubjects == $mark->subject_id   && Auth::user()->id == $mark->student_id)
                    { $avg = $avg + $exam->average;}
                  }
             }
          }
        foreach ($examName as $exam)
       {
            foreach ($markStudent as $mark)
            {
                if( $exam->examSubjects == $subject->id && $exam->examTitle == 'Second Exam' && $exam->id == $mark->exam_id)
                {
                  if($exam->examSubjects == $mark->subject_id   && Auth::user()->id == $mark->student_id)
                  {$sum = $sum + ($exam->examMark - $mark->examMark);
                   $avg = $avg + $exam->average;}
                }
           }
        }
          foreach ($examName as $exam)
         {
              foreach ($markStudent as $mark)
              {
                  if( $exam->examSubjects == $subject->id && $exam->examTitle == 'Participation' && $exam->id == $mark->exam_id)
                  {
                    if($exam->examSubjects == $mark->subject_id   && Auth::user()->id == $mark->student_id)
                    {$sum = $sum + ($exam->examMark - $mark->examMark);
                    $avg = $avg + $exam->average;}
                  }
             }
          }
         foreach ($examName as $exam)
        {
             foreach ($markStudent as $mark)
             {
                 if( $exam->examSubjects == $subject->id && $exam->examTitle == 'Final Exam' && $exam->id == $mark->exam_id)
                 {
                   if($exam->examSubjects == $mark->subject_id   && Auth::user()->id == $mark->student_id)
                   {$sum = $sum + ($exam->examMark - $mark->examMark);
                   $avg = $avg + $exam->average; }
                 }
            }
         }

           $totalMark[] = 100 - $sum ;
          $totalAvg[] = $avg ;

         $sum = $sum = 0;
         $avg = $avg = 0;
         }
       }
      $chart =   Charts::multi('line', 'highcharts')
                            ->title('Chart of Mark')
                            ->colors(['#1621FF', '#FF0000'])
                            ->labels($subjectName)
                            ->dataset('Mark', $totalMark)
                            ->dataset('Average',  $totalAvg);
      return view('template.Mark.chart', compact('chart'));

    }
    public function shawMarkStudent(User $studentidMark)
    {
            $i =+1;
            $sum =0;
            $subjects = Subject::all();
            $examName = Exam::all();
            $classid = Classes::select('id','className')->get();
            $markStudent = Mark::all();


      return view('template.Mark.Studentmarksheet', compact('classid', 'subjects', 'i','examName','markStudent', 'sum', 'studentidMark'));
}

public function shawMarkChartStudent(User $studentidMark)
{
      $sum = 0;
      $avg =0;
      $subjectName = [];
      $totalMark = [];
      $totalAvg = [];

      $subjects = Subject::all();
      $markStudent = Mark::all();
      $examName = Exam::all();
      $classid = Classes::select('id','className')->get();
      foreach ($subjects as $subject) {
        if($studentidMark->studentClass == $subject->classSubjects)
        {
        $subjectName[] =  $subject->subjectTitle;

            foreach ($examName as $exam)
           {
                foreach ($markStudent as $mark)
                {
                    if( $exam->examSubjects == $subject->id && $exam->examTitle == 'First Exam' && $exam->id == $mark->exam_id)
                    {
                      if($exam->examSubjects == $mark->subject_id   && $studentidMark->id == $mark->student_id)
                      {$sum = $sum + ($exam->examMark - $mark->examMark);}
                    }
               }
            }
         foreach ($examName as $exam)
         {
              foreach ($markStudent as $mark)
              {
                  if( $exam->examSubjects == $subject->id && $exam->examTitle == 'First Exam' && $exam->id == $mark->exam_id)
                  {
                    if($exam->examSubjects == $mark->subject_id   && $studentidMark->id == $mark->student_id)
                    { $avg = $avg + $exam->average;}
                  }
             }
          }
        foreach ($examName as $exam)
       {
            foreach ($markStudent as $mark)
            {
                if( $exam->examSubjects == $subject->id && $exam->examTitle == 'Second Exam' && $exam->id == $mark->exam_id)
                {
                  if($exam->examSubjects == $mark->subject_id   && $studentidMark->id == $mark->student_id)
                  {$sum = $sum + ($exam->examMark - $mark->examMark);
                   $avg = $avg + $exam->average;}
                }
           }
        }
          foreach ($examName as $exam)
         {
              foreach ($markStudent as $mark)
              {
                  if( $exam->examSubjects == $subject->id && $exam->examTitle == 'Participation' && $exam->id == $mark->exam_id)
                  {
                    if($exam->examSubjects == $mark->subject_id   && $studentidMark->id == $mark->student_id)
                    {$sum = $sum + ($exam->examMark - $mark->examMark);
                    $avg = $avg + $exam->average;}
                  }
             }
      }
     foreach ($examName as $exam)
    {
             foreach ($markStudent as $mark)
             {
                 if( $exam->examSubjects == $subject->id && $exam->examTitle == 'Final Exam' && $exam->id == $mark->exam_id)
                 {
                   if($exam->examSubjects == $mark->subject_id   && $studentidMark->id == $mark->student_id)
                   {$sum = $sum + ($exam->examMark - $mark->examMark);
                   $avg = $avg + $exam->average; }
                 }
            }
         }

           $totalMark[] = 100 - $sum ;
          $totalAvg[] = $avg ;

         $sum = $sum = 0;
         $avg = $avg = 0;
         }
       }
      $chart =   Charts::multi('line', 'highcharts')
                            ->title('Chart of Mark')
                            ->colors(['#1621FF', '#FF0000'])
                            ->labels($subjectName)
                            ->dataset('Mark', $totalMark)
                            ->dataset('Average',  $totalAvg);
      return view('template.Mark.chart', compact('chart'));

    }

}
