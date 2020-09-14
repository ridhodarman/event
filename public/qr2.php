        	
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
        	

        ?>