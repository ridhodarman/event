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
    @if (session('hapus-tiket'))
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('hapus-tiket') !!}
    </div>
    @elseif (session('status-hapus-foto'))
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('status-hapus-foto') !!}
    </div>
    @elseif (session('status-foto'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('status-foto') !!}
    </div>
    @endif
    <form action="{{ route('event') }}/{{$event->id}}" method="POST" class="d-inline" style="float: left">
        &emsp;
        @method('delete')
        @csrf
        <button type="button" class="btn btn-outline-danger btn-fw" id="tombol-hapus">
            <i class="glyphicon glyphicon-trash"></i> Hapus Event
        </button>
        &emsp;
        <a href="{{ route('event') }}/{{$event->id}}/edit">
            <button type="button" class="btn btn-outline-primary btn-fw">
                <i class="glyphicon glyphicon-edit"></i> Edit Informasi Event
            </button>
        </a>
    </form>

    <div style="float: right; padding-bottom: 30px;">
        <a href="{{ route('event') }}">
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
                        Informasi Event</p>
                    <table class="table table-hover">
                        <tr>
                            <td>Nama Event</td>
                            <td>:</td>
                            <td>{{$event->nama_event}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Mulai Event</td>
                            <td>:</td>
                            <td>{{$event->tanggal_mulai}}</td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td>{{$event->deskripsi}}</td>
                        </tr>
                        <tr>
                            <td>Dibuat Pada</td>
                            <td>:</td>
                            <td>{{$event->created_at}}</td>
                        </tr>
                        <tr>
                            <td>Terakhir diubah</td>
                            <td>:</td>
                            <td>{{$event->updated_at}}</td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-5" style="text-align: center;">
                    @if ($event->foto_brosur)
                        <a href="{{ URL::asset('foto/brosur/'.$event->foto_brosur) }}" target="_blank">
                            <img src="{{ URL::asset('foto/brosur/'.$event->foto_brosur) }}" width="350px">
                        </a>
                        <br /> <br />

                        <form action="{{ route('event') }}/{{$event->id}}/hapus_foto" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-danger btn-xs" id="hapus-brosur">
                                <i class="ti-trash"></i> Hapus Foto Brosur
                            </button>
                        </form>
                    @else
                        <h3>
                            <i class="fa fa-image"></i>
                        </h3>
                        belum ada foto brusur
                        <br />
                        <a href="{{ route('event') }}/{{$event->id}}/foto">
                            <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-upload"></i>
                                Upload Foto Brosur
                            </button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="table-responsive">
        <br/>
        <div style="width: 95%;">
            <div style="float: right;">
                <a href="{{ route('jenis_tiket') }}/{{ $event->id }}/tambah">
                    <button type="button" class="btn btn-info btn-xs">
                        <i class="glyphicon glyphicon-tag"></i> Tambah Jenis Tiket
                    </button>
                </a>
            </div>
            <p class="card-title text-md-center text-xl-left" style="color: black; font-weight: bolder;">
                Jenis Tiket Yang Dijual</p>
            <table id="example" class="table table-striped table-bordered table-hover display">
                <thead>
                    <tr>
                        <th>Nama Tiket</th>
                        <th>-</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenis_tiket as $t)
                    <tr>
                        <td>{{$t->nama_tiket}}</td>
                        <td>
                            <a href="{{ route('jenis_tiket') }}/{{$t->id}}">
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
        @if (session('status'))
        <script>
            swal("success!", "{!! session('status') !!}", "success");
        </script>
        @elseif (session('hapus'))
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!! session('hapus') !!}
        </div>
        @endif
    </div>

</div>



<script>
    let peringatan = true;
    $('#tombol-hapus').on('click', function (e) {
        if (peringatan == true) {
            swal({
                title: "Are you sure?",
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
                title: "Hapus foto brosur?",
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