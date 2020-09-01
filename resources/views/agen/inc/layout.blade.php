<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ URL::asset('agen_page/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="{{ URL::asset('agen_page/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ URL::asset('agen_page/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ URL::asset('agen_page/plugins/iCheck/flat/blue.css') }}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{ URL::asset('agen_page/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ URL::asset('agen_page/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{{ URL::asset('agen_page/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{ URL::asset('agen_page/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{ URL::asset('agen_page/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.21/datatables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="{{ URL::asset('agen_page/index2.html') }}" class="logo"><b>Agen</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ URL::asset('agen_page/dist/img/user.jpg') }}" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ URL::asset('agen_page/dist/img/user.jpg') }}" class="img-circle" alt="User Image" />
                    <p>
                      {{ Auth::user()->name }}
                      <small>{{ Auth::user()->email }}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-2 text-center">
                      <a href="#">-</a>
                    </div>
                    <div class="col-xs-2 text-center">
                      <a href="#">-</a>
                    </div>
                    <div class="col-xs-8 text-center">
                      <a href="{{route('changePassword')}}">Ganti Password</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ URL::asset('agen_page/dist/img/user.jpg') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{route('agen_index')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i> <span>Tiket</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Penjualan Tiket</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Riwayat Penjualan tiket</a></l>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Other Page</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#" target="_blank"><i class="fa fa-circle-o text-warning"></i> Cek Tiket</a></li>
                <li><a href="#" target="_blank"><i class="fa fa-circle-o text-info"></i> User Page</a></l>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        @yield('content')
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 0.1
        </div>
        <strong>Copyright &copy; 2020.</strong> Some rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ URL::asset('agen_page/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ URL::asset('agen_page/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <!-- <script src="{{ URL::asset('agen_page/plugins/morris/morris.min.js') }}" type="text/javascript"></script> -->
    <!-- Sparkline -->
    <script src="{{ URL::asset('agen_page/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{ URL::asset('agen_page/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('agen_page/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ URL::asset('agen_page/plugins/knob/jquery.knob.js') }}" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="{{ URL::asset('agen_page/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="{{ URL::asset('agen_page/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ URL::asset('agen_page/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ URL::asset('agen_page/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="{{ URL::asset('agen_page/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ URL::asset('agen_page/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('agen_page/dist/js/app.min.js') }}" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="{{ URL::asset('agen_page/dist/js/pages/dashboard.js') }}" type="text/javascript"></script> -->

    <script src="{{ URL::asset('agen_page/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('agen_page/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::asset('agen_page/dist/js/demo.js') }}" type="text/javascript"></script>

    <script src="{{ URL::asset('assets/lazyload/jquery.lazyload.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
      $(function() {
          $("img.lazy").lazyload({effect : "fadeIn"});// untuk dipasang di <img src='xxxx'>
          $("div.lazy").lazyload({effect : "fadeIn"});// untuk dipasang sebagai background / div
      });
      $( document ).ready(function() {
        $( ".no-print" ).hide();
      });
    </script>
  </body>
</html>