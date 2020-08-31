<html>
<head>
    <link href="agen_page/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <style>
        @font-face {
            font-family: tulisan;
            src: url("font/InconsolataCondensed-Regular.ttf");
        }

        *{
            font-family: "tulisan";
            font-variant: inherit;
        }
    </style>
</head>
<?php
    include "phpqrcode/qrlib.php"; 
    
    $tempdir = "temp/"; //Nama folder tempat menyimpan file qrcode
    if (!file_exists($tempdir)) //Buat folder bername temp
    mkdir($tempdir);

    //isi qrcode jika di scan
    $codeContents = base64_decode($_GET['link']);
    //echo $codeContents;
    //nama file qrcode yang akan disimpan
    $namaFile="test.png";
    //ECC Level
    $level=QR_ECLEVEL_H;
    //Ukuran pixel
    $UkuranPixel=2;
    //Ukuran frame
    $UkuranFrame=0;

    QRcode::png($codeContents, $tempdir.$namaFile, $level, $UkuranPixel, $UkuranFrame); 
    $nama = base64_decode($_GET['n']);
    $foto = base64_decode($_GET['f']);
    $tiket = base64_decode($_GET['k']);
    $event = base64_decode($_GET['e']);
    $kode = base64_decode($_GET['k']);

    $cek = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/cek-tiket";
$content = '

<body>
	<div style="max-width: 595px;">
    <div style="display: flex;">
        <div>
            <img src="foto/tiket/'.$foto.'" style="max-width: 300px; ">
        </div>
        <div>
        	&nbsp;
        </div>
        	<div style="float: right;">
        		'.$nama.' <br/>
        		Tiket: '.$tiket.' <br/>
        		'.$event.' <br/>
        		Kode Tiket: <b>'.$kode.'</b> <br/>
        	

            <img src="'.$tempdir.$namaFile.'" />
        	echo "<br/><small>Scan QR Code atau verifikasi tiket di: ".$cek."</small>";
        

        	</div>
        
    </div>
</div>
    
</body>
</html>
';

    require __DIR__.'/assets/html2pdf/vendor/autoload.php';
    use Spipu\Html2Pdf\Html2Pdf;
    $html2pdf = new Html2Pdf('P','A4','fr', true, 'UTF-8', array(15, 15, 15, 15), false); 
    $html2pdf->writeHTML($content);
    $html2pdf->output();
?>