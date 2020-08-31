<!DOCTYPE html>
<html>
<head>
	<link href="agen_page/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
	<style>
	    @font-face {
	        font-family: tulisan;
	        src: url("font/InconsolataCondensed-Regular.ttf");
	    }

	    *{
	        font-family: 'tulisan';
	        font-variant: inherit;
	    }
	</style>
</head>
<body>
	<div style="max-width: 595px;">
    <div style="display: flex;">
        <div>
            <img src="foto/tiket/<?php echo base64_decode($_GET['f']); ?>" style="max-width: 300px; ">
        </div>
        <div>
        	&nbsp;
        </div>
        	<div style="float: right;">
        		<?php echo base64_decode($_GET['n']); ?> <br/>
        		Tiket: <?php echo base64_decode($_GET['k']); ?> <br/>
        		<?php echo base64_decode($_GET['e']); ?> <br/>
        		Kode Tiket: <b><?php echo base64_decode($_GET['k']); ?></b> <br/>
        	
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

            echo '<img src="'.$tempdir.$namaFile.'" />';  
        	$cek = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/cek-tiket";
        	echo "<br/><small>Scan QR Code atau verifikasi tiket di: ".$cek."</small>";
        ?>

        	</div>
        
    </div>
</div>
    
</body>
</html>