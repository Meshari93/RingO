@include('layouts.inc.head')
@include('layouts.inc.header')
@include('layouts.inc.sidebar')

<div  class="content-wrapper">
<section class="content-header">
    <h3>
        <i class="fa fa-suitcase"></i> Parent
    </h3>
</section>

<section class="content">
  <a href="javascript:window.print()" class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Print</a>
  <div class="btn-group pull-right no-print">
    @if(Auth::user()->rule=='admin')
    <a  href="{{ url('/addParent') }}" class="floatRTL btn btn-success btn-flat pull-right ">Add parent</a>
    @endif
  </div>




  <div class="box col-xs-6">

        <div class="box-header">
          <h3 class="box-title">List Parents</h3>
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
                  @if(Auth::user()->rule=='admin')  Username @endif
                  @if(Auth::user()->rule=='teacher')  Student Name @endif

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
                @foreach ($parents as $parent)
                @if($parent->rule =='parent')
                <tr role="row" class="odd">
                    <td class="sorting_1">{{$i++}}</td>
                    <td > <div>{{$parent->fullName}}</div>

                     </td>
                    <td class="">{{$parent->username}}</td>
                    <td>{{$parent->email}}</td>
                    <td   >
                       <a href="../parent/{{ $parent->id }}/edit" type="button" class="btn btn-info btn-flat " title="Edit" data-original-title="Edit">
                      <i class="fa fa-pencil"></i></a>
                      <a href="parent/{{ $parent->id }}/delete" type="button" class="btn btn-danger btn-flat" title="Remove" tooltip="" data-original-title="Remove">
                      <i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
              @endif
            @endforeach
            @endif

            @if(Auth::user()->rule=='teacher')
            <div>
                <form  class="form-horizontal " >
                 <div class="form-group ">
                  <label for="username" class="col-sm-3 control-label "> Class </label>
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
              @foreach ($parents as $parent)
              @if($parent->studentClass == $classid)
              @foreach ($parents as $parent1)
                @if($parent->studentParent == $parent1->id)
                <tr role="row" class="odd">
                <td class="sorting_1">{{$i++}}</td>
                <td > <div>{{  $parent1->fullName }}</div>
                 </td>
                <td class="">{{$parent->fullName}}</td>
                <td>{{$parent->email}}</td>
                @endif
                @endforeach
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
            @if (Auth::user()->rule=='admin') {{ $parents->links() }}@endif

        </div>
       </div>

      </div>
    </div>
  </div>
        <!-- /.box-body -->
      </div>

</section>
</div>
<!-- Trigger the modal with a button -->
<!-- Modal -->
@section('scripts')
 <script type="text/javascript">
  $(".select2-multpl").select2();
  </script>

 @endsection
@include('layouts.inc.footer')
