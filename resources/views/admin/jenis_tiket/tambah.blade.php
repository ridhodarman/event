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
        <a href="{{ route('event') }}/{{ $event }}">
            <button type="button" class="btn btn-default">
                <i class="glyphicon glyphicon-chevron-left"></i> Kembali ke informasi event
            </button>
        </a>
    </div>
    <h4 class="font-weight-bold" style="padding-bottom: 30px;">Tambah Jenis Tiket</h4>

    <form class="forms-sample" action="{{ route('jenis_tiket') }}/{{ $event }}/tambah" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Tiket</label>
            <div class="col-sm-10">
                <input type="text" name="nama_tiket" class="form-control @error('nama_tiket') is-invalid @enderror"
                    value="{{ old('nama_tiket') }}">
                @error('nama_tiket')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Harga Tiket</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <span class="input-group-addon">Rp</span>
                    <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
                    <span class="input-group-addon">,00</span>
                </div>
                @error('harga')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                placeholder="">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Foto Tiket</label>
            <div class="col-sm-10">
                <input type="file" name="file" value="{{ old('file') }}"
                    class="form-control @error('file') is-invalid @enderror">
                @error('file')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div style="float: right;">
            <button type="submit" class="btn btn-primary mr-2">Tambah</button>
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