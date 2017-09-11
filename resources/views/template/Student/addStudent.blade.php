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

  <div class="btn-group pull-right no-print">
    <a  href="{{ url('/student') }}" class="floatRTL btn btn-danger btn-flat pull-right ">Cansel</a>
  </div>

  <div class="box col-xs-6">
    <div class="box-header">
        <h3 class="box-title ">Add Student</h3>
    </div>
    <div class="box-body ">
      <form role="form" class="form-horizontal " method="POST" action="addNewStudent" >
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="fullName" class="col-sm-2 control-label ng-binding">Full name * </label>
          <div class="col-sm-6">
            <input id="name" type="text" name="fullName"  class="form-control" required="" placeholder="Full name" >
          </div>
        </div>
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
          <label for="username" class="col-sm-2 control-label ">Username * </label>
          <div class="col-sm-6">
            <input id="username" type="text" class="form-control" name="username"  required="" placeholder="Username">
          </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email" class="col-sm-2 control-label">Email address *</label>
          <div class="col-sm-6">
            <input id="email" type="email" class="form-control" name="email" placeholder="Email address" required="">
          </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="password" class="col-sm-2 control-label">Password *</label>
          <div class="col-sm-6">
            <input id="password" type="password" class="form-control" name="password" required="" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <label for="username" class="col-sm-2 control-label ">Class * </label>
          <div class="col-sm-6">
              <select class="form-control select2-multpl"  name="classid" data-placeholder="Select a Class" >
                @foreach ($classid as $classid1)
                <option value="{{ $classid1->id }}"> {{ $classid1->className }}</option>
                @endforeach

              </select>
           </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-6">
            <input type="hidden" name="rule" value="student">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary " >Add student</button>
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
