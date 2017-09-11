

<!-- ////////////////////////////////////////////////////////////////////////// -->


@include('layouts.inc.head')

<body class="hold-transition login-page" style="max-height: 542px;">
<div class="login-box">
  <div class="login-logo">
    <h1>RingO <b>system</b></h1>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="panel panel-default">
  <div class="panel-heading">Login</div>
</div>

    <p class="login-box-msg">Sign in to start your session</p>

    <form role="form" method="POST" action="{{ url('/login') }}">
      {{ csrf_field() }}

      <div class="form-group has-feedback">
          <label for="username" class="col-md-6 control-label">Email</label>
          <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
     </div>
      <div class="form-group has-feedback">
            <label for="password" class="col-md-6 control-label">Password</label>
            <input id="password" class="form-control" type="password" name="password"  placeholder="Password">
             <span class="glyphicon glyphicon-lock form-control-feedback"></span>

      </div>



      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
     </div>
     <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
         @if ($errors->has('password'))
          <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
     </div>


      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name"remember"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Log in</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box -->

  <!-- jQuery 2.2.3 -->
  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
  </body>
  </html>
  @include('layouts.inc.footer')
