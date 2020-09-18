@extends('layouts.dua')

@section('content')


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
            <p>{{ substr($e->deskripsi,0,20) }}<a href="{{route('index')}}/show/{{ $e->id }}"
                target="_blank">...Readmore</a></p>
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
          <h3> Back </h3>
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