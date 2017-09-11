
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> RingO | @yield('title', 'Home')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
    {{ Html::style ('bootstrap/css/bootstrap.css') }}
   <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
 {{ Html::style ('plugins/daterangepicker/daterangepicker.css') }}

  <!-- bootstrap datepicker -->
 {{ Html::style ('plugins/datepicker/datepicker3.css') }}

  <!-- iCheck for checkboxes and radio inputs -->
   {{ Html::style ('plugins/iCheck/all.css') }}

  <!-- Bootstrap Color Picker -->
   {{ Html::style ('plugins/colorpicker/bootstrap-colorpicker.min.css') }}

  <!-- Bootstrap time Picker -->
 {{ Html::style ('plugins/timepicker/bootstrap-timepicker.min.css') }}

  <!-- Select2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

   {{ Html::style ('plugins/select2/select2.min.css') }}

  <!-- Theme style -->
   {{ Html::style ('dist/css/AdminLTE.css') }}

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
   {{ Html::style ('dist/css/skins/_all-skins.min.css') }}

  <!-- iCheck -->
   {{ Html::style ('plugins/iCheck/flat/blue.css') }}

  <!-- Morris chart -->
   {{ Html::style ('plugins/morris/morris.css') }}

  <!-- jvectormap -->
   {{ Html::style ('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}

  <!-- bootstrap wysihtml5 - text editor -->
 {{ Html::style ('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}

  <!-- iCheck -->
   {{ Html::style ('plugins/iCheck/square/blue.css') }}

   {!! Charts::assets() !!}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->



</head>
