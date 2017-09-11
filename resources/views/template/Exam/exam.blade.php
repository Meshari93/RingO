@include('layouts.inc.head')
@include('layouts.inc.header')
@include('layouts.inc.sidebar')

<div  class="content-wrapper">
    <section class="content-header">
        <h3>
            <i class="fa fa-graduation-cap"></i>Exam List
        </h3>
    </section>

    <section class="content">
      <a href="javascript:window.print()" class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print">Print</a>
      @if(Auth::user()->rule=='admin' || Auth::user()->rule=='teacher')
        <a  href="{{ url('/addExam') }}" class="floatRTL btn btn-success btn-flat pull-right no-print">Add Exam</a>
        @endif
       <div class="box col-xs-4">
             <div class="box-header">
              <h3 class="box-title">List exams:</h3>
            </div>
               <div class="row" >
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 50px;"> ID </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 250px;"> Exam Name	  </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 250px;"> Exam Description	  </th>
                      @if(Auth::user()->rule=='admin')
                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 249px;">
                        Class
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 249px;">
                       Subject
                     </th>
                        @endif
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 249px;">  Date		</th>
                      @if(Auth::user()->rule=='admin' || Auth::user()->rule=='teacher')
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 324px;">Operations</th>
                      @endif
                      @if(Auth::user()->rule=='parent' || Auth::user()->rule=='student')
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 324px;">Subject</th>
                      @endif
                     </tr>
                </thead>
                <tbody>
                  @if(Auth::user()->rule=='admin')
                    @foreach ($examid as $exam)
                  <tr role="row" class="odd">
                    <td class="sorting_1"> {{$i++}}</td>
                    <td > <div>{{$exam->id }} - {{$exam->examTitle}}</div>
                     </td>
                     <td  class="">
                            <div> {{$exam->examDescription}}</div>
                      </td>
                      <td class="">
                          @foreach ($classid as $classid1)
                          @if($classid1->id == $exam->examClasses)
                             - {{$classid1->className}} <br>
                            @endif
                          @endforeach
                        </td>
                        <td class="">
                            @foreach ($subjectid as $subjectid1)
                            @if($subjectid1->id == $exam->examSubjects)
                               - {{$subjectid1->subjectTitle}} <br>
                              @endif
                            @endforeach
                          </td>
                      <td class="">
                              <div> {{$exam->examDate}}</div>
                       </td>
                       <td >
                         <a href="exam/{{$exam->id}}/correct" type="button" class="btn btn-info btn-flat  " title="Correct" >
                        <i class="fa fa-check-square-o"></i></a>
                       <a href="exam/{{$exam->id}}/edit" type="button" class="btn btn-info btn-flat " title="Edit" >
                      <i class="fa fa-pencil"></i></a>
                      <a href="exam/{{$exam->id}}/delete" type="button" class="btn btn-danger btn-flat" title="Remove" >
                      <i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                @endforeach
               @endif

               @if(Auth::user()->rule=='teacher')
                <div>
                   <form  class="form-horizontal " >
                    <div class="form-group ">
                     <label for="username" class="col-sm-1 control-label "> Class : </label>
                   <div class="col-sm-2 " style="margin-top:-8px;">
                       <select class="  form-control select2-multpl"   name="classes1" placeholder="Select a State">
                         <option value="" disabled selected hidden>Select Class</option>
                         @foreach ($classid as $classid2)
                         @foreach ($classid2->users as $teacher)
                         @if($teacher->id == Auth::user()->id )
                         <option value="{{ $classid2->id }}"> {{ $classid2->className }}</option>
                         @endif
                       @endforeach
                       @endforeach
                       </select>
                    </div>
                    <label for="username" class="col-sm-1 control-label "> Subject : </label>
                  <div class="col-sm-2 " style="margin-top:-8px;">
                      <select class="  form-control select2-multpl"   name="subjectid1" placeholder="Select a State">
                        <option value="" disabled selected hidden>Select Subject</option>
                        @foreach ($subjectid as $subjectid1)
                        @foreach ($subjectid1->users as $teacher)
                        @if($teacher->id == Auth::user()->id )
                          <option value="{{ $subjectid1->id }}"> {{ $subjectid1->subjectTitle }}</option>
                          @endif
                          @endforeach
                          @endforeach
                       </select>
                   </div>


                    <button type="submit"  style="margin-top:-8px;margin-bottom:15px;"class="btn btn-primary col-sm-1" >Show</button>
                </div>
               </form>
               </div>

               @php($classid2 = Request::input('classes1'))
               @php($subjectid2 = Request::input('subjectid1'))
                  @foreach ($examid as $exam)
                 @if($exam->examClasses == $classid2 && $exam->examSubjects ==  $subjectid2)

               <tr role="row" class="odd">
                 <td class="sorting_1"> {{$i++}}</td>
                 <td > <div>
                     {{$exam->examTitle}}</div>


                  </td>
                  <td  class="">
                         <div> {{$exam->examDescription}}</div>
                   </td>

                   <td class="">
                           <div> {{$exam->examDate}}</div>
                    </td>
                    <td >
                      <a href="exam/{{$exam->id}}/correct" type="button" class="btn btn-info btn-flat  " title="Correct" data-original-title="Edit">
                     <i class="fa fa-check-square-o"></i></a>
                    <a href="exam/{{$exam->id}}/edit" type="button" class="btn btn-info btn-flat " title="Edit" data-original-title="Edit">
                   <i class="fa fa-pencil"></i></a>
                   <a href="exam/{{$exam->id}}/delete" type="button" class="btn btn-danger btn-flat" title="Remove" tooltip="" data-original-title="Remove">
                   <i class="fa fa-trash-o"></i></a>
                 </td>
                 @endif
             </tr>
             @endforeach
            @endif
        @if(Auth::user()->rule=='parent')

        <div>
           <form  class="form-horizontal " >
            <div class="form-group ">
             <label for="username" class="col-sm-1 control-label "> Student : </label>
           <div class="col-sm-2 " style="margin-top:-8px;">
               <select class="  form-control select2-multpl"   name="classes1" placeholder="Select a Student ">
                 <option value="" disabled selected hidden>Select Student</option>
                 @foreach ($studentParent as $student)
                  @if($student->studentParent == Auth::user()->id )
                 <option value="{{ $student->studentClass }}"> {{ $student->fullName }}</option>
                 @endif
               @endforeach
                </select>
            </div>
             <button type="submit"  style="margin-top:-8px;margin-bottom:15px;"class="btn btn-primary col-sm-1" >Show</button>
        </div>
       </form>
        @php($classid2 = Request::input('classes1'))
       </div>
            @foreach ($examid as $exam)
            @if($exam->examClasses == $classid2)
          <tr role="row" class="odd">
            <td class="sorting_1"> {{$i++}}</td>
            <td > <div>
                {{$exam->examTitle}}</div>
             </td>
             <td  class="">
                  <div> {{$exam->examDescription}}</div>
              </td>

              <td class="">
                      <div> {{$exam->examDate}}</div>
               </td>
               <td >
                @foreach ($subjectid as $subjectid1)
                @if($exam->examSubjects == $subjectid1->id)
                    {{$subjectid1->subjectTitle}}
                @endif
                @endforeach
            </td>
            @endif
        </tr>
        @endforeach
        @endif

          @if(Auth::user()->rule=='student')
              @foreach ($examid as $exam)
              @if($exam->examClasses == Auth::user()->studentClass)
            <tr role="row" class="odd">
              <td class="sorting_1"> {{$i++}}</td>
              <td > <div>
                  {{$exam->examTitle}}</div>
               </td>
               <td  class="">
                    <div> {{$exam->examDescription}}</div>
                </td>

                <td class="">
                        <div> {{$exam->examDate}}</div>
                 </td>
                 <td >
                  @foreach ($subjectid as $subjectid1)
                  @if($exam->examSubjects == $subjectid1->id)
                      {{$subjectid1->subjectTitle}}
                  @endif
                  @endforeach
              </td>
              @endif
          </tr>
          @endforeach
          @endif
              </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
          </div>



          <div class="row">
            <div class="col-sm-10" style=" text-align : center;"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
               @if(Auth::user()->rule=='admin') {{ $examid->links() }}@endif


            </div>
          </div>
           </div>
        </div>
             <!-- /.box-body -->
      </section>
</div>
 @section('scripts')
 <script type="text/javascript">
  $(".select2-multpl").select2();

  </script>
 @endsection
@include('layouts.inc.footer')
