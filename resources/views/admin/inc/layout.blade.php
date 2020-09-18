<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>QOSin Event</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href=""/>
    <link rel="bookmark" href="{{ URL::asset('favicon_16.ico') }}"/>
    <!-- site css -->
    <link rel="stylesheet" href="{{ URL::asset('dist/css/site.min.css') }}">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="{{ URL::asset('dist/js/site.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.21/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.21/datatables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- tambahan style tombol -->
    <link rel="stylesheet" href="{{ URL::asset('css/style2.css') }}">

    <!-- pencarian select option -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <style>
      *{margin: 0px auto;}
      html,body{
          height: 100%;
      }

      .kebawah{
        width: 100%;
        height: 1px;
        padding-left: 10px;
        line-height: 50px;
        position: absolute;
        bottom: 0px;
        z-index: -1;
      }

      #kontainer{
        min-height: 100%;
        position: relative;
      }
    </style>
  </head>
  <body>
    <!--nav-->
    <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Admin</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="#">Homepage</a></li>
              <li class="active"><a href="{{route('agen_index')}}" target="_blank">halaman agen</a></li>
              <!-- <li class="disabled"><a href="#">Link</a></li> -->
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">{{ Auth::user()->name }} <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <li class="dropdown-header">Setting</li>
                  <li><a href="#">Edit Profil</a></li>
                  <li>
                    <a href="{{route('changePassword')}}">
                    Change Password
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </li>
                </ul>
              </li>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    <!--header-->
    <div class="container-fluid">
    <!--documents-->
        <div class="row row-offcanvas row-offcanvas-left">
          <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>SIDE PANEL</b></li>
                <li class="list-group-item"><input type="text" class="form-control search-query" placeholder="Search Something"></li>
                <li class="list-group-item" id="dashboard"><a href="{{route('admin_index')}}"><i class="glyphicon glyphicon-home"></i>Dashboard </a></li>
                <li>
                    <a href="#user" class="list-group-item " data-toggle="collapse" id="tab-user"><i class="glyphicon glyphicon-user"></i> User  <span class="glyphicon glyphicon-chevron-right"></span></a>
                      <li class="collapse" id="user">
                        <a href="{{route('user')}}" class="list-group-item" id="user_register">&emsp;&emsp; User terdaftar</a>
                        <a href="{{route('agen')}}" class="list-group-item" id="agen">&emsp;&emsp; Agen User</a>
                      </li>
                  </li>
                <li class="list-group-item" id="event"><a href="{{route('event')}}"><i class="glyphicon glyphicon-bell"></i>Event</li>
                <li class="list-group-item" id="tiket"><a href="{{route('tiket2')}}"><i class="glyphicon glyphicon-list-alt"></i>Riwayat Penjualan tiket</li>
                <li class="list-group-item" id="faq"><a href="{{route('faq')}}"><i class="glyphicon glyphicon-th-list"></i>FAQ</li>
              </ul>
          </div>
          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
                @yield('content')
            </div>
        </div><!-- content -->
      </div>
    </div>
    <!--footer-->
  </body>
  <footer>
    <!-- <div class="kebawah site-footer">
      <div class="container">
        
        <div class="row">
          <div class="col-md-4">
            <h3>Get involved</h3>
            <p>Bootflat is hosted on <a href="https://github.com/silverbux/bootflat-admin" target="_blank" rel="external nofollow">GitHub</a> and open for everyone to contribute. Please give us some feedback and join the development!</p>
          </div>
          <div class="col-md-4">
            <h3>Contribute</h3>
            <p>You want to help us and participate in the development or the documentation? Just fork Bootflat on <a href="https://github.com/silverbux/bootflat-admin" target="_blank" rel="external nofollow">GitHub</a> and send us a pull request.</p>
          </div>
          <div class="col-md-4">
            <h3>Found a bug?</h3>
            <p>Open a <a href="https://github.com/silverbux/bootflat-admin/issues" target="_blank" rel="external nofollow">new issue</a> on GitHub. Please search for existing issues first and make sure to include all relevant information.</p>
          </div>
        </div>
        
        <hr class="dashed" />
        <div class="row">
          <div class="col-md-6">
            <h3>Talk to us</h3>
            <ul>
              <li>Tweet us at <a href="https://twitter.com" target="_blank">@YourTwitter</a>&nbsp;&nbsp;&nbsp;&nbsp;Email us at <span class="connect">info@yourdomain.com</span></li>
              <li>
                <a title="Twitter" href="https://twitter.com" target="_blank" rel="external nofollow"><i class="icon" data-icon="&#xe121"></i></a>
                <a title="Facebook" href="https://www.facebook.com" target="_blank" rel="external nofollow"><i class="icon" data-icon="&#xe10b"></i></a>
                <a title="Google+" href="https://plus.google.com/" target="_blank" rel="external nofollow"><i class="icon" data-icon="&#xe110"></i></a>
                <a title="Github" href="https://github.com/alexquiambao" target="_blank" rel="external nofollow"><i class="icon" data-icon="&#xe10e"></i></a>
              </li>
            </ul>
          </div>
          <div class="col-md-6">
            <!-- Begin MailChimp Signup Form --/>
            <link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
            <div id="mc_embed_signup">
            <h3 style="margin-bottom: 15px;">Newsletter</h3>
            <form action="" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" novalidate>
                <input style="margin-bottom: 10px;" type="email" value="" name="EMAIL" class="email form-control" id="mce-EMAIL" placeholder="email address" required>
                <span class="clear"><input type="" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary" readonly></span>
            </form>
            </div>
            <!--End mc_embed_signup --/>
          </div>
        </div>
        <hr class="dashed" />
        <div class="copyright clearfix">
          <p><b>Bootflat</b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ URL::asset('getting-started.html') }}">Getting Started</a>&nbsp;&bull;&nbsp;<a href="{{ URL::asset('index.html') }}">Documentation</a>&nbsp;&bull;&nbsp;<a href="https://github.com/Bootflat/Bootflat.UI.Kit.PSD/archive/master.zip">Free PSD</a>&nbsp;&bull;&nbsp;<a href="{{ URL::asset('colors.html') }}">Color Picker</a></p>
          <p>Code licensed under <a href="http://opensource.org/licenses/mit-license.html') }}" target="_blank" rel="external nofollow">MIT License</a>, documentation under <a href="http://creativecommons.org/licenses/by/3.0/" rel="external nofollow">CC BY 3.0</a>.</p>
        </div>
      </div>
    </div> -->
  </footer>
</html>
