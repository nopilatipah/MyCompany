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
    
    <!-- =======================================================
        Theme Name: Medicio
        Theme URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
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


<div id="wrapper">
    
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="top-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                    <p class="bold text-left">SMK ASSALAAM BANDUNG</p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <p class="bold text-right"><b>C</b>OMPANY <b>P</b>ROFILE</p>
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
                    <img src="{{ asset('Frontend/Medicio/img/logo.png') }}" alt="" width="150" height="40" />
                </a>
            </div>

            @yield('navbar')
        </div>
        <!-- /.container -->
    </nav>
    
    @yield('content') 

    <footer>
    
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="widget">
                        <h5>About Medicio</h5>
                        <p>
                        Lorem ipsum dolor sit amet, ne nam purto nihil impetus, an facilisi accommodare sea
                        </p>
                    </div>
                    </div>
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Laboratory</a></li>
                            <li><a href="#">Medical treatment</a></li>
                            <li><a href="#">Terms & conditions</a></li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="widget">
                        <h5>Medicio center</h5>
                        <p>
                        Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc sit amet.
                        </p>
                        <ul>
                            <li>
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
                                </span> Monday - Saturday, 8am to 10pm
                            </li>
                            <li>
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                </span> +62 0888 904 711
                            </li>
                            <li>
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                                </span> hello@medicio.com
                            </li>

                        </ul>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="widget">
                        <h5>Our location</h5>
                        <p>The Suithouse V303, Kuningan City, Jakarta Indonesia 12940</p>       
                        
                    </div>
                    </div>
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="widget">
                        <h5>Follow us</h5>
                        <ul class="company-social">
                                <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                                <li class="social-dribble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
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
