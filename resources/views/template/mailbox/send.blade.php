

@include('layouts.inc.head')
@include('layouts.inc.header')




@include('layouts.inc.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h3>
        <i class="fa fa-envelope"></i> Send Email
       </h3>
     </section>
     <section class="content">

     <section class="content-header">

            <div class="box box-info" style="position: relative; left: 0px; top: 0px;">
                        <div class="box-header ui-sortable-handle" style="cursor: move;">
                          <i class="fa fa-envelope"></i>

                          <!-- tools box -->
                          <div class="box-tools pull-right">

                          </div>
                          <!-- /. tools -->
                        </div>

                        <div class="box-body">
                          <form action="#" method="post">
                            <div class="form-group">
                              <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="subject" placeholder="Subject">
                            </div>
                            <div>
                              <ul class="wysihtml5-toolbar" style=""><li class="dropdown">
              <a class="btn btn-default dropdown-toggle " data-toggle="dropdown">

                  <span class="glyphicon glyphicon-font"></span>

                <span class="current-font">Normal text</span>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="p" tabindex="-1" href="javascript:;" unselectable="on">Normal text</a></li>
                <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" tabindex="-1" href="javascript:;" unselectable="on">Heading 1</a></li>
                <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" tabindex="-1" href="javascript:;" unselectable="on">Heading 2</a></li>
                <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h3" tabindex="-1" href="javascript:;" unselectable="on">Heading 3</a></li>
                <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h4" tabindex="-1" href="javascript:;" unselectable="on">Heading 4</a></li>
                <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h5" tabindex="-1" href="javascript:;" unselectable="on">Heading 5</a></li>
                <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h6" tabindex="-1" href="javascript:;" unselectable="on">Heading 6</a></li>
              </ul>
            </li>
            <li>
              <div class="btn-group">
                <a class="btn  btn-default" data-wysihtml5-command="bold" title="CTRL+B" tabindex="-1" href="javascript:;" unselectable="on">Bold</a>
                <a class="btn  btn-default" data-wysihtml5-command="italic" title="CTRL+I" tabindex="-1" href="javascript:;" unselectable="on">Italic</a>
                <a class="btn  btn-default" data-wysihtml5-command="underline" title="CTRL+U" tabindex="-1" href="javascript:;" unselectable="on">Underline</a>

                <a class="btn  btn-default" data-wysihtml5-command="small" title="CTRL+S" tabindex="-1" href="javascript:;" unselectable="on">Small</a>

              </div>
            </li>
            <li>
              <a class="btn  btn-default" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="blockquote" data-wysihtml5-display-format-name="false" tabindex="-1" href="javascript:;" unselectable="on">

                  <span class="glyphicon glyphicon-quote"></span>

              </a>
            </li>
            <li>
              <div class="btn-group">
                <a class="btn  btn-default" data-wysihtml5-command="insertUnorderedList" title="Unordered list" tabindex="-1" href="javascript:;" unselectable="on">

                  <span class="glyphicon glyphicon-list"></span>

                </a>
                <a class="btn  btn-default" data-wysihtml5-command="insertOrderedList" title="Ordered list" tabindex="-1" href="javascript:;" unselectable="on">

                  <span class="glyphicon glyphicon-th-list"></span>

                </a>
                <a class="btn  btn-default" data-wysihtml5-command="Outdent" title="Outdent" tabindex="-1" href="javascript:;" unselectable="on">

                  <span class="glyphicon glyphicon-indent-right"></span>

                </a>
                <a class="btn  btn-default" data-wysihtml5-command="Indent" title="Indent" tabindex="-1" href="javascript:;" unselectable="on">

                  <span class="glyphicon glyphicon-indent-left"></span>

                </a>
              </div>
            </li>
            <li>
              <div class="bootstrap-wysihtml5-insert-link-modal modal fade" data-wysihtml5-dialog="createLink">
                <div class="modal-dialog ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <a class="close" data-dismiss="modal">×</a>
                      <h3>Insert link</h3>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <input value="http://" class="bootstrap-wysihtml5-insert-link-url form-control" data-wysihtml5-dialog-field="href">
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="bootstrap-wysihtml5-insert-link-target" checked="">Open link in new window
                        </label>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <a class="btn btn-default" data-dismiss="modal" data-wysihtml5-dialog-action="cancel" href="#">Cancel</a>
                      <a href="#" class="btn btn-primary" data-dismiss="modal" data-wysihtml5-dialog-action="save">Insert link</a>
                    </div>
                  </div>
                </div>
              </div>
              <a class="btn  btn-default" data-wysihtml5-command="createLink" title="Insert link" tabindex="-1" href="javascript:;" unselectable="on">

                  <span class="glyphicon glyphicon-share"></span>

              </a>
            </li>
            <li>
              <div class="bootstrap-wysihtml5-insert-image-modal modal fade" data-wysihtml5-dialog="insertImage">
                <div class="modal-dialog ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <a class="close" data-dismiss="modal">×</a>
                      <h3>Insert image</h3>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <input value="http://" class="bootstrap-wysihtml5-insert-image-url form-control" data-wysihtml5-dialog-field="src">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <a class="btn btn-default" data-dismiss="modal" data-wysihtml5-dialog-action="cancel" href="#">Cancel</a>
                      <a class="btn btn-primary" data-dismiss="modal" data-wysihtml5-dialog-action="save" href="#">Insert image</a>
                    </div>
                  </div>
                </div>
              </div>
              <a class="btn  btn-default" data-wysihtml5-command="insertImage" title="Insert image" tabindex="-1" href="javascript:;" unselectable="on">

                  <span class="glyphicon glyphicon-picture"></span>

              </a>
            </li>
          </ul><textarea class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;" placeholder="Message"></textarea> 
                            </div>
                          </form>
                        </div>
                        <div class="box-footer clearfix">
                          <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                            <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                      </div>

    </section>
  </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('layouts.inc.footer')
