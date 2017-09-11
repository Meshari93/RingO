@include('layouts.inc.head')
@include('layouts.inc.header')
@include('layouts.inc.sidebar')

<div  class="content-wrapper">
    <section class="content-header">
        <h3>
            <i class="fa fa-calendar-check-o"></i> Academic Years
        </h3>
    </section>

    <section class="content">
      <a href="javascript:window.print()" class="floatRTL btn btn-success btn-flat pull-right marginBottom15 no-print ng-binding">Print</a>
        <a  href="{{ url('/addAcademicYears') }}" class="floatRTL btn btn-success btn-flat pull-right ">Add  Academic Years</a>
       <div class="box col-xs-4">
             <div class="box-header">
              <h3 class="box-title">List academic years</h3>
            </div>
                  <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 50px;"> ID </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 250px;"> Semester  </th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 249px;">  Year Status	</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 324px;">Operations</th>
                     </tr>
                </thead>
                <tbody>
                   @foreach ($years as $year)
                <tr role="row" class="odd">
                    <td class="sorting_1">{{$i++}}</td>
                    <td > <div>{{$year->semester}}</div>
                     </td>
                     <td class="">
                       @if($year->isDefault ==1)
                           Default year
                         @endif
                      </td>
                       <td >
                         @if($year->isDefault ==0)
                          <a href="academicYear/{{ $year->id }}/active" type="button" class="btn btn-info btn-flat" ><i class="fa  fa-check-square-o"></i></a>
                         @endif
                       <a href="academicYear/{{ $year->id }}/edit" type="button" class="btn btn-info btn-flat " title="Edit" data-original-title="Edit">
                      <i class="fa fa-pencil"></i></a>
                      <a href="academicYear/{{ $year->id }}/delete" type="button" class="btn btn-danger btn-flat" title="Remove" tooltip="" data-original-title="Remove">
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
