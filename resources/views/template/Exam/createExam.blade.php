@include('layouts.inc.head')
@include('layouts.inc.header')
@include('layouts.inc.sidebar')


<div  class="content-wrapper">
<section class="content-header">
    <h3>
        <i class="fa fa-graduation-cap"></i> Exam
    </h3>
</section>

<section class="content">

  <div class="btn-group pull-right no-print">
    <a  href="{{ url('/exam') }}" class="floatRTL btn btn-danger btn-flat pull-right ">Cansel</a>
  </div>

  <div class="box col-xs-4">
    <div class="box-header">
        <h3 class="box-title ">Create Exam</h3>
    </div>
    <div class="box-body ">
      <div class="col-sm-4 pull-right">
        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
      <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 50px;"> ID </th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 250px;"> Exam Name </th>
           </tr>
      </thead>
      <tbody>
        @foreach ($examid as $exam)

        <tr role="row" class="odd">
          <td class="sorting_1">{{$i++}}</td>
            <td>
              {{ $exam->examName}}
            </td>
          </tr>
          @endforeach
    </tbody>
    </table>
    </div>
    <div class="col-xs-8 ">

      <form role="form" class="form-horizontal " method="POST" action="createNewExam" >
        {{ csrf_field() }}
        <div class="form-group">
          <label for="fullName" class="col-sm-2 control-label">Exam name * </label>
          <div class="col-sm-4">
            <input id="name" type="text" name="examname"  class="form-control" required="" placeholder="Exam name" >
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-2">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary " >Create Exam </button>
          </div>
        </div>
      </form>
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
