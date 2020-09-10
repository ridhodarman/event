@extends('agen.inc.layout')

@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
                                <td>Keterangan:</td>
                                <td>{{$tiket->keterangan}}</td>
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

                    <button class="btn btn-app" data-toggle="modal" data-target="#exampleModal-hapus"
                        style="color: red;">
                        <i class="fa fa-trash"></i> Hapus
                    </button>
                    <div class="modal fade" id="exampleModal-hapus" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Hapus Tiket</h4>
                                </div>
                                <div class="modal-body">
                                    Yakin hapus tiket ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default"
                                        data-dismiss="modal">Cancel</button>
                                    &emsp;
                                    <form action="" method="POST" class="d-inline" style="float: right">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Hapus Sekarang</button>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div>
                    </div>

                    <button class="btn btn-app" data-toggle="modal" data-target="#exampleModal-edit"
                        style="color: darkblue;">
                        <i class="fa fa-edit"></i> Edit
                    </button>
                    <div class="modal fade" id="exampleModal-edit" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="" method="POST">
                                @method('patch')
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Edit Tiket</h4>
                                    </div>
                                    <div class="modal-body">
                                        <label>Nama Peserta</label>
                                        <input type="text" class="form-control" name="nama_peserta" value="{{$tiket->nama_peserta}}"/>
                                        <br/>
                                        <label>Jenis Tiket</label>
                                        <select class="form-control" id="jenis" name="jenis_tiket">
                                            @foreach ($jenis as $j)
                                            <option value="{{ $j->id }}">{{ $j->nama_tiket }}</option>
                                            @endforeach
                                        </select>
                                        <br/>
                                        <label>Asal</label>
                                        <input type="text" class="form-control" name="asal" value="{{$tiket->asal}}"/>
                                        <br/>
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="keterangan">{{$tiket->keterangan}}</textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </form>
                        </div>
                    </div>
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
                <i class="fa fa-whatsapp"></i> Kirim via WhatsApp
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
                            <label> Masukkan nomor WhatsApp </label>
                            <div class="input-group">
                                <span class="input-group-addon">+62</span>
                                <input type="text" class="form-control" placeholder="8xxxxxxx" id="no_wa">
                            </div>
                            <br/>
                            <label> Pesan </label>
                            <textarea class="form-control" id="pesan_wa">
Hi {{ $tiket->nama_peserta }}. 
Anda sudah terdaftar pada event "{{ $tiket->nama_event }}." 
Kode tiket anda adalah: {{ $tiket->kode_tiket }} .

Untuk validasi atau cek tiket dapat dilakukan melalui link: 
{{ $cek = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/cek-tiket" }}
                            </textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" onclick="kirim_wa()"
                                data-dismiss="modal">Kirim</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div>
            </div>
        </div>
    </diV>
</section><!-- /.content -->

@php
    echo '
        <script>
            let jenis ='.$tiket->jenis.'
        </script>
    '
@endphp

<script>

    function kirim_wa(){
        let nomor = document.getElementById("no_wa").value;
        let pesan = document.getElementById("pesan_wa").value;
        window.open(`https://api.whatsapp.com/send?phone=62${nomor}&text=${pesan}`); 
    }

    $( document ).ready(function() {
        $("#jenis").val(jenis);
    });
</script>
@endsection