@extends('admin.inc.layout')

@section('content')
<div class="panel-heading">
    <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left"
                data-toggle="offcanvas" title="Maximize Panel"></span></a> Riwayat Penjualan Tiket</h3>
</div>
<div class="panel-body">
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered table-hover display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peserta</th>
                    <th>Tiket</th>
                    <th>Event</th>
                    <th>Tanggal Input</th>
                    <th>Agen</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiket as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$t->nama_peserta}}</td>
                    <td>{{$t->nama_tiket}}</td>
                    <td>{{$t->nama_event}}</td>
                    <td>{{$t->created_at}}</td>
                    <td>{{$t->name}}</td>
                    <td>
                        <a href="{{route('tiket2')}}/show/{{ $t->id }}">
                            <button class="btn btn-xs" title="lihat detail"><span class="glyphicon glyphicon-folder-open"></span></button>
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

    $("#tiket").css("font-weight", "bolder");
</script>
@endsection