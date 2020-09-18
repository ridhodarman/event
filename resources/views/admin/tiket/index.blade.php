@extends('admin.inc.layout')

@section('content')
<div class="panel-heading">
    <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left"
                data-toggle="offcanvas" title="Maximize Panel"></span></a> Riwayat Penjualan Tiket</h3>
</div>
<div class="panel-body">
    <br/><br/>
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
    <br/>
    <h5>Ekspor ke Excel:</h5>
    <div class="row">
        <div class="col-sm-1">
            <label>Dari Tanggal:</label>
        </div>
        <div class="col-sm-3">
            <input type="date" class="form-control" id="mulai" value="2020-01-01">
        </div>
        <div class="col-sm-1">
            <label>Sampai tanggal:</label>
        </div>
        <div class="col-sm-3">
            <input type="date" class="form-control" id="sampai" value="{{ date('Y-m-d') }}">
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-success" onclick="ekspor()">
                <i class="fa fa-file-excel-o"></i> Export
            </button>
        </div>
    </div>
</div><!-- panel body -->

<script>
    function ekspor() {
        let mulai = document.getElementById("mulai").value;
        let sampai = document.getElementById("sampai").value;
        window.open(`{{ route('tiket2') }}/eksport/${mulai}/${sampai}`); 
    }
    $(document).ready(function () {
        $('#example').DataTable();
    });

    $("#tiket").css("font-weight", "bolder");
</script>
@endsection