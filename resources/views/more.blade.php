@extends('layouts.satu')

@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
  <div class="container d-flex align-items-center">

    <h1 class="logo mr-auto"><a href="{{ route('index') }}">QOSIN EVENT</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo mr-auto"><img src="{{ URL::asset('halaman_awal/assets/img/logo.png') }}" alt="" class="img-fluid"></a>-->

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li><a href="{{ route('index') }}#home">Home</a></li>
        <li><a href="{{ route('index') }}#event">List Event</a></li>
        <li><a href="{{ route('index') }}#faq">FAQ</a></li>
        <li class="drop-down"><a href="javascript:;">Agen</a>
          <ul>
            <li class="drop-down"><a href="#">Akses</a>
              <ul>
                <li><a href="{{ route('login') }}">Sign In</a></li>
                <li><a href="{{ route('register') }}">Sign Up</a></li>
              </ul>
            </li>
            <li><a href="https://api.whatsapp.com/send?phone=6281371855757&text=Hai admin, saya ingin bertanya tentang qosin event" target="_blank">Tanya admin</a></li>
          </ul>
        </li>
        <!-- <li><a href="{{route('cek')}}" target="_blank">Cek Tiket</a></li> -->
      </ul>
    </nav><!-- .nav-menu -->

    <a href="{{route('cek')}}" target="_blank" class="get-started-btn scrollto">Cek Tiket</a>

  </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->

<div style="height: 80px; background-color: #3D4D6A;">

</div>

  
  <!-- ======= Team Section ======= -->
  <section id="event" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>LIST EVENT</h2>
        <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
      </div>

      <div class="row">
      @foreach ($event as $e)
      <div class="col-lg-6 mt-4">
          <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration }}00">
            <div>
              <img src="http://placehold.it/150x100" data-original="{{ URL::asset('foto/brosur/'.$e->foto_brosur) }}"
                class="lazy img-fluid" style="cursor: pointer;"
                onclick="javascript:location.href=`{{route('index')}}/show/{{ $e->id }}`">
            </div>
            <div class="member-info">
              <h4>{{ $e->nama_event }}</h4>
              <small style="color: gray"> {{ $e->tanggal_mulai }}</small>
              <p>{{ substr($e->deskripsi,0,20) }}<a href="{{route('index')}}/show/{{ $e->id }}">...Readmore</a></p>
              <div class="social">
                <a href="javascript:;"><i class="ri-twitter-fill"></i></a>
                <a href="javascript:;"><i class="ri-facebook-fill"></i></a>
                <a href="javascript:;"><i class="ri-instagram-fill"></i></a>
                <a href="javascript:;"> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
    <div style="padding-top: 50px;">
      <center>
      <a href="{{ route('index') }}">
        <h3>  Back  </h3>
      </a>
      </center>
    </div>
  </section><!-- End Team Section -->


 

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

  
@endsection