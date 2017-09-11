@include('layouts.inc.head')
@include('layouts.inc.header')
@include('layouts.inc.sidebar')

<div  class="content-wrapper">
    <section class="content-header">
        <h3>
            <i class="fa fa-graduation-cap"></i>Mark of Exam
        </h3>
    </section>
     <section class="content">
      <a href="javascript:window.print()" class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Print</a>
      <a  href="{{ url('/exam') }}" class="floatRTL btn btn-danger btn-flat pull-right ">Cansel</a>
         <div class="box col-xs-4">
             <div class="box-header">
              <h2 class="box-title">List mark   </h2>
            </div>


                 <div class="box-header">
               <h4 class="box-title">Exam: {{ $examMark->examTitle }}  </h4>
                @foreach ($classid as $classes)
                @if($classes->id == $id)
              <h4 class="box-title col-sm-3">Class: {{ $classes->className }}</h4>
                 @endif
              @endforeach
            </div>
                  <div class="row">
                    <div class="box-body">

                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 50px;text-align: center;">
                         ID </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 250px; text-align: center;">
                         Student Name	  </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 70px;text-align: center;">
                         Student ID	  </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 100px;text-align: center;">
                        Mark	  </th>
                       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 324px;text-align: center;">
                         Comment</th>
                     </tr>
                </thead>
                <tbody>
                  <form role="form"  method="POST" action="markStore" >
                    {{ csrf_field() }}

                  @foreach ($studentid as $student)
                  @if($student->rule == 'student' )
                  @if($student->studentClass == $id )
                    <input type="hidden"  name="subjects[]" value="{{$examMark->examSubjects}}" >
                    <input type="hidden"  name="exam[]" value="{{$examMark->id}}" >
                      <tr role="row" class="odd">
                    <td class="sorting_1">{{$i++}}</td>
                    <td > <div>{{$student->fullName}}  </div>
                      </td>
                    <td class="sorting_1">
                      {{$student->id}}
                       <input type="hidden"  name="student[]" value ="{{ $student->id }}" >

                      <td>
                        <input type="number" class ="form-control" min="0" max="{{$examMark->examMark}}" name="mark[]"  >

                     </td>
                    <td>
                           <input type="text" class ="form-control "  name="comment[]"  >
                     </td>

                </tr>
                @endif
                @endif
                @endforeach
                <td colspan="5" style="text-align: center;" >

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary " >Save Mark</button>
              </form>
                 </td>
            </tr>
              </tbody>
               </table>

            </div>
          </div>
        </div>


            <div class="row">
            <div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
              Showing 1 of  {{$i-1}} entries
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
