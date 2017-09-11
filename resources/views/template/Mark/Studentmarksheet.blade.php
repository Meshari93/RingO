@include('layouts.inc.head')
@include('layouts.inc.header')
@include('layouts.inc.sidebar')

<div  class="content-wrapper" style="min-height: 900px;">
<section class="content-header">
    <h3>
        <i class="fa fa-table"></i> Marksheet
    </h3>
</section>

<section class="content">
  <a href="javascript:window.print()" class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print">Print</a>

   <div class="box col-xs-4">
         <div class="box-header">
          <h3 class="box-title">mark exams:</h3>
          </div>
           <div class="row" >
              <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
            <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 50px;"> ID </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 170px;"> Subject </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 110px;"> First Exam </th>
                  <th class="sorting" tabindex="1" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 50px;"> average </th>
                   <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 130px;"> Second Exam</th>
                   <th class="sorting" tabindex="1" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 50px;"> average </th>

                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 100px;"> Participation</th>
                  <th class="sorting" tabindex="1" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 50px;"> average </th>

                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 130px;"> Final Exam</th>
                  <th class="sorting" tabindex="1" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 50px;"> average </th>

                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 120px;"> Pass grade	</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 118px;"> Total Marks</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 80px;"> Grade</th>
               </tr>
            </thead>
            <tbody>

              @foreach ($subjects as $subject)
                @if($studentidMark->studentClass == $subject->classSubjects)

              <tr role="row" class="odd">
                <td class="sorting_1">{{$i++}}</td>
                <td class="">
                  {{$subject->subjectTitle}}
                  </td>
                      <td>
                        @foreach ($examName as $exam)
                             @if( $exam->examSubjects == $subject->id && $exam->examTitle == 'First Exam' )
                                  @foreach ($markStudent as $mark)
                                   @if($exam->examSubjects == $mark->subject_id   && $studentidMark->id == $mark->student_id && $exam->id == $mark->exam_id)
                                   {{$mark->examMark}} / {{$exam->examMark}}  @php($sum = $sum + ($exam->examMark - $mark->examMark))
                               @endif
                            @endforeach
                            @endif
                         @endforeach
                            </td>
                            <td>
                          @foreach ($examName as $exam)
                                @if( $exam->examSubjects == $subject->id && $exam->examTitle == 'First Exam' )
                                   @foreach ($markStudent as $mark)
                                     @if($exam->examSubjects == $mark->subject_id   && $studentidMark->id == $mark->student_id && $exam->id == $mark->exam_id)
                                     {{$exam->average}}
                                     @endif
                                     @endforeach
                                @endif
                           @endforeach
                          </td>
                          <td>
                            @foreach ($examName as $exam)
                                 @foreach ($markStudent as $mark)
                                     @if( $exam->examSubjects == $subject->id && $exam->examTitle == 'Second Exam' )
                                        @if($exam->examSubjects == $mark->subject_id   && $studentidMark->id == $mark->student_id && $exam->id == $mark->exam_id)
                                       {{$mark->examMark}} / {{$exam->examMark}}  @php($sum = $sum + ($exam->examMark - $mark->examMark))
                                       @endif
                                     @endif
                                @endforeach
                             @endforeach
                                </td>
                                <td>
                              @foreach ($examName as $exam)
                                   @foreach ($markStudent as $mark)
                                       @if( $exam->examSubjects == $subject->id && $exam->examTitle == 'Second Exam' && $exam->id == $mark->exam_id)
                                         @if($exam->examSubjects == $mark->subject_id   && $studentidMark->id == $mark->student_id)
                                         {{$exam->average}}
                                         @endif
                                       @endif
                                  @endforeach
                               @endforeach
                              </td>



                              <td>
                                @foreach ($examName as $exam)
                                     @foreach ($markStudent as $mark)
                                         @if( $exam->examSubjects == $subject->id && $exam->examTitle == 'Participation' && $exam->id == $mark->exam_id)
                                           @if($exam->examSubjects == $mark->subject_id   && $studentidMark->id == $mark->student_id)
                                           {{$mark->examMark}} / {{$exam->examMark}}  @php($sum = $sum + ($exam->examMark - $mark->examMark))
                                           @endif
                                         @endif
                                    @endforeach
                                 @endforeach
                                    </td>
                                    <td>
                                  @foreach ($examName as $exam)
                                       @foreach ($markStudent as $mark)
                                           @if( $exam->examSubjects == $subject->id && $exam->examTitle == 'Participation' && $exam->id == $mark->exam_id)
                                             @if($exam->examSubjects == $mark->subject_id   && $studentidMark->id == $mark->student_id)
                                             {{$exam->average}}
                                             @endif
                                           @endif
                                      @endforeach
                                   @endforeach
                                  </td>


                                <td>
                                  @foreach ($examName as $exam)
                                       @foreach ($markStudent as $mark)
                                           @if( $exam->examSubjects == $subject->id && $exam->examTitle == 'Final Exam' && $exam->id == $mark->exam_id)
                                             @if($exam->examSubjects == $mark->subject_id   && $studentidMark->id == $mark->student_id)
                                             {{$mark->examMark}} / {{$exam->examMark}}  @php($sum = $sum + ($exam->examMark - $mark->examMark))
                                             @endif
                                           @endif
                                      @endforeach
                                   @endforeach
                                      </td>
                                      <td>
                                    @foreach ($examName as $exam)
                                         @foreach ($markStudent as $mark)
                                             @if( $exam->examSubjects == $subject->id && $exam->examTitle == 'Final Exam' && $exam->id == $mark->exam_id)
                                               @if($exam->examSubjects == $mark->subject_id   && $studentidMark->id == $mark->student_id)
                                               {{$exam->average}}
                                               @endif
                                             @endif
                                        @endforeach
                                     @endforeach
                                    </td>

                                   <td >
                                     {{$subject->passGrade}}
                                   </td>
                                      <td >
                                      {{ 100 - $sum }}
                                     </td>
                                    <td>
                                    </td>
                                     @php($sum = $sum = 0)
                  </tr>
                @endif
                @endforeach
          </tbody>
            <tfoot>
            </tfoot>
          </table>
        </div>
      </div>


    </div>

         <!-- /.box-body -->
  </section>



</div>




@include('layouts.inc.footer')
