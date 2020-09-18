<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>QOSin Event</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ URL::asset('cek_tiket/images/icons/qosin.png') }}" rel="icon">
  <link href="{{ URL::asset('halaman_awal/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ URL::asset('halaman_awal/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('halaman_awal/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('halaman_awal/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('halaman_awal/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('halaman_awal/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('halaman_awal/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('halaman_awal/assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ URL::asset('halaman_awal/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v2.2.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  @yield('content')
  <div class="container footer-bottom clearfix">
    <div class="copyright">
      Copyright &copy; 2020 <strong><span> QOSin Event</span></strong>. Some Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
       Powered by<a href="#"> QOSin</a>
    </div>
  </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ URL::asset('halaman_awal/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('halaman_awal/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL::asset('halaman_awal/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ URL::asset('halaman_awal/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ URL::asset('halaman_awal/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ URL::asset('halaman_awal/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ URL::asset('halaman_awal/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ URL::asset('halaman_awal/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::asset('halaman_awal/assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ URL::asset('halaman_awal/assets/js/main.js') }}"></script>

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