@include('layouts.inc.head')
@include('layouts.inc.header')
@include('layouts.inc.sidebar')

<div  class="content-wrapper" style="min-height: 900px;">
<section class="content-header">
    <h3>
        <i class="fa fa-line-chart"></i> Chart
    </h3>
</section>

<section class="content">

   <div class="box col-xs-4 box-info">
         <div class="box-header">
          <h3 class="box-title">Line Chart:</h3>

         </div>
                  <!-- LINE CHART -->

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                       <div class="box-body">
                        <div class="chart">
                          {!! $chart->render() !!}
                        </div>
                      </div>
                      <!-- /.box-body -->

    </div>

         <!-- /.box-body -->
  </section>
 </div>




@include('layouts.inc.footer')
