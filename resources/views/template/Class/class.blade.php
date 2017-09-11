@include('layouts.inc.head')
@include('layouts.inc.header')
@include('layouts.inc.sidebar')

<div  class="content-wrapper">
    <section class="content-header">
        <h3>
            <i class="fa fa-sitemap"></i>Classes
        </h3>
    </section>

    <section class="content">
      <a href="javascript:window.print()" class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print">Print</a>
      @if(Auth::user()->rule=='admin')
        <a  href="{{ url('/addClasses') }}" class="floatRTL btn btn-success btn-flat pull-right ">Add  Class</a>
        @endif
       <div class="box col-xs-4">
             <div class="box-header">
              <h3 class="box-title">List clasees</h3>
            </div>
                  <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 50px;"> ID </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 250px;"> Class name	  </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 249px;">  Class teacher		</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 324px;">Operations</th>
                     </tr>
                </thead>
                <tbody>
                   @foreach ($classesid as $classid)
                <tr role="row" class="odd">
                    <td class="sorting_1">{{$i++}}</td>
                    <td > <div>{{$classid->className}}</div>
                     </td>
                     <td class="">
                       @foreach ($classid->users as $teacher)
                         - {{$teacher->fullName}} <br>
                       @endforeach
                       </td>
                       <td >
                      <a href="class/{{$classid->id}}/delete" type="button" class="btn btn-danger btn-flat" title="Remove" tooltip="" data-original-title="Remove">
                      <i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                @endforeach
              </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
              Showing 1 of {{$i-1}} entries
            </div>
          </div>
           </div>
        </div>
             <!-- /.box-body -->
      </section>
</div>

@include('layouts.inc.footer')
