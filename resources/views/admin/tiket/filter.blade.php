@extends('admin.inc.layout')

@section('content')
<div class="panel-heading">
    <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left"
            data-toggle="offcanvas" title="Maximize Panel"></span></a> 
            List Tiket
    </h3>
</div>
<div class="panel-body">
    @if (session('hapus'))
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('hapus') !!}
    </div>
    @endif
    <div style="padding-bottom: 30px; width: 100%; text-align: right;">
        <a href="{{ route('tiket2') }}">
            <button type="button" class="btn btn-default">
                <i class="glyphicon glyphicon-chevron-left"></i> Kembali ke riwayat penjualan tiket
            </button>
        </a>
    </div>

    <form action="{{ route('tiket2') }}/admin/ganti-status" method="POST">@csrf
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered table-hover display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>Tiket</th>
                        <th>Kode Tiket</th>
                        <th>Tanggal Input</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tiket as $t)
                    <tr>
                        <td>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="tiket[]" value="{{ $t->id }}">
                                    {{ $loop->iteration }}
                                </label>
                            </div>
                        </td>
                        <td>{{$t->nama_peserta}}</td>
                        <td>{{$t->nama_tiket}}</td>
                        <td>
                            
                            <a href="{{route('tiket2')}}/{{ $t->id }}" target="_blank">
                                {{$t->kode_tiket}}
                            </a>
                        </td>
                        <td>{{$t->created_at}}</td>
                        <td>
                            @if ($t->status)
                                <font color="green"> Sudah Lunas </font>
                            @elseif ($t->status===0)
                                <font color="red"> Belum Lunas </font>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-sm-1">
                <label>Pilih Status:</label>
            </div>
            <div class="col-sm-4">
                <select class="form-control" name="status">
                    <option></option>
                    <option value="1">Sudah Lunas</option>
                    <option value="0">Belum Lunas</option>
                </select>
            </div>
            <div class="col-sm-4">
                <button class="btn btn-info">Ganti</button>
            </div>
        </div>
    </form>
    @if (session('sukses'))
    <script>
        swal("success!", "{!! session('sukses') !!}", "success");
    </script>
    @endif


</div><!-- panel body -->

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    $("#tiket").css("font-weight", "bolder");

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection