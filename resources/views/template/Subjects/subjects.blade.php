@include('layouts.inc.head')
@include('layouts.inc.header')
@include('layouts.inc.sidebar')

<div  class="content-wrapper">
<section class="content-header">
    <h3>
        <i class="fa fa-suitcase"></i> Subject
    </h3>
</section>

<section class="content">
  <a href="javascript:window.print()" class="floatRTL btn btn-success btn-flat pull-right">Print</a>
   <a  href="{{ url('/addSubjects') }}" class="floatRTL btn btn-success btn-flat pull-right ">Add Subject</a>

  <div class="box col-xs-6">

        <div class="box-header">
          <h3 class="box-title">List Subject</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 50px;">
                  ID
                </th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 250px;">
                  Subject name
                 </th>
                 <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 249px;">
                   Class
                 </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 249px;">
                    Teachers
                  </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 229px;">
                    Pass grade / Final grade
                    </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 324px;">
                        Operations

                      </th>
                    </tr>
            </thead>
            <tbody>

              @foreach ($subjects as $subject)
              <tr role="row" class="odd">
                <td class="sorting_1">{{$i++}}</td>
                <td class="">
                  {{$subject->subjectTitle}} </td>
                  <td class="">
                      @foreach ($classes as $classid)
                      @if($classid->id == $subject->classSubjects)
                         - {{$classid->className}} <br>
                        @endif
                      @endforeach
                    </td>
                <td class="">
                    @foreach ($subject->users as $subject2)
                      - {{$subject2->fullName}} <br>
                    @endforeach
                  </td>
                  <td>{{$subject->passGrade}} / {{$subject->finalGrade }}</td>
                  <td>
                    <a href="subjects/{{ $subject->id }}/edit" type="button" class="btn btn-info btn-flat " title="Edit" >
                   <i class="fa fa-pencil"></i></a>
                   <a href="subjects/{{ $subject->id }}/delete" type="button" class="btn btn-danger btn-flat" title="Remove" tooltip=""  >
                   <i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
                @endforeach
          </tbody>
            <tfoot>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
       <div class="col-sm-10" style=" text-align : center;"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
            {{ $subjects->links() }}

         </div>
        </div>

      </div>
    </div>
  </div>
        <!-- /.box-body -->
      </div>

</section>
<!-- Trigger the modal with a button -->
<!-- Modal -->
<div id="dataModel" class="modal fade" role="dialog">
  <div class="modal-dialog">



  </div>
</div>
</div>



@include('layouts.inc.footer')
