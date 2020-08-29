@extends('admin.inc.layout')

@section('content')
<div class="panel-heading">
    <h3 class="panel-title">
        <a href="javascript:void(0);" class="toggle-sidebar">
            <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
        </a> Tiket
    </h3>
</div>
<div class="panel-body">
    @if (session('status'))
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('status') !!}
    </div>
    @elseif (session('status-foto'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('status-foto') !!}
    </div>
    @elseif (session('status-hapus-foto'))
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('status-hapus-foto') !!}
    </div>
    @endif
    <form action="{{ route('jenis_tiket') }}/{{$jenis_tiket->id}}" method="POST" class="d-inline" style="float: left">
        &emsp;
        @method('delete')
        @csrf
        <button type="button" class="btn btn-outline-danger btn-fw" id="tombol-hapus">
            <i class="glyphicon glyphicon-trash"></i> Hapus Tiket
        </button>
        &emsp;
        <a href="{{ route('jenis_tiket') }}/{{$jenis_tiket->id}}/edit">
            <button type="button" class="btn btn-outline-primary btn-fw">
                <i class="glyphicon glyphicon-edit"></i> Edit Informasi Tiket
            </button>
        </a>
    </form>

    <div style="float: right; padding-bottom: 30px;">
        <a href="{{ route('event') }}/{{$jenis_tiket->event_id}}">
            <button type="button" class="btn btn-default">
                <i class="glyphicon glyphicon-chevron-left"></i> Kembali ke daftar event
            </button>
        </a>
    </div>



    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="row">
                <div class="col-md-7">
                    <p class="card-title text-md-center text-xl-left" style="color: black; font-weight: bolder;">
                        Informasi Jenis Tiket</p>
                    <table class="table table-hover">
                        <tr>
                            <td>Nama Tiket</td>
                            <td>:</td>
                            <td>{{$jenis_tiket->nama_tiket}}</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>{{$jenis_tiket->harga}}</td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td>{{$jenis_tiket->keterangan}}</td>
                        </tr>
                        <tr>
                            <td>Dibuat Pada</td>
                            <td>:</td>
                            <td>{{$jenis_tiket->created_at}}</td>
                        </tr>
                        <tr>
                            <td>Terakhir diubah</td>
                            <td>:</td>
                            <td>{{$jenis_tiket->updated_at}}</td>
                        </tr>
                    </table>
                </div>
                @if ($jenis_tiket->foto_tiket)
                <div class="col-md-5">
                    <a href="{{ URL::asset('foto/tiket/'.$jenis_tiket->foto_tiket) }}" target="_blank">
                        <img src="{{ URL::asset('foto/tiket/'.$jenis_tiket->foto_tiket) }}" width="350px">
                    </a>
                    <br /> <br />

                    <form action="{{ route('jenis_tiket') }}/{{$jenis_tiket->id}}/hapus_foto" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="button" class="btn btn-danger btn-xs" id="hapus-brosur">
                            <i class="glyphicon glyphicon-floppy-remove"></i> Hapus Foto Tiket
                        </button>
                    </form>
                    @else
                    <center>
                        <h3>
                            <i class="fa fa-image"></i>
                        </h3>
                        belum ada foto tiket
                        <br />
                        <a href="{{ route('jenis_tiket') }}/{{$jenis_tiket->id}}/foto">
                            <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-upload"></i>
                                Upload Foto Tiket
                            </button>
                        </a>
                    </center>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>



<script>
    let peringatan = true;
    $('#tombol-hapus').on('click', function (e) {
        if (peringatan == true) {
            swal({
                title: "Hapus Jenis Tiket ini?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        peringatan = false;
                        $('#tombol-hapus').removeAttr("type").attr("type", "submit");
                        $('#tombol-hapus').trigger("click");
                    }
                });
        }
    });

    let peringatan_b = true;
    $('#hapus-brosur').on('click', function (e) {
        if (peringatan_b == true) {
            swal({
                title: "Hapus Foto Tiket?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        peringatan_b = false;
                        $('#hapus-brosur').removeAttr("type").attr("type", "submit");
                        $('#hapus-brosur').trigger("click");
                    }
                });
        }
    });
</script>


</div><!-- panel body -->

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    $("#event").css("font-weight", "bolder");
</script>
@endsection