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
                @if ( isset($tiket->nama_peserta) )
                <img src="{{ URL::asset('cek_tiket/images/oke.png') }}" alt="IMG">
                @else
                <img src="{{ URL::asset('cek_tiket/images/no.png') }}" alt="IMG">
                @endif
            </div>


            <form class="contact1-form validate-form">
                @if ( isset($tiket->nama_peserta) )
                <span class="contact1-form-title" style="color: green;">
                    Tiket Anda Sudah Terdaftar
                </span>
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
                        @php
                            try {
                                $no = "+62".substr($tiket->no_wa, 0, -3)."***";
                            }
                            catch (Exception $e) {
                                $no = $tiket->no_wa;
                            }
                        @endphp
                        <tr>
                            <td>No. WA:</td>
                            <td>
                                {{$no}}
                            </td>
                        </tr>
                        @php
                            try {
                                $email = explode("@", $tiket->e_mail);
                                $e = substr($email[0], 0, -3)."***";
                                $e2 = $e."@".$email[1];
                            }
                            catch (Exception $e) {
                                $e2 = $tiket->e_mail;
                            }
                        @endphp
                        <tr>
                            <td>Email:</td>
                            <td>{{$e2}}</td>
                        </tr>
                        <tr>
                            <td>Event:</td>
                            <td>{{$tiket->nama_event}}</td>
                        </tr>
                        <tr>
                            <td>Tiket:</td>
                            <td>{{$tiket->nama_tiket}}</td>
                        </tr>
                        </tr>

                    </tbody>
                </table>
                <center>
                    <p> {{ $tiket->informasi }}</p>
                </center>
                @else
                <span class="contact1-form-title" style="color: orange">
                    Tiket Anda Belum Terdaftar <br />
                    <small>Silah cek kembali tiket anda, atau hubungi admin/panitian</small>
                </span>
                @endif

                <div class="container-contact1-form-btn">
                    <table style="align-content: center;">
                        @if ( isset($tiket->nama_peserta) )
                        @php
                        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") .
                        "://$_SERVER[HTTP_HOST]"."/kode_tiket/".$tiket->kode_tiket;
                        $link = base64_encode($link);
                        $n = base64_encode($tiket->nama_peserta);
                        $e = base64_encode($tiket->nama_event);
                        $t = base64_encode($tiket->nama_tiket);
                        $k = base64_encode($tiket->kode_tiket);
                        $f = base64_encode($tiket->foto_tiket);
                        @endphp
                        <tr>
                            <td>
                                <a href="{{ route('index') }}/print2.php?
link={{$link}}&
n={{$n}}&
e={{$e}}&
t={{$t}}&
k={{$k}}&
f={{$f}}&
                                " target="_blank">
                                    <button class="contact1-form-btn" type="button">
                                        <span>
                                            Cetak Tiket
                                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                        </span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{route('cek')}}">
                                    <button class="contact1-form-btn" type="button">
                                        <span>
                                            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                            Back
                                        </span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @if ( isset($tiket->name) )
                        <tr>
                            <td>
                                <br />
                                <p>
                                    <small>
                                        CP Panitia: {{$tiket->name}} ({{ $tiket->no_whatsapp }})
                                    </small>
                                </p>
                            </td>
                        </tr>
                        @endif
                    </table>
                    <br />
                </div>
            </form>
        </div>
    </div>

    <script>
        function cek() {
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