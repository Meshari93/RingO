
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b>: 1.0.0
  </div>
  <strong>Copyright &copy; 2017 Project monitoring and tracking student academic achievement  ..</strong> All rights
  reserved.
</footer>
</div>

<!-- jQuery 2.2.3 -->
 {{ Html::script('plugins/jQuery/jquery-2.2.3.min.js') }}
<!-- jQuery UI 1.11.4 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.6 -->
 {{ Html::script('bootstrap/js/bootstrap.min.js') }}

<!-- Select2 -->
 {{ Html::script('plugins/select2/select2.full.min.js') }}

<script>
$.widget.bridge('uibutton', $.ui.button);
</script>



<!-- InputMask -->
 {{ Html::script('plugins/input-mask/jquery.inputmask.js') }}
 {{ Html::script('plugins/input-mask/jquery.inputmask.date.extensions.js') }}
 {{ Html::script('plugins/input-mask/jquery.inputmask.extensions.js') }}
 <!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
   {{ Html::script('plugins/daterangepicker/daterangepicker.js') }}

<!-- bootstrap datepicker -->
 {{ Html::script('plugins/datepicker/bootstrap-datepicker.js') }}

<!-- bootstrap color picker -->
  {{ Html::script('plugins/colorpicker/bootstrap-colorpicker.min.js') }}
<!-- bootstrap time picker -->
 {{ Html::script('plugins/timepicker/bootstrap-timepicker.min.js') }}

<!-- SlimScroll 1.3.0 -->
 {{ Html::script('plugins/slimScroll/jquery.slimscroll.min.js') }}
<!-- iCheck 1.0.1 -->
 {{ Html::script('plugins/iCheck/icheck.min.js') }}

<!-- FastClick -->
 {{ Html::script('plugins/fastclick/fastclick.js') }}

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  {{ Html::script('plugins/morris/morris.min.js') }}

<!-- Sparkline -->
 {{ Html::script('plugins/sparkline/jquery.sparkline.min.js') }}

<!-- jvectormap -->
 {{ Html::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}

 {{ Html::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}

<!-- jQuery Knob Chart -->
 {{ Html::script('plugins/knob/jquery.knob.js') }}

<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
 <!-- Bootstrap WYSIHTML5 -->
 {{ Html::script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}

<!-- AdminLTE App -->
 {{ Html::script('dist/js/app.js') }}

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 {{ Html::script('dist/js/pages/dashboard.js') }}

<!-- AdminLTE for demo purposes -->
 {{ Html::script('dist/js/script.js') }}
@yield('scripts')
</body>
</html>
