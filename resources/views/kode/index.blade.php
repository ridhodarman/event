<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cek Tiket</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ URL::asset('cek_tiket/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cek_tiket/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cek_tiket/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cek_tiket/vendor/animate/animate.css') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('cek_tiket/vendor/css-hamburgers/hamburgers.min.css') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cek_tiket/vendor/select2/select2.min.css') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cek_tiket/css/util.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cek_tiket/css/main.css') }}" />
    <!--===============================================================================================-->
</head>

<body>

    <div class="contact1">
        <div class="container-contact1">
            <div class="contact1-pic js-tilt" data-tilt>
                <img src="{{ URL::asset('cek_tiket/images/img-01.png') }}" alt="IMG">
            </div>

            <form class="contact1-form validate-form">
                <span class="contact1-form-title">
                    Cek Tiket Anda
                </span>

                <div class="wrap-input1 validate-input" data-validate="Name is required">
                    <input class="input1" type="text" name="name" id="kode"
                        placeholder="Masukkan Kode Tiket Anda Disini ...">
                    <span class="shadow-input1"></span>
                </div>

                <div class="container-contact1-form-btn">
                    <button class="contact1-form-btn" type="button" onclick="cek()">
                        <span>
                            Cek Tiket
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

<script>
    function cek () {
        let kode = document.getElementById("kode").value;
        window.location = `{{route('kode')}}/${kode}`;
    }
</script>


    <!--===============================================================================================-->
    <script src="{{ URL::asset('cek_tiket/vendor/jquery/jquery-3.2.1.min.js') }} "></script>
    <!--===============================================================================================-->
    <script src="{{ URL::asset('cek_tiket/vendor/bootstrap/js/popper.js') }} "></script>
    <script src="{{ URL::asset('cek_tiket/vendor/bootstrap/js/bootstrap.min.js') }} "></script>
    <!--===============================================================================================-->
    <script src="{{ URL::asset('cek_tiket/vendor/select2/select2.min.js') }} "></script>
    <!--===============================================================================================-->
    <script src="{{ URL::asset('cek_tiket/vendor/tilt/tilt.jquery.min.js') }} "></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
        src="{{ URL::asset('cek_tiket/https://www.googletagmanager.com/gtag/js?id=UA-23581568-13') }} "></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

    <!--===============================================================================================-->
    <script src="{{ URL::asset('cek_tiket/js/main.js') }} "></script>

</body>

</html>