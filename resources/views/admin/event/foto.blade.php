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
                <i class="glyphicon glyphicon-chevron-left"></i> Kembali ke informasi event
            </button>
        </a>
    </div>
    <h4 class="font-weight-bold" style="padding-bottom: 30px;">Upload Foto</h4>

    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Foto Brosur</label>
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
            <button type="submit" class="btn btn-primary mr-2">Upload</button>
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