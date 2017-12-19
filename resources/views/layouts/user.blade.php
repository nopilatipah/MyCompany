<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMK Assalaam</title>
    
    <!-- css -->
    <link href="{{ asset('Frontend/Medicio/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Frontend/Medicio/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Frontend/Medicio/plugins/cubeportfolio/css/cubeportfolio.min.css') }}">
    <link href="{{ asset('Frontend/Medicio/css/nivo-lightbox.css') }}" rel="stylesheet" />
    <link href="{{ asset('Frontend/Medicio/css/nivo-lightbox-theme/default/default.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Frontend/Medicio/css/owl.carousel.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('Frontend/Medicio/css/owl.theme.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('Frontend/Medicio/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('Frontend/Medicio/css/style.css') }}" rel="stylesheet">

    <!-- boxed bg -->
    <link id="bodybg" href="{{ asset('Frontend/Medicio/bodybg/bg1.css') }}" rel="stylesheet" type="text/css" />
    <!-- template skin -->
    <link id="t-colors" href="{{ asset('Frontend/Medicio/color/default.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">

  <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    
    
    <style type="text/css">

.nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #666; }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #22bfbc !important; background: transparent; }
        .nav-tabs > li > a::after { content: ""; background: #22bfbc; height: 5px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
.tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
.tab-pane { padding: 15px 0; }
.tab-content{padding:20px}

.card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }


</style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
@php
$komponen = App\Komponen::find(1);
@endphp

<div id="wrapper">
    
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="top-area">
            <div class="container">
                <div class="row">
                <div class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                    <div class="col-sm-6 col-md-6">
                    <p class="bold text-left">COMPANY PROFILE</p>
                    </div>
                </div>
                 <div class="wow fadeInRight" data-wow-delay="0.1s">
                    <div class="col-sm-6 col-md-6">
                    <p class="bold text-right">{{$komponen->motto}}</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="container navigation">
        
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                <div class="wow fadeInDown" data-wow-duration="2s" data-wow-delay="0.2s">
                    <img src="{{ asset('img/'.$komponen->logo) }}" alt="" height="50" />
                </div>
                </a>
            </div>

            @yield('navbar')
        </div>
        <!-- /.container -->
    </nav>
    @include('sweet::alert')
    @yield('content') 

    <footer>
    
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="widget">
                        <h5>Tentang Sekolah</h5>
                        <p>
                        {{$komponen->tentang}}
                        </p>
                    </div>
                    </div>
                    
                </div>
                @php
                        $lokasi = App\Vendor::find(1);
                        $fb = App\Kontak::find(1);
                        $tw = App\Kontak::find(2);
                        $fx = App\Kontak::find(3);
                        $yt = App\Kontak::find(4);
                        $ig = App\Kontak::find(5);
                        $wa = App\Kontak::find(6);
                        $email = App\Kontak::find(7);
                        $tlp = App\Kontak::find(8);
                        @endphp
                <div class="col-sm-6 col-md-4">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="widget">
                        <h5>Hubungi Kami</h5>
                        <p>
                        Anda dapat menghubungi {{$komponen->nama_sekolah}} melalui kontak dibawah ini.
                        </p>
                        <ul>
                            <li>
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                </span> {{$tlp->kontak}}
                            </li>
                            <li>
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                                </span> {{$email->kontak}}
                            </li>

                        </ul>
                        
                    </div>
                    
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="widget">
                        <h5>Lokasi</h5>
                        
                        <p>{{$lokasi->lokasi}}</p>  
                        
                    </div>
                    </div>
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="widget">
                        <h5>Ikuti Kami</h5>
                        <ul class="company-social">
                                <li class="social-facebook"><a href="www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-twitter"><a href="{{$tw->link}}"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-vimeo"><a href="{{$yt->link}}"><i class="fa fa-youtube"></i></a></li>
                                <li class="social-dribble"><a href="{{$ig->link}}"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                        
                    </div>
                    </div>
                </div>
            </div>  
        </div>
        <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="text-left">
                    <p>&copy;Created By - Nopi Latipah.</p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="wow fadeInRight" data-wow-delay="0.1s">
                    <div class="text-right">
                        <div class="credits">
                            <!-- 
                                All the links in the footer should remain intact. 
                                You can delete the links only if you purchased the pro version.
                                Licensing information: https://bootstrapmade.com/license/
                                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Medicio
                            -->
                            <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>  
        </div>
        </div>
    </footer>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

    <!-- Core JavaScript Files -->
    <script src="{{ asset('Frontend/Medicio/js/jquery.min.js') }}"></script>     
    <script src="{{ asset('Frontend/Medicio/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Frontend/Medicio/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('Frontend/Medicio/js/wow.min.js') }}"></script>
    <script src="{{ asset('Frontend/Medicio/js/jquery.scrollTo.js') }}"></script>
    <script src="{{ asset('Frontend/Medicio/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('Frontend/Medicio/js/stellar.js') }}"></script>
    <script src="{{ asset('Frontend/Medicio/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js') }}"></script>
    <script src="{{ asset('Frontend/Medicio/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('Frontend/Medicio/js/nivo-lightbox.min.js') }}"></script>
    <script src="{{ asset('Frontend/Medicio/js/custom.js') }}"></script>
    
</body>

</html>
