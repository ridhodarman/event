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
            class="lazy" width="100px" onclick="window.open(`{{ URL::asset('foto/brosur/'.$e->foto_brosur) }}`)" style="cursor: pointer;">
          {{ substr($e->deskripsi,0,200) }}... <a href="{{route('index')}}/show/{{ $e->id }}" target="_blank">Readmore</a><br /> <br />
          <a href="{{ route('tiket') }}/event/{{$e->id}}">
            <button class="btn btn-success"><i class="fa fa-fw fa-ticket"></i> Klik disini untuk penjualan
              tiket</button>
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
  <br />

  @foreach ($agen as $a)
  @if($a->no_whatsapp)

  @else
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <div class="modal fade" id="exampleModal-profil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Lengkapi Profil</h4>
        </div>
        <div class="modal-body">
          <p> Sepertinya anda belum meng-inputkan Nomor WhatsApp anda. Silahkan lengkapi profil anda dahulu </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Nanti Saja</button>
          <a href="{{route('profil')}}">
            <button type="button" class="btn btn-primary" >Edit Profil Sekarang</button>
          </a>
        </div>
      </div><!-- /.modal-content -->
    </div>
  </div>
  <script>
    $(document).ready(function () {
      $('#exampleModal-profil').modal('show');
    });
  </script>
  @endif
  @endforeach
</section><!-- /.content -->
@endsection