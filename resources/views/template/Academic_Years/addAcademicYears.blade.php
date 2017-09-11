@include('layouts.inc.head')
@include('layouts.inc.header')
@include('layouts.inc.sidebar')


<div  class="content-wrapper">
<section class="content-header">
    <h3>
        <i class="fa fa-calendar-check-o"></i> Semester
    </h3>
</section>

<section class="content">

  <div class="btn-group pull-right no-print">
    <a  href="{{ url('/academicYear') }}" class="floatRTL btn btn-danger btn-flat pull-right ">Cansel</a>
  </div>

  <div class="box col-xs-6">
    <div class="box-header">
        <h3 class="box-title ">Add Semester</h3>
    </div>
    <div class="box-body ">
      <form role="form" class="form-horizontal " method="POST" action="createAcademicYears" >
        {{ csrf_field() }}
        <div class="form-group">
          <label for="semester" class="col-sm-2 control-label ">Semester * </label>
          <div class="col-sm-6">
            <input  type="text" name="semester"  class="form-control" required="" placeholder="Semester name" >
          </div>
      </div>
          <div class="form-group">
         <div class="col-sm-6">
           <label for="semester" class="col-sm-4 control-label" >Default academic year</label>
               <input  style="margin-top :12px;" type="checkbox" value="1" name="isDefault"> Mark as default academic year
          </div>
       </div>
          <div class="form-group">
          <div class="col-sm-offset-2 col-sm-6">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary " >Add Subjects</button>
          </div>
        </div>
       </form>

  </div>
</section>
</div>


 @section('scripts')
 <script type="text/javascript">
  $(".select2-multpl").select2();

  </script>
 @endsection

@include('layouts.inc.footer')
