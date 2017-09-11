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

  <div class="box col-xs-6">
    <div class="box-header">
        <h3 class="box-title ">Edit Exam</h3>
    </div>
    <div class="box-body ">
      <form role="form" class="form-horizontal " method="POST" action="update" >
        {{ csrf_field() }}

        <div class="form-group">
          <label for="fullName" class="col-sm-2 control-label">Exam name * </label>
          <div class="col-sm-6">
            <input id="name" type="text" name="examname"  class="form-control" required="" value="{{ $examEdait->examTitle}}"  >
          </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label ">Exam Description</label>
            <div class="col-sm-6">
              <textarea name="examDescription" class="form-control" placeholder="Exam Description" value="{{ $examEdait->examDescription}}"></textarea>
            </div>
          </div>

         <div class="form-group">
          <label for="username" class="col-sm-2 control-label ">Class * </label>
          <div class="col-sm-6">
              <select class="form-control select2-multpl"  name="classid" data-placeholder="Select a Class" value="{{ $examEdait->examClasses}}">
                @foreach ($classid as $classid1)
                <option value="{{ $classid1->id }}"> {{ $classid1->className }}</option>
                @endforeach

              </select>
           </div>
        </div>

        <div class="form-group" >
          <label class="col-sm-2 control-label">Date *</label>
          <div class="col-sm-6">
            <input type="text" date-picker="" name="examDate" class="form-control datemask" required="" value="{{ $examEdait->examDate}}">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-6">
                @foreach ($year as $years)
             <input type="hidden" name="year" value="{{ $years->id }}">
             @endforeach
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary " >Add Exam </button>
          </div>
        </div>
      </form>
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
