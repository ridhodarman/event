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

    @if (session('status'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('status') !!}
    </div>
    @elseif (session('hapus'))
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('hapus') !!} Atau coba cek tong sampah
    </div>
    @endif
    <div style="float: right;">
        <a href="{{ route('event') }}/tambah">
            <button type="button" class="btn btn-default">
                <i class="glyphicon glyphicon-list"></i> Tambah Event
            </button>
        </a>
    </div>
    <h4 class="font-weight-bold mb-0">Daftar Event</h4>

    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered table-hover display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal mulai event</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event as $e)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$e->nama_event}}</td>
                    <td>{{$e->tanggal_mulai}}</td>
                    <td>
                        <a href="{{ route('event') }}/{{$e->id}}">
                            <button class="btn btn-primary btn-xs">
                                <i class="glyphicon glyphicon-new-window"></i> detail
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div><!-- panel body -->

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    $("#event").css("font-weight", "bolder");
</script>
@endsection