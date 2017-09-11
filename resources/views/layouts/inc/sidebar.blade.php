
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->username}} - {{Auth::user()->rule}}</p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

        <li class="  treeview">
          <a href="{{ url('/home') }}">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>

         <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ url('/mailbox') }}"><i class="fa fa-cog"></i>Index
                <small class="label pull-right bg-yellow">16</small></a>
            </li>
            <li class="active"><a href="{{ url('/sendMail') }}"><i class="fa fa-cog"></i>Send</a></li>
          </ul>
        </li>
        @if(Auth::user()->rule=='parent' || Auth::user()->rule=='student' || Auth::user()->rule=='admin' )

         <li class="treeview">
          <a href="{{ url('/teachers') }}">
            <i class="fa fa-suitcase"></i> <span>Teachers</span>
          </a>
        </li>
        @endif
        @if(Auth::user()->rule=='parent' || Auth::user()->rule=='teacher' || Auth::user()->rule=='admin' )

        <li class="treeview">
          <a href="{{ url('/student') }}">
            <i class="fa fa-users"></i> <span>Students</span>
          </a>
        </li>
          @endif
          @if( Auth::user()->rule=='teacher' || Auth::user()->rule=='admin' )
        <li class="treeview">
          <a href="{{ url('/parent') }}">
            <i class="fa fa-user"></i> <span>Parents</span>
          </a>
        </li>
        @endif
        <li class="treeview ">
          <a >
                 <i class="fa fa-graduation-cap"></i> <span>Exams </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{ url('/exam') }}"><i class="fa fa-file-text"></i> Exam List</a></li>
              </ul>
                @if(Auth::user()->rule=='admin' )
              <ul class="treeview-menu">
                <li class="active"><a href="{{ url('/createExam') }}"><i class="fa fa-file-text-o"></i>Create Exam</a></li>
              </ul>
                @endif
        </li>
        <li>
          @if( Auth::user()->rule=='student')

        <li class="treeview">
          <a href="{{ url('markStudent') }}">
            <i class="fa fa-table"></i> <span>Marksheet</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{ url('chart') }}">
            <i class="fa fa-line-chart"></i> <span>Chart</span>
          </a>
        </li>
        @endif
        @if( Auth::user()->rule=='admin' )



        <li class="treeview">
           <a href="{{ url('/class') }}">
             <i class="fa fa-sitemap"></i><span>Classes</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ url('/subjects') }}">
            <i class="fa fa-book"></i> <span>Subjects</span>
          </a>
        </li>

        <li>
          <a href="{{ url('/academicYear') }}">
            <i class="fa fa-cog fa-calendar-check-o"></i> <span>Academic Years</span>
          </a>
        </li>
          @endif
    </section>
    <!-- /.sidebar -->
  </aside>
