@extends('agen.inc.layout')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>agen panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <label><u> Event akan datang </u></label>
          @foreach ($event as $e)
          <ul class="timeline">
            <!-- END timeline item -->
            <!-- timeline time label -->
            <li class="time-label">
              <span class="bg-gray">
                {{ $e->tanggal_mulai }}
              </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              @php 
                $teks = substr($e->deskripsi,0,200).' ... <a href="" target="_blank">Readmore</a>';
                $tgl = date('Y-m-d');
                $tgl1 = new DateTime($e->tanggal_mulai);
                $tgl2 = new DateTime($tgl);
                $hari = $tgl2->diff($tgl1)->days;
              @endphp
              <i class="fa fa-camera bg-purple"></i>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i>{{ $hari }} hari lagi</span>
                <h3 class="timeline-header"><a href="javascript:;">{{ $e->nama_event }}</a> .</h3>
                <div class="timeline-body">
                  <img src="http://placehold.it/150x100" data-original="{{ URL::asset('foto/brosur/'.$e->foto_brosur) }}" 
                    class="lazy" width="100px" onclick="window.open(`{{ URL::asset('foto/brosur/'.$e->foto_brosur) }}`)">
                  {!! $teks !!} <br/> <br/>
                  <a href="{{ route('event') }}/{{$e->id}}">
                    <button class="btn btn-success"><i class="fa fa-fw fa-ticket"></i> Klik disini untuk penjualan tiket</button>
                  </a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </>
          </ul>
          @endforeach

          @php
            if ( count($event)==0 ) {
              echo "tidak ada event dalam waktu dekat";
            }
          @endphp
          <br/>

          @foreach ($agen as $a)
            @if($a->no_whatsapp)
            
            @else
            <div class="box box-solid box-warning">
              <div class="box-header">
                <h3 class="box-title">Pemberitahuan</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-warning btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-warning btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <p>
                  Profil anda sepertinya belum lengkap, silahkan lengkapi profil anda
                  <code>disini.</code>
                </p>
                
              </div><!-- /.box-body -->
            </div><!-- /.box -->
            @endif
          @endforeach
        </section><!-- /.content -->
        @endsection