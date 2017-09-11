@include('layouts.inc.head')
@include('layouts.inc.header')
@include('layouts.inc.sidebar')


<div  class="content-wrapper">
<section class="content-header">
    <h3>
        <i class="fa fa-sitemap"></i> Classes
    </h3>
</section>

<section class="content">

  <div class="btn-group pull-right no-print">
    <a  href="{{ url('/class') }}" class="floatRTL btn btn-danger btn-flat pull-right ">Cansel</a>
  </div>

  <div class="box col-xs-6">
    <div class="box-header">
        <h3 class="box-title ">Add Classes</h3>
    </div>
    <div class="box-body ">
      <form role="form" class="form-horizontal " method="POST" action="createClasses" >
        {{ csrf_field() }}
        <div class="form-group">
          <label for="className" class="col-sm-2 control-label ">Class name * </label>
          <div class="col-sm-6">
            <input  type="text" name="className"  class="form-control" required="" placeholder="Class name" >
          </div>
        </div>
        <div class="form-group">
          <label for="username" class="col-sm-2 control-label ">Teacher * </label>
          <div class="col-sm-6">
              <select class="form-control select2-multpl" multiple="multiple" name="teacher[]" data-placeholder="Select a Teachers" >
                @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}"> {{ $teacher->fullName }}</option>
                @endforeach

              </select>
           </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-6">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary " >Add Class</button>
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
