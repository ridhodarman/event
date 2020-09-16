@extends('agen.inc.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Penjualan Tiket
        <small> <strong></strong></small>
    </h1>
    <!-- <ol class="breadcrumb" style="padding-right: 100px;">
        <a href="{{ route('tiket') }}/tambah/event/{{$event->id}}">
            <button class="btn btn-primary">
                <i class="fa fa-tags"></i> Tambahkan Penjualan Tiket
            </button>
        </a>
    </ol>
    <br/> -->
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">{{$event->nama_event}}</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form role="form" method="POST">
                @csrf
                <!-- text input -->
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" placeholder="masukkan nama lengkap peserta (untuk cetak sertifikat)"
                        name="nama_peserta" class="form-control @error('nama_peserta') is-invalid @enderror"
                        value="{{ old('nama_peserta') }}"/>
                    @error('nama_peserta')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Asal Instansi / Lokasi</label>
                    <input type="text" class="form-control"
                        placeholder="nama instansi/ kampus atau lokasi asal peserta ..." 
                        name="asal" class="form-control @error('asal') is-invalid @enderror"
                        value="{{ old('asal') }}"/>
                    @error('asal')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>No. Whatsapp</label>
                    <div class="input-group">
                        <span class="input-group-addon">+62</span>
                        <input type="text" class="form-control" placeholder="8xxxxxxx" 
                        name="no_wa" class="form-control @error('no_wa') is-invalid @enderror"
                        value="{{ old('no_wa') }}"/>
                    </div>
                    @error('no_wa')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" class="form-control"
                        placeholder="" 
                        name="e_mail" class="form-control @error('e_mail') is-invalid @enderror"
                        value="{{ old('e_mail') }}"/>
                    @error('e_mail')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- radio --><br />
                <div class="form-group">
                    <label>Pilih Tiket</label>
                    @foreach ($jenis_tiket as $j)
                    <div class="radio">
                        <button type="button" class="btn btn-secondary btn-xs" data-toggle="modal"
                            data-target="#exampleModal{{ $j->id }}"
                            title="klik untuk menampilkan info tiket: {{ $j->nama_tiket }}">
                            <i class="fa fa-info"></i>
                        </button>
                        <label>
                            <input type="radio" name="jenis_tiket" id="optionsRadios1" value="{{ $j->id }}">
                            {{ $j->nama_tiket }}

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $j->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">{{ $j->nama_tiket }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            @php $paragraphs = explode(PHP_EOL, $j->keterangan); @endphp
                                            @foreach($paragraphs as $paragraph)
                                                <p>{{{ $paragraph }}}</p>
                                            @endforeach
                                            <strong>Harga:</strong>
                                            <p>Rp. {{ $j->harga }}</p>
                                            <a href="{{ URL::asset('foto/tiket/'.$j->foto_tiket) }}" target="_blank">
                                                view tiket <i class="fa fa-unlink"></i>
                                            </a>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div>
                            </div>
                        </label>
                    </div>
                    @endforeach
                    @error('jenis_tiket')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- textarea -->
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" rows="3"
                        placeholder="*opsional, isikan catatan bila perlu. Jika tidak ada kosongkan bagian ini ..."
                        class="form-control @error('asal') is-invalid @enderror"
                        name="keterangan">{{ old('keterangan') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary pull-right">
                    <i class="fa fa-tags"></i> Submit
                </button>
                <br /><br />
            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->
@endsection