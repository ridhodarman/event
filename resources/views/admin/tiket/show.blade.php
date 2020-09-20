@extends('admin.inc.layout')

@section('content')
<style>
    .tombol-trans {
        background-color: Transparent;
        background-repeat: no-repeat;
        border: none;
        cursor: pointer;
        overflow: hidden;
        outline: none;
        color: white;
    }
</style>
<div class="panel-heading">
    <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left"
                data-toggle="offcanvas" title="Maximize Panel"></span></a> Informasi Tiket</h3>
</div>

<div class="panel-body">
    @if (session('status'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('status') !!}
    </div>
    @endif

    <div style="float: right; padding-bottom: 30px;">
        <a href="{{ route('tiket2') }}">
            <button type="button" class="btn btn-default">
                <i class="glyphicon glyphicon-chevron-left"></i> Kembali ke riwayat penjualan tiket
            </button>
        </a>
    </div>
    @php
    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]"."/kode_tiket/".$tiket->kode_tiket;
    $link = base64_encode($link);
    $n = base64_encode($tiket->nama_peserta);
    $a = base64_encode($tiket->asal);
    //$w = base64_encode($tiket->no_wa);
    $e = base64_encode($tiket->email);
    $k = base64_encode($tiket->kode_tiket);
    $f = base64_encode($tiket->foto_tiket);
    $t = base64_encode($tiket->nama_tiket);

    $no = "";
    try {
    if ($tiket->no_wa) {
    $no = "+62".substr($tiket->no_wa, 0, -3)."***";
    }
    }
    catch (Exception $e) {
    $no = $tiket->no_wa;
    }

    $w = base64_encode( $no );

    try {
    $email = explode("@", $tiket->e_mail);
    $e = substr($email[0], 0, -3)."***";
    $e = base64_encode( $e."@".$email[1] );
    }
    catch (Exception $e) {
    $e = base64_encode( $tiket->e_mail );
    }
    @endphp
    <div class="table-responsive">
        <table class="table table-striped table-hover display" style="width:100%">
            <tr>
                <td>Kode Tiket</td>
                <td>:</td>
                <td>
                    {{ $tiket->kode_tiket }}
                    <a href="{{ route('index') }}/cHJpbnQ.php?
l={{$link}}&
n={{$n}}&
a={{$a}}&
w={{$w}}&
e={{$e}}&
k={{$k}}&
f={{$f}}&
t={{$t}}&" target="_blank"
                        style="background-color: rgb(160, 158, 158); color: white; padding-left: 5px; padding-right: 5px; border-radius: 5px;">
                        Lihat tiket
                    </a>
                </td>
            </tr>

            <tr>
                <td>Nama Peserta</td>
                <td>:</td>
                <td>{{ $tiket->nama_peserta }}</td>
            </tr>

            <tr>
                <td>Asal</td>
                <td>:</td>
                <td>{{ $tiket->asal }}</td>
            </tr>

            <tr>
                <td>No WA</td>
                <td>:</td>
                <td>
                    @if ($tiket->no_wa) +62 @endif
                    {{ $tiket->no_wa }}
                </td>
            </tr>

            <tr>
                <td>Email:</td>
                <td>:</td>
                <td>{{ $tiket->e_mail }}</td>
            </tr>

            <tr>
                <td>Tanggal Input</td>
                <td>:</td>
                <td>{{ $tiket->created_at }}</td>
            </tr>

            <tr>
                <td>Terakhir di-update</td>
                <td>:</td>
                <td>{{ $tiket->updated_at }}</td>
            </tr>

            <tr>
                <td>Jenis Tiket</td>
                <td>:</td>
                <td>{{ $tiket->nama_tiket }}</td>
            </tr>

            <tr>
                <td>Nama Event</td>
                <td>:</td>
                <td>
                    {{ $tiket->nama_event }}
                    <a href="{{route('index')}}/show/{{ $tiket->event_id }}" target="_blank"
                        style="background-color: rgb(160, 158, 158); color: white; padding-left: 5px; padding-right: 5px; border-radius: 5px;">
                        View
                    </a>
                </td>
            </tr>

            <tr>
                <td>Agen</td>
                <td>:</td>
                <td>
                    {{ $tiket->name }}
                    ( {{ $tiket->no_whatsapp }} )
                    | {{ $tiket->email }}
                </td>
            </tr>

            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td>
                    @php $paragraphs = explode(PHP_EOL, $tiket->keterangan); @endphp
                    @foreach($paragraphs as $paragraph)
                    {{{ $paragraph }}}<br />
                    @endforeach
                </td>
            </tr>

            <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                    @if ($tiket->status)
                        <font color="green"> Sudah Lunas </font>
                    @elseif ($tiket->status===0)
                        <font color="darkred"> Belum Lunas </font>
                    @endif
                </td>
            </tr>
        </table>
    </div>
    <form action="{{ route('tiket2') }}/{{$tiket->id}}" method="POST" class="d-inline" style="float: left">
        &emsp;
        @method('delete')
        @csrf
        <button type="button" class="btn btn-outline-danger btn-fw" id="tombol-hapus">
            <i class="glyphicon glyphicon-trash"></i> Hapus Tiket
        </button>
    </form>
    &emsp;
    <div class="btn-group">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">Status <span
                class="caret"></span></button>
        <ul class="dropdown-menu" role="menu">
            <form action="/tiket/status/{{$tiket->id}}" method="POST">
                @method('patch')
                @csrf
                <input type="hidden" name="status" value="1"></input>
                <li><button class="tombol-trans" type="submit">&emsp;Sudah Lunas</button></li>
            </form>
            <form action="/tiket/status/{{$tiket->id}}" method="POST">
                @method('patch')
                @csrf
                <input type="hidden" name="status" value="0"></input>
                <li><button class="tombol-trans" type="submit">&emsp;Belum Lunas</button></li>
            </form>
            <li class="divider"></li>
            <form action="/tiket/status/{{$tiket->id}}" method="POST">
                @method('patch')
                @csrf
                <input type="hidden" name="status" value=""></input>
                <li><button class="tombol-trans" type="submit">&emsp;Kosong</button></li>
            </form>
        </ul>
    </div>

</div><!-- panel body -->

<script>
    let peringatan = true;
    $('#tombol-hapus').on('click', function (e) {
        if (peringatan == true) {
            swal({
                title: "Hapus Jenis Tiket ini?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
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

    $("#tiket").css("font-weight", "bolder");
</script>
@endsection