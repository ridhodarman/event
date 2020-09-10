@extends('agen.inc.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Penjualan Tiket
        <small></small>
    </h1>
    <ol class="breadcrumb" style="padding-right: 100px;">
        
    </ol>
    <br />
</section>
@if (session('status'))
<script>
    swal("success!", "{!! session('status') !!}", "success");
</script>
@else if (session('hapus'))
<script>
    swal("{!! session('hapus') !!}");
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
                        <th>Event</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($event as $e)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$e->nama_event}}</td>
                        <td>{{ $e->tanggal_mulai }}</td>
                        <td>
                            <a href="{{ route('tiket') }}/event/{{$e->id}}">
                                <span class="label label-success">
                                    <i class="fa fa-fw fa-ticket"></i> Lihat Penjualan Tiket
                                </span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <a href="{{ route('agen_index') }}">
        <button class="btn btn-default">
            <i class="fa fa-arrow-circle-o-left"></i> Kembali ke dashboard
        </button>
    </a>
</section><!-- /.content -->

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
@endsection