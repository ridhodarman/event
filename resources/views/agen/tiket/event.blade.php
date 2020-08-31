@extends('agen.inc.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Penjualan Tiket
        <small> <strong>{{$event->nama_event}}</strong></small>
    </h1>
    <ol class="breadcrumb" style="padding-right: 100px;">
        <a href="{{ route('tiket') }}/tambah/event/{{$event->id}}">
            <button class="btn btn-primary">
                <i class="fa fa-tags"></i> Tambahkan Penjualan Tiket
            </button>
        </a>
    </ol>
    <br/>
</section>
@if (session('status'))
    <script>
        swal("success!", "{!! session('status') !!}", "success");
    </script>
@endif
<!-- Main content -->
<section class="content">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <div class="table-responsive">
        <div class="box">
            <table id="example" class="table table-striped table-bordered table-hover display">
            <thead>
                <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>Asal</th>
                <th>Jenis Tiket</th>
                <th>Tanggal Input</th>
                <th>-</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiket as $t)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$t->nama_peserta}}</td>
                <td>{{$t->asal}}</td>
                <td>{{$t->nama_tiket}}</td>
                <td>{{$t->created_at}}</td>
                <td>
                    <a href="{{ route('tiket') }}/{{$t->id}}">
                        <span class="label label-info">
                            <i class="fa fa-folder-open-o"></i> View detail
                        </span>
                    </a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
      </div>
</section><!-- /.content -->

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
@endsection