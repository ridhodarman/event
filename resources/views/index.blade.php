@extends('layouts.satu')

@section('content')
<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
  <div class="container d-flex align-items-center">

    <h1 class="logo mr-auto"><a href="index.html">QOSIN EVENT</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo mr-auto"><img src="{{ URL::asset('halaman_awal/assets/img/logo.png') }}" alt="" class="img-fluid"></a>-->

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="#home">Home</a></li>
        <li><a href="#event">List Event</a></li>
        <li><a href="#faq">FAQ</a></li>
        <!-- <li><a href="#team">Team</a></li>
        <li class="drop-down"><a href="">Drop Down</a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="drop-down"><a href="#">Deep Drop Down</a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li> -->
        <li><a href="#contact">Contact</a></li>
        <!-- <li><a href="{{route('cek')}}" target="_blank">Cek Tiket</a></li> -->
      </ul>
    </nav><!-- .nav-menu -->

    <a href="{{route('cek')}}" target="_blank" class="get-started-btn scrollto">Cek Tiket</a>

  </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container" id="home">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h1>Selamat Datang di QOSin Event</h1>
        <h2>Asdf ghjkl zxc vbnm qwerty uiopoiu kjhjj asdsa mnvmn !</h2>
        <div class="d-lg-flex">
          <a href="#event" class="btn-get-started scrollto">Get Started</a>
          <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Watch Video <i class="icofont-play-alt-2"></i></a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{ URL::asset('halaman_awal/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">

  <!-- ======= Cliens Section ======= -->
  <section id="cliens" class="cliens section-bg">
    <div class="container">

      <div class="row" data-aos="zoom-in">

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <a href="//qosin.id" title="Belanja kebutuhan pokok sehari-hari">
            <img src="{{ URL::asset('halaman_awal/assets/img/clients/shop2.png') }}" class="img-fluid" alt="">
          </a>
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <a href="//qosin.id/kos/cari" title="Cari kos atau kontrakan">
            <img src="{{ URL::asset('halaman_awal/assets/img/clients/kos.webp') }}" class="img-fluid" alt="">
          </a>
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="{{ URL::asset('halaman_awal/assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="{{ URL::asset('halaman_awal/assets/img/clients/client-3.png') }}" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="{{ URL::asset('halaman_awal/assets/img/clients/client-5.png') }}" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="{{ URL::asset('halaman_awal/assets/img/clients/client-6.png') }}" class="img-fluid" alt="">
        </div>

      </div>

    </div>
  </section><!-- End Cliens Section -->

  
  <!-- ======= Team Section ======= -->
  <section id="event" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>LIST EVENT</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">
      @foreach ($event as $e)
      <div class="col-lg-6 mt-4">
          <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration }}00">
            <div><img src="{{ URL::asset('foto/brosur/'.$e->foto_brosur) }}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>{{ $e->nama_event }}</h4>
              <small style="color: gray"> {{ $e->tanggal_mulai }}</small>
              <p>{{ substr($e->deskripsi,0,20) }}<a href="" target="_blank">...Readmore</a></p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </section><!-- End Team Section -->


  <!-- ======= Frequently Asked Questions Section ======= -->
  <section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Frequently Asked Questions</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="faq-list">
        <ul>
          @foreach ($faq as $f)
          <li data-aos="fade-up" data-aos-delay="{{ $loop->iteration }}00">
            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-{{ $loop->iteration }}" class="collapsed">
              {{ $f->tanya }}
              <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-{{ $loop->iteration }}" class="collapse" data-parent=".faq-list">
              <p>
                {{ $f->jawab }}
              </p>
            </div>
          </li>
          @endforeach

        </ul>
      </div>

    </div>
  </section><!-- End Frequently Asked Questions Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Tanyakan Sesuatu</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">

        <div class="col-lg-5 d-flex align-items-stretch">
          <div class="info">
            <div class="address">
              <i class="icofont-google-map"></i>
              <h4>Location:</h4>
              <p>Jalan, Padang</p>
            </div>

            <div class="email">
              <i class="icofont-envelope"></i>
              <h4>Email:</h4>
              <p>official@qosin.id</p>
            </div>

            <div class="phone">
              <i class="icofont-phone"></i>
              <h4>Call:</h4>
              <p>+62 822 8349 3446</p>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1071.623269609764!2d100.36461606572725!3d-0.9379684178286526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b924d862c027%3A0x10d0377ac17869e2!2sJati%20Baru%2C%20Kec.%20Padang%20Tim.%2C%20Kota%20Padang%2C%20Sumatera%20Barat!5e1!3m2!1sid!2sid!4v1599578740624!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
          </div>

        </div>

        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            
            
            <div class="form-group">
              <label for="name">Message</label>
              <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us" placeholder="tuliskan pertanyaan anda disini..."></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message (WA)</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-newsletter">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          
        </div>
      </div>
    </div>
  </div>

  <div class="footer-top">
    <div class="container">
      <div class="row">


      </div>
    </div>
  </div>

  <div class="container footer-bottom clearfix">
    <div class="copyright">
      &copy;  <strong><span> </span></strong>. Some Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
      Designed by <a href="#">BootstrapMade</a>
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
@endsection