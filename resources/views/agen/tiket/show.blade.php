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
        @php
            $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/kode_tiket/".$tiket->kode_tiket;
            $link = base64_encode($link);
            $n = base64_encode($tiket->nama_peserta);
            $e = base64_encode($tiket->nama_event);
            $t = base64_encode($tiket->nama_tiket);
            $k = base64_encode($tiket->kode_tiket);
            $f = base64_encode($tiket->foto_tiket);
        @endphp
        <div class="col-sm-6">
            <a class="btn btn-social btn-github" 
                href="{{ route('index') }}/print2.php?
                    link={{$link}}&
                    n={{$n}}&
                    e={{$e}}&
                    t={{$t}}&
                    k={{$k}}&
                    f={{$f}}&
                    " 
                target="_blank">
                <i class="fa fa-barcode"></i> Print Tiket
            </a>
            <br /><br />
            <button type="button" class="btn btn-social btn-google-plus" data-toggle="modal"
                data-target="#exampleModal-e">
                <i class="fa fa-envelope"></i> Kirim tiket via E-mail
            </button>
            <div class="modal fade" id="exampleModal-e" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Kirim tiket via E-mail</h4>
                        </div>
                        <div class="modal-body">
                            Masukkan E-mail
                            <input type="text" class="form-control" placeholder="masukkan email peserta ..."/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary"
                                data-dismiss="modal">Kirim</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div>
            </div>
            <br /><br />
            <button type="button" class="btn btn-social btn-success" data-toggle="modal"
                data-target="#exampleModal-wa">
                <i class="fa fa-whatsapp"></i> Kirim tiket via WhatsApp
            </button>
            <div class="modal fade" id="exampleModal-wa" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Kirim tiket via WhatsApp</h4>
                        </div>
                        <div class="modal-body">
                            Masukkan nomor WhatsApp
                            <input type="text" class="form-control"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary"
                                data-dismiss="modal">Kirim</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div>
            </div>
        </div>
    </diV>

</section><!-- /.content -->


@endsection