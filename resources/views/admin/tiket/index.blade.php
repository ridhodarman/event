@extends('admin.inc.layout')

@section('content')
<div class="panel-heading">
    <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left"
                data-toggle="offcanvas" title="Maximize Panel"></span></a> Riwayat Penjualan Tiket</h3>
</div>
<div class="panel-body">
    @if (session('hapus'))
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('hapus') !!}
    </div>
    @endif
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
                    <th>Status</th>
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
                        @if ($t->status)
                            <font color="green"> Sudah Lunas </font>
                        @elseif ($t->status===0)
                            <font color="red"> Belum Lunas </font>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('tiket2')}}/{{ $t->id }}">
                            <button class="btn btn-xs" title="lihat detail"><span class="glyphicon glyphicon-folder-open"></span></button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exportModal">
        <i class="fa fa-file-excel-o"></i> Export ke Excel
    </button>
    <div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">Ekspor data tiket ke excel</h5>
                </div>
                <div class="modal-body">
                    <label>Dari Tanggal:</label>
                    <input type="date" class="form-control" id="mulai" value="2020-01-01">
                    <br/>
                    <label>Sampai tanggal:</label>
                    <input type="date" class="form-control" id="sampai" value="{{ date('Y-m-d') }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="ekspor()">
                        <i class="fa fa-file-excel-o"></i> Ekspor
                    </button>
                </div>
            </div>
        </div>
    </div>
    &emsp;
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#statusModal">
        <i class="glyphicon glyphicon-import"></i> Ubah Status Tiket
    </button>

    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('tiket2') }}/admin/filter" method="GET">@csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="exampleModalLabel">Pilih list tiket</h5>
                    </div>
                    <div class="modal-body">
                        <label>Pilih Event:</label>
                        <br/>
                        <select class="js-example-basic-single" style="width: 100%;" name="event">
                            <option value="">Semua Event</option>
                            @foreach ($event as $e)
                                <option value="{{$e->id}}">{{$e->nama_event}}: {{$e->tanggal_mulai}}</option>
                            @endforeach
                        </select>
                        <br/><br/>
                        <label>Pilih Agen:</label>
                        <br/>
                        <select class="js-example-basic-single" style="width: 100%;" name="agen">
                            <option value="">Semua agen</option>
                            @foreach ($agen as $a)
                                <option value="{{$a->id}}">{{$a->name}} ( {{$a->email}} )</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-default">
                            <i class="glyphicon glyphicon-barcode"></i> View
                        </button>
                    </div>
                </div>
            </form>
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

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection