@include('layouts.inc.head')
@include('layouts.inc.header')
@include('layouts.inc.sidebar')

<div  class="content-wrapper">
<section class="content-header">
    <h3>
        <i class="fa fa-suitcase"></i> Student
    </h3>
</section>

<section class="content">
  <a href="javascript:window.print()" class="floatRTL btn btn-success btn-flat pull-right marginBottom15  ">Print</a>
  @if(Auth::user()->rule=='admin')
    <div class="btn-group pull-right no-print">

  <a  href="{{ url('/addStudent') }}" class="floatRTL btn btn-success btn-flat pull-right ">Add student</a>
</div>
@endif
  <div class="box col-xs-6">

        <div class="box-header">
          <h3 class="box-title">List of Student</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

            <div class="row">
              <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 50px;">
                  ID
                </th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 250px;">
                    Full name
                 </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 249px;">
                    Class
                  </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 229px;">
                      Email address
                    </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 324px;">
                        Operations

                      </th>
                    </tr>
            </thead>
            <tbody>
        @if(Auth::user()->rule=='admin')
              @foreach ($students as $student)
              @if($student->rule =='student')
            <tr role="row" class="odd">
                <td class="sorting_1">{{$i++}}</td>
                <td > <div>{{$student->fullName}}</div>
                  @if($student->isLeaderBoard	 =='leaderBoard')
                   <span style="display: inline-flex; margin-top: 8px;"  ><br><i class="fa fa-trophy" style="margin:3px 10px;"></i> Leader Board
                          <form role="form" method="POST" action="student/{{ $student->id }}/leaderBoard" >
                          {{ csrf_field() }}
                          <input type="hidden" name="isLeaderBoard" value="">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="submit"  class="btn bg-orange btn-flat" style="margin:-4px 10px;height: 25px; width: 25px;" title="Delete Leader Board" >
                            <i class="fa fa-trash-o"  style="margin:-7px -7px; position: absolute;"></i></button>
                          </form>
                    </span>
                  @endif

                 </td>
                <td class="">
                   @foreach ($classid as $classid1)
                     @if($student->studentClass == $classid1->id )
                      {{ $classid1->className }}
                    @endif
                   @endforeach</td>
                <td>{{$student->email}}</td>
                <td >
                    @if(!$student->isLeaderBoard	 =='leaderBoard	')
                  <form role="form" method="POST" action="student/{{ $student->id }}/leaderBoard" class="col-sm-2" >
                    {{ csrf_field() }}
                    <input type="hidden" name="isLeaderBoard" value="leaderBoard">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-info btn-flat " title="Leader Board" ><i class="fa fa-trophy"></i></button>
                   </form>
                   @endif

                   <a href="markStudent/{{$student->id}}/Studentmarksheet" type="button" class="btn btn-info btn-flat " title="Marksheet" data-original-title="Marksheet">
                  <i class="fa fa-table"></i></a>
                  <a href="markStudent/{{$student->id}}/Studentmarkchart" type="button" class="btn btn-info btn-flat " title="Mark Chart" data-original-title="Mark chart">
                 <i class="fa fa-line-chart"></i></a>
                     <a href="../student/{{ $student->id }}/edit" type="button" class="btn btn-info btn-flat " title="Edit" data-original-title="Edit">
                    <i class="fa fa-pencil"></i></a>
                    <a href="student/{{ $student->id }}/delete" type="button" class="btn btn-danger btn-flat" title="Remove" tooltip="" data-original-title="Remove">
                    <i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            @endif
            @endforeach
            @endif


            @if(Auth::user()->rule=='parent')
                  @foreach ($students as $student)
                  @if($student->rule =='student' && $student->studentParent == Auth::user()->id)
                <tr role="row" class="odd">
                    <td class="sorting_1">{{$i++}}</td>
                    <td > <div>{{$student->fullName}}</div>
                      @if($student->isLeaderBoard	 =='leaderBoard')
                       <span style="display: inline-flex; margin-top: 8px;"  ><br><i class="fa fa-trophy" style="margin:3px 10px;"></i> Leader Board</span>
                      @endif
                     </td>
                    <td class="">
                       @foreach ($classid as $class1)
                        @if($class1->id == $student->studentClass )
                        {{$class1->className}}
                        @endif
                         @endforeach
                      </td>
                    <td>{{$student->email}}</td>
                    <td>
                      <a href="markStudent/{{$student->id}}/Studentmarksheet" type="button" class="btn btn-info btn-flat " title="Marksheet" data-original-title="Marksheet">
                     <i class="fa fa-table"></i></a>
                     <a href="markStudent/{{$student->id}}/Studentmarkchart" type="button" class="btn btn-info btn-flat " title="Mark Chart" data-original-title="Mark chart">
                    <i class="fa fa-line-chart"></i></a>
                    </td>
                </tr>
                @endif
                @endforeach
                @endif


                @if(Auth::user()->rule=='teacher')
                    <div>
                        <form  class="form-horizontal " >
                         <div class="form-group ">
                          <label for="username" class="col-sm-2 control-label "> Class: </label>
                        <div class="col-sm-6 " style="margin-top:-8px;">
                            <select class="  form-control select2-multpl"   name="classes" placeholder="Select a State">
                              <option value="" disabled selected hidden>Select Class</option>
                              @foreach ($classid as $classid1)
                              @foreach ($classid1->users as $teacher)
                              @if($teacher->id == Auth::user()->id )
                              <option value="{{ $classid1->id }}"> {{ $classid1->className }}</option>
                              @endif
                            @endforeach
                            @endforeach
                            </select>
                         </div>
                         <button type="submit"  style="margin-top:-8px;margin-bottom:15px;"class="btn btn-primary col-sm-3" >Show</button>
                     </div>
                    </form>
                  </div>

                  @php($classid = Request::input('classes'))
                      @foreach ($students as $student)
                      @if($student->studentClass == $classid && $student->rule == 'student')
                    <tr role="row" class="odd">
                        <td class="sorting_1">{{$i++}}</td>
                        <td > <div>{{$student->fullName}}</div>
                          @if($student->isLeaderBoard	 =='leaderBoard')
                           <span style="display: inline-flex; margin-top: 8px;"  ><br><i class="fa fa-trophy" style="margin:3px 10px;"></i> Leader Board</span>
                          @endif
                         </td>
                        <td class="">{{$student->username}}</td>
                        <td>{{$student->email}}</td>
                        <td>
                          <a href="markStudent/{{$student->id}}/Studentmarksheet" type="button" class="btn btn-info btn-flat " title="Marksheet" data-original-title="Marksheet">
                         <i class="fa fa-table"></i></a>
                         <a href="markStudent/{{$student->id}}/Studentmarkchart" type="button" class="btn btn-info btn-flat " title="Mark Chart" data-original-title="Mark chart">
                        <i class="fa fa-line-chart"></i></a>
                        </td>
                    </tr>
                    @endif
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
         @if(Auth::user()->rule=='admin')
         {{ $students->links() }}
         @endif

        </div>
       </div>

      </div>
    </div>
  </div>
        <!-- /.box-body -->
      </div>

</section>

</div>


 @section('scripts')
 <script type="text/javascript">
  $(".select2-multpl").select2();
  </script>

 @endsection

@include('layouts.inc.footer')
