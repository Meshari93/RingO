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

  <div class="btn-group pull-right no-print">
    <a  href="{{ url('/teachers') }}" class="floatRTL btn btn-danger btn-flat pull-right ">Cansel</a>
  </div>

   <div class="box col-xs-6">
    <div class="box-header">
        <h3 class="box-title ">Add teacher</h3>
    </div>
    <div class="box-body ">
      <form role="form" class="form-horizontal " method="POST" action="teachers">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="fullName" class="col-sm-2 control-label">Full name * </label>
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
         <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-sm-2 control-label">Confirm Password *</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                 @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
         <div class="form-group">
          <div class="col-sm-offset-2 col-sm-6">
            <input type="hidden" name="rule" value="teacher">
              <button type="submit" class="btn btn-primary " >Add teacher</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
</div>


@include('layouts.inc.footer')
