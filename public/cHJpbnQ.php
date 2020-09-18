<!DOCTYPE html>
<html>
<head>
	<link href="agen_page/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
	<style>
        body {
  margin: 0;
  padding: 0;
  background-color: #FAFAFA;
  font: 12pt "Tahoma";
}

* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.page {
  width: 19cm;
  overflow:hidden;
height:1%;
  padding: 1cm;
  margin: 1cm auto;
  border: 1px #D3D3D3 solid;
  border-radius: 5px;
  background: white;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.subpage {
  padding: 1cm;
  border: 5px red solid;
  height: 256mm;
  outline: 2cm #FFEAEA solid;
}

@page {
  size: A4;
  margin: 0;
}

@media print {
  .page {
    margin: 0;
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;
  }
}

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
<body class="page">
	<div style="max-width: 595px;">
    <div style="display: flex;">
        <div>
            <img src="foto/tiket/<?php echo base64_decode($_GET['f']); ?>" style="max-width: 300px; ">
        </div>
        <div>
        	&nbsp;
        </div>
        	<div style="float: right;">
        		<small><?php echo base64_decode($_GET['n']); ?> <br/></small>
        		<!-- <small style="font-size: 73%"> Asal: <?php //echo base64_decode($_GET['a']); ?> </small><br/> -->
        		<small style="font-size: 73%"> No. Whatsapp: <?php echo base64_decode($_GET['w']); ?> </small><br/>
            <small style="font-size: 73%"> Email: <?php echo base64_decode($_GET['e']); ?> </small><br/>
        		<small>Kode Tiket: <b><?php echo base64_decode($_GET['k']); ?></b></small> <br/>
        	
<?php
        

            include "phpqrcode/qrlib.php"; 

            $tempdir = "temp/"; //Nama folder tempat menyimpan file qrcode
            if (!file_exists($tempdir)) //Buat folder bername temp
            mkdir($tempdir);

            //isi qrcode jika di scan
            $codeContents = base64_decode($_GET['l']);
            //echo $codeContents;
            //nama file qrcode yang akan disimpan
            $namaFile="test.png";
            //ECC Level
            $level=QR_ECLEVEL_H;
            //Ukuran pixel
            $UkuranPixel=1.8;
            //Ukuran frame
            $UkuranFrame=0;

            QRcode::png($codeContents, $tempdir.$namaFile, $level, $UkuranPixel, $UkuranFrame); 

            echo '<img src="'.$tempdir.$namaFile.'" />';  
        	$cek = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/cek-tiket";
        	echo "<br/><small style='font-size: 75%''>Scan QR Code atau verifikasi tiket di:<br> <a href='".$cek."' target='_blank'><u>".$cek."</u></a></small>";
        ?>

        	</div>
        
    </div>
</div>
<!-- <br/>
<div style="border-bottom:1px dashed #000;">
</div>
<div style="float: right;">gunting disini</div> -->
</body>
</html>
<script type="text/javascript">
    window.print();
</script>