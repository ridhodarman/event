@extends('agen.inc.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <ol class="breadcrumb" style="padding-right: 100px;">
        <a href="{{ route('tiket') }}/event/{{$tiket->event_id}}">
            <button class="btn btn-default">
                <i class="fa fa-tags"></i> Kembali ke daftar penjualan tiket
            </button>
        </a>
    </ol>
    <h1>
        Tiket
        <small>Kode: <strong>{{$tiket->kode_tiket}}</strong></small>
    </h1>
    <br />
</section>
@if (session('status'))
<script>
    swal("success!", "{!! session('status') !!}", "success");
</script>
@endif
<!-- Main content -->
<section class="content">
    <diV class="row">
        <div class="col-sm-6">
            <div class="table-responsive">
                <div class="box">
                    <table id="example" class="table table-hover display">
                        <tbody>

                            <tr>
                                <td>Nama Peserta:</td>
                                <td>{{$tiket->nama_peserta}}</td>
                            </tr>
                            <tr>
                                <td>Asal:</td>
                                <td>{{$tiket->asal}}</td>
                            </tr>
                            <tr>
                                <td>Event:</td>
                                <td>{{$tiket->nama_event}}</td>
                            </tr>
                            <tr>
                                <td>Tiket:</td>
                                <td>{{$tiket->nama_tiket}}</td>
                            </tr>
                            <tr>
                                <td>Dibuat Pada:</td>
                                <td>{{$tiket->created_at}}
                            </tr>
                            </tr>
                            <tr>
                                <td>Terakhir Diubah:</td>
                                <td>{{$tiket->updated_at}}
                            </tr>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-social btn-github" href="{{ route('kode') }}/cetak/{{$tiket->id}}" target="_blank">
                <i class="fa fa-barcode"></i> Print Tiket
            </a>
            <br /><br />
            <a class="btn btn-social btn-google-plus mt-2">
                <i class="fa fa-envelope"></i> Kirim tiket via E-mail
            </a>
            <br /><br />
            <a class="btn btn-social btn-success">
                <i class="fa fa-whatsapp"></i> Kirim tiket via Whatsapp
            </a>
        </div>
    </diV>

</section><!-- /.content -->


@endsection