@include('layouts.inc.head')
@include('layouts.inc.header')
@include('layouts.inc.sidebar')

<div  class="content-wrapper">
<section class="content-header">
    <h3>
        <i class="fa fa-suitcase"></i> Teachers

    </h3>
</section>

<section class="content">
  <a href="javascript:window.print()" class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print">Print</a>
  @if(Auth::user()->rule=='admin')
    <a  href="{{ url('/addTeachers') }}" class="floatRTL btn btn-success btn-flat pull-right ">Add teacher</a>
@endif
  <div class="box col-xs-6">

        <div class="box-header">
          <h3 class="box-title">List Teachers</h3>
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
                    Username
                  </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 229px;">
                      Email address
                    </th>
                    @if(Auth::user()->rule=='admin')
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 324px;">
                        Operations
                      </th>
                      @endif
                    </tr>
            </thead>
            <tbody>
              @if(Auth::user()->rule=='admin')
              @foreach ($teachers as $teacher)
            <tr role="row" class="odd">
                <td class="sorting_1"><!-- ID number of table -->
                  {{$i++}}
                </td>
                <td > <!-- full name of teacher  in table  table -->
                   <div>
                  {{$teacher->fullName}}
                </div>
                  @if($teacher->isLeaderBoard	 =='leaderBoard')
                   <span style="display: inline-flex; margin-top: 8px;"  ><br><i class="fa fa-trophy" style="margin:3px 10px;"></i> Leader Board
                          <form role="form" method="POST" action="teachers/{{ $teacher->id }}/leaderBoard" >
                          {{ csrf_field() }}
                          <input type="hidden" name="isLeaderBoard" value="">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="submit"  class="btn bg-orange btn-flat" style="margin:-4px 10px;height: 25px; width: 25px;" title="Delete Leader Board" >
                            <i class="fa fa-trash-o"  style="margin:-7px -7px; position: absolute;"></i></button>
                          </form>
                          @endif
                    </span>
                 </td>
                 <!-- User name of teacher  in table  table -->
                  {{$teacher->username}}
                  <td>
                    - {{$teacher->fullName}}
                 </td>
                <td>
                {{$teacher->email}}
                </td>
                <td>
                  @if(!$teacher->isLeaderBoard	 =='leaderBoard	')
                  <form role="form" method="POST" action="teachers/{{ $teacher->id }}/leaderBoard" class="col-sm-2" >
                    {{ csrf_field() }}
                    <input type="hidden" name="isLeaderBoard" value="leaderBoard">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-info btn-flat " title="Leader Board" ><i class="fa fa-trophy"></i></button>
                   </form>
                   @endif
                     <a href="../teachers/{{ $teacher->id }}/edit" type="button" class="btn btn-info btn-flat " title="Edit" data-original-title="Edit">
                    <i class="fa fa-pencil"></i></a>
                    <a href="teachers/{{ $teacher->id }}/delete" type="button" class="btn btn-danger btn-flat" title="Remove" tooltip="" data-original-title="Remove">
                    <i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
<!-- Student Table -->
@if(Auth::user()->rule=='student')
            @foreach ($classesid as $classid)
           @if($classid->id == Auth::user()->studentClass)
             @endif
           @endforeach
           @foreach ($classid->users as $teacher)
          <tr role="row" class="odd">
              <td class="sorting_1"><!-- ID number of table -->
                {{$i++}}
              </td>
              <td > <!-- full name of teacher  in table  table -->
                 <div>
                {{$teacher->fullName}}
              </div>
                @if($teacher->isLeaderBoard	 =='leaderBoard')
                 <span style="display: inline-flex; margin-top: 8px;"  ><br><i class="fa fa-trophy" style="margin:3px 10px;"></i> Leader Board</span>
                   @endif
               </td>
               <!-- User name of teacher  in table  table -->
                <td>
                  - {{$teacher->username}}
               </td>
              <td>
                {{$teacher->email}}
              </td>
          @endforeach
        @endif

        @if(Auth::user()->rule=='parent')
      <div>
          <form  class="form-horizontal " >
           <div class="form-group ">
            <label for="username" class="col-sm-2 control-label "> Student: </label>
          <div class="col-sm-8 " style="margin-top:-8px;">
              <select class="  form-control select2-multpl"   name="studentid" placeholder="Select a State">
                <option value="" disabled selected hidden>Select Student</option>

                @foreach ($teachers as $a)
                @if($a->studentParent == Auth::user()->id)
                <option value="{{ $a->studentClass }}"> {{ $a->fullName }}</option>
                @endif
                @endforeach
              </select>
           </div>
           <button type="submit"  style="margin-top:-8px;margin-bottom:15px;"class="btn btn-primary col-sm-2" >Show</button>
       </div>
      </form>
    </div>
@php($studentid = Request::input('studentid'))
{{$studentid}}
    @foreach ($teachers as $a)
            @if($a->studentParent == Auth::user()->id)
                @foreach ($classesid as $classid)
                @if($classid->id == $studentid)
                @if($a->studentClass == $studentid)
                 @foreach ($classid->users as $teacher)
                <tr role="row" class="odd">
                    <td class="sorting_1"><!-- ID number of table -->
                      {{$i++}}
                    </td>
                    <td > <!-- full name of teacher  in table  table -->
                       <div>
                      {{$teacher->fullName}}
                    </div>
                      @if($teacher->isLeaderBoard	 =='leaderBoard')
                       <span style="display: inline-flex; margin-top: 8px;"  ><br><i class="fa fa-trophy" style="margin:3px 10px;"></i> Leader Board</span>
                         @endif
                     </td>
                     <!-- User name of teacher  in table  table -->
                      <td>
                      {{$teacher->username}}
                     </td>
                     <td>
                     {{$classid->className}}
                    </td>
                    <td>
                      {{$teacher->email}}
                    </td>
                    @endforeach
                    @endif
                    @endif
                    @endforeach
                   @else
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
          @if(Auth::user()->rule=='admin') {{ $teachers->links() }}@endif
        </div>
       </div>

      </div>
    </div>
  </div>
      </div>
</section>
</div>

 @section('scripts')
 <script type="text/javascript">
  $(".select2-multpl").select2();
  </script>

 @endsection
@include('layouts.inc.footer')
