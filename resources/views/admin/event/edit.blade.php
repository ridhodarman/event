@extends('admin.inc.layout')

@section('content')
<div class="panel-heading">
  <h3 class="panel-title">
    <a href="javascript:void(0);" class="toggle-sidebar">
      <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
    </a> Event
  </h3>
</div>
<div class="panel-body">
    <div style="float: right;">
        <a href="{{ route('event') }}/{{ $event->id }}">
            <button type="button" class="btn btn-default">
                <i class="glyphicon glyphicon-chevron-left"></i> Kembali ke informasi jenis tiket
            </button>
        </a>
    </div>
    <h4 class="font-weight-bold" style="padding-bottom: 30px;">Edit Event</h4>

    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Jenis</label>
            <div class="col-sm-10">
                <input type="text" name="nama_event" class="form-control @error('nama_event') is-invalid @enderror"
                    value="{{ old('nama_event', $event->nama_event) }}">
                @error('nama_event')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tanggal Mulai</label>
            <div class="col-sm-10">
                <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $event->tanggal_mulai) }}" class="form-control @error('tanggal_mulai') is-invalid @enderror">
                @error('tanggal_mulai')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                placeholder="">{{ old('deskripsi', $event->deskripsi) }}</textarea>
                @error('deskripsi')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        
        <div style="float: right;">
            <button type="submit" class="btn btn-primary mr-2">Edit</button>
        </div>
    </form>

</div><!-- panel body -->

<script>
$(document).ready(function () {
    $('#example').DataTable();
});

$("#event").css("font-weight", "bolder");
</script>
@endsection