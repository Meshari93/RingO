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
        <h3 class="box-title ">Add Exam</h3>
    </div>
    <div class="box-body ">
      <form role="form" class="form-horizontal " method="POST" action="addNewExam" >
        {{ csrf_field() }}
        <div class="form-group">
         <label for="username" class="col-sm-2 control-label ">Exam name *  </label>
         <div class="col-sm-6">
             <select class="form-control select2"  name="examname" data-placeholder="Select a Exam" >
               @foreach ($examid as $exam)
               <option value="{{ $exam->examName }}">{{ $exam->examName}}</option>
               @endforeach
             </select>
          </div>
       </div>
        <div class="form-group">
            <label class="col-sm-2 control-label ">Exam Description</label>
            <div class="col-sm-6">
              <textarea name="examDescription" class="form-control" placeholder="Exam Description"></textarea>
            </div>
          </div>

         <div class="form-group">
          <label for="username" class="col-sm-2 control-label ">Class * </label>
          <div class="col-sm-6">
              <select class="form-control select2"  name="classid" data-placeholder="Select a Class" >
                @foreach ($classid as $classid1)
                <option value="{{ $classid1->id }}"> {{ $classid1->className }}</option>
                @endforeach

              </select>
           </div>
        </div>

        <div class="form-group">
          <label for="passGrade" class="col-sm-2 control-label">Exam mark *</label>
          <div class="col-sm-6">
            <input  type="number" class="form-control" name="examMark" placeholder="Exam mark" required="">
          </div>
        </div>

        <div class="form-group">
         <label for="username" class="col-sm-2 control-label ">Subject * </label>
         <div class="col-sm-6">
             <select class="form-control select2"  name="subjectid" data-placeholder="Select a Subject" >
               @foreach ($subjectid as $subjectid1)
               <option value="{{ $subjectid1->id }}"> {{ $subjectid1->subjectTitle }} -
                     @foreach ($classid as $classes)
                             @if($classes->id == $subjectid1->classSubjects)
                                 {{ $classes->className }}
                               @endif
                 @endforeach
               </option>
               @endforeach

             </select>
            </div>
       </div>

        <div class="form-group" >
          <label class="col-sm-2 control-label">Date *</label>
          <div class="col-sm-6">
             <div class="input-group date">
                <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                <input type="text"   name="examDate" class="form-control pull-right" id="datepicker" required="">
          </div>
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

  <!-- jQuery 2.2.3 -->
  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
   <!-- InputMask -->
  <script src="plugins/input-mask/jquery.inputmask.js"></script>
   <!-- date-range-picker -->
   <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
   <script src="dist/js/script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 @endsection
@include('layouts.inc.footer')
