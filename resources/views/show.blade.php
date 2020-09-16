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

<main id="main">

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Informasi Event</h2>
      </div>

      <div class="row">
        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <div class="php-email-form">
                <img src="{{ URL::asset('assets/150x100.png') }}" data-original="{{ URL::asset('foto/brosur/'.$event->foto_brosur) }}"
                class="lazy img-fluid">
            </div>
          </div>

        <div class="col-lg-5 d-flex align-items-stretch">
          <div class="info">

            <div class="date">
              <i class="icofont"></i>
              <h4>{{ $event->nama_event }}</h4>
              <p>{{ $event->tanggal_mulai }}</p>
            </div>

            <p style="color: black; margin-left: -5px;">
              @php $paragraphs = explode(PHP_EOL, $event->deskripsi); @endphp
              @foreach($paragraphs as $paragraph)
                  {{{ $paragraph }}}<br/>
              @endforeach
            </p>

        </div>


      </div>

    </div>
  </s><!-- End Contact Section -->

</main><!-- End #main -->

<script>
  function kirim_wa(){
      let pesan = document.getElementById("pesan").value;
      if (pesan != "") {
        window.open(`https://api.whatsapp.com/send?phone=6282283493446&text=${pesan}`); 
      }
      else {
        swal("Silahkan tuliskan pertanyaan anda pada kolom yang disediakan");
      }
  }
</script>

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