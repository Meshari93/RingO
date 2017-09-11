<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
|Meshari Jabbar
*/

Route::auth();
Route::get('/', 'HomeController@index');

  Route::get('/home', 'HomeController@index');



 /*
| Teachers Router
|
*/
Route::get('teachers', 'Teachers@index');
Route::get('addTeachers', 'Teachers@indexAddTeachers');
Route::post('teachers', 'Teachers@create');
 Route::get('teachers/{teacherDelete}/delete', 'Teachers@delete');
Route::get('teachers/{teacherEdit}/edit', 'Teachers@edit');
Route::post('teachers/{teacher}/update', 'Teachers@update');
Route::post('teachers/{teacher}/leaderBoard', 'Teachers@leaderBoard');
Route::post('studentid', 'Teachers@studentid');




/*
| Student Router.
|
*/
Route::get('student', 'Students@shaw');
Route::get('addStudent', 'Students@indexAddStudent');
Route::post('addNewStudent', 'Students@create');
Route::get('student/{studentDelete}/delete', 'Students@delete');
Route::get('student/{studentEdit}/edit', 'Students@edit');
Route::post('student/{student}/update', 'Students@update');
Route::post('student/{student}/leaderBoard', 'Students@leaderBoard');
Route::get('markStudent/{studentidMark}/Studentmarksheet', 'Marksheet@shawMarkStudent');
Route::get('markStudent/{studentidMark}/Studentmarkchart', 'Marksheet@shawMarkChartStudent');



/*
| Parents Router.
|
*/
Route::get('parent', 'Parents@shaw');
Route::get('addParent', 'Parents@indexAddParent');
Route::post('addNewParent', 'Parents@create');
Route::get('parent/{parentDelete}/delete', 'Parents@delete');
Route::get('parent/{parentEdit}/edit', 'Parents@edit');
Route::post('parent/{parent}/update', 'Parents@update');


/*
|Exam   Router
|
*/
Route::get('exam', 'Exams@index');
Route::get('addExam', 'Exams@indexAddExam');
Route::post('addNewExam', 'Exams@store');
Route::get('exam/{examDelete}/delete', 'Exams@deleteExam');
Route::get('exam/{examEdit}/edit', 'Exams@edit');
Route::post('exam/{examUpdate}/update', 'Exams@update');
Route::get('exam/{examMark}/correct', 'Exams@correctExam');
 Route::post('exam/{examMark}/markStore', 'Exams@storeMark');
 Route::get('createExam', 'Exams@indexCreateExam');
 Route::post('createNewExam', 'Exams@createExam');




/*
|Class   Router
|
*/
Route::get('class', 'Classes1@index');
Route::get('addClasses', 'Classes1@shaw');
Route::post('createClasses', 'Classes1@store');
Route::get('class/{classDelete}/delete', 'Classes1@delete');


/*
| Subjects Router
|
*/

Route::get('subjects', 'Subjects@index');
Route::get('addSubjects', 'Subjects@shaw');
Route::post('createSubjects', 'Subjects@store');
Route::get('subjects/{subjectEdit}/edit', 'Subjects@edit');
Route::PUT('subjects/{subjectEdit}/updateSubject', 'Subjects@updateSubject');
Route::get('subjects/{subjectDelete}/delete', 'Subjects@delete');





/*
| Academic Year  Router
|
*/
Route::get('academicYear', 'Academic_Year@index');
Route::get('addAcademicYears', 'Academic_Year@shaw');
Route::post('createAcademicYears', 'Academic_Year@store');
Route::get('academicYear/{academicYearEdit}/edit', 'Academic_Year@edit');
Route::post('academicYear/{academicYear}/update', 'Academic_Year@update');
Route::get('academicYear/{academicYearDelete}/delete', 'Academic_Year@delete');
Route::get('academicYear/{academicYearActive}/active', 'Academic_Year@active');




/*
| Marksheet  Router
|
*/
Route::get('markStudent', 'Marksheet@shawMark');
Route::get('chart', 'Marksheet@shawChart');

/*
| Email Router
|
*/
Route::get('mailbox', 'EmailController@index');
Route::get('sendMail', 'EmailController@sendView');






















//
