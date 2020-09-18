@extends('layouts.dua')

@section('content')


<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Informasi Event</h2>
    </div>

    <div class="row">
      <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
        <div class="php-email-form">
          <img src="{{ URL::asset('assets/150x100.png') }}"
            data-original="{{ URL::asset('foto/brosur/'.$event->foto_brosur) }}" class="lazy img-fluid">
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
            {{{ $paragraph }}}<br />
            @endforeach
          </p>

        </div>


      </div>

    </div>
    </s><!-- End Contact Section -->

    </main><!-- End #main -->

    <script>
      function kirim_wa() {
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