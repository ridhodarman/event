<link href="{{ URL::asset('agen_page/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />    
<style>
    @font-face {
        font-family: tulisan;
        src: url("{{ URL::asset('font/InconsolataCondensed-Regular.ttf') }}");
    }

    *{
        font-family: 'tulisan';
        font-variant: inherit;
    }
</style>
<div style="max-width: 595px;">
    <div class="row">
        <div class="col-sm-7">
            <img src="{{ URL::asset('foto/tiket/'.$tiket->foto_tiket) }}" style="max-width: 350px;">
        </div>
        <div class="col-sm-5">
            <table>                    
                <tr>
                    <td>Nama Peserta</td>
                    <td>:</td>
                    <td>{{$tiket->nama_peserta}}</td>
                </tr>
                <tr>
                    <td>Asal</td>
                    <td>:</td>
                    <td>{{$tiket->asal}}</td>
                </tr>
                <tr>
                    <td>Event</td>
                    <td>:</td>
                    <td>{{$tiket->nama_event}}</td>
                </tr>
                <tr>
                    <td>Kode Tiket</td>
                    <td>:</td>
                    <td>{{$tiket->kode_tiket}}</td>
                </tr>
                <tr>
                    <td>Tiket</td>
                    <td>:</td>
                    <td>{{$tiket->nama_tiket}}</td>
                </tr>
                <tr>
                    <td>Dibuat Pada</td>
                    <td>:</td>
                    <td>{{$tiket->created_at}}</tr>
                </tr>
                <tr>
                    <td>Terakhir Diubah</td>
                    <td>:</td>
                    <td>{{$tiket->updated_at}}</tr>
                </tr>
            </table>


@php
    $host = "$_SERVER[HTTP_HOST]"."/";
    $aset_qr = $host."phpqrcode/qrlib.php";

    include(public_path().'/phpqrcode/qrlib.php');

 $tempdir = "temp/"; //Nama folder tempat menyimpan file qrcode
 if (!file_exists($tempdir)) //Buat folder bername temp
    mkdir($tempdir);

    //isi qrcode jika di scan
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/kode_tiket/".$tiket->id;
    $codeContents = $actual_link; 
  
 //simpan file kedalam folder temp dengan nama 001.png
 $pecah = explode("/", $codeContents);
 $hasil = $pecah[2]."/";
 QRcode::png($hasil,$tempdir."001.png"); 
 echo $hasil,$tempdir."001.png <br>";
 


 echo '<h2>Simpan File QRCode</h2>';
 //menampilkan file qrcode 
 $gambar_qr = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/phpqrcode/";
 echo '<img src="'.$gambar_qr.$tempdir.'001.png" />';
 echo "<br>";
 echo $actual_link;


@endphp
        </div>
    </div>
</div>

