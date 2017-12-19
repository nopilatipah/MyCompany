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
</head>
<body>
	<section id="service" class="home-section nopadding paddingtop-60">

        <div class="container">

        <div class="row">
            <div class="col-sm-5">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                <img src="{{ asset('img/'.$kejuruan->siswa) }}" class="img-responsive" alt="" />
                </div>
            </div>
            <div class="col-sm-7">
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="section-heading">
                    <h2 class="h-bold">{{$kejuruan->nama}}</h2>
                    </div>
                    <hr>
                    <p align="justify">{!!$kejuruan->profil!!}</p>
                </div>
            </div>
            
        </div>      
        </div>
    </section>

    <section id="service" class="home-section nopadding paddingtop-60">

        <div class="container">
        <div class="row">
        	<h2 class="h-bold">&nbsp Program Keahlian</h2>
        </div>
        <div class="row">
       
            <div class="col-sm-7">
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    
                    <p align="justify">{!!$kejuruan->program!!}</p>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                <img src="{{ asset('img/'.$kejuruan->ruangan) }}" class="img-responsive" alt="" />
                </div>
            </div>
            
        </div>      
        </div>
        <br><br>
    </section>

    <section id="testimonial" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">
        <div class="carousel-reviews broun-block">
            <div class="container">
                <div class="row">
                    <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
                    
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-md-4 col-sm-6">
                                    <div class="block-text rel zmin">
                                        <a title="" href="#">Emergency Contraception</a>
                                        
                                        <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                        <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                    </div>
                                    <div class="person-text rel text-light">                    
                                        <img src="{{ asset('/Frontend/Medicio/img/testimonials/1.jpg') }}" alt="" class="person img-circle" />
                                        <a title="" href="#">Anna</a>
                                        <span>Chicago, Illinois</span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="block-text rel zmin">
                                        <a title="" href="#">Emergency Contraception</a>
                                        
                                        <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                        <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                    </div>
                                    <div class="person-text rel text-light">                    
                                        <img src="{{ asset('/Frontend/Medicio/img/testimonials/1.jpg') }}" alt="" class="person img-circle" />
                                        <a title="" href="#">Anna</a>
                                        <span>Chicago, Illinois</span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="block-text rel zmin">
                                        <a title="" href="#">Emergency Contraception</a>
                                        
                                        <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                        <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                    </div>
                                    <div class="person-text rel text-light">                    
                                        <img src="{{ asset('/Frontend/Medicio/img/testimonials/1.jpg') }}" alt="" class="person img-circle" />
                                        <a title="" href="#">Anna</a>
                                        <span>Chicago, Illinois</span>
                                    </div>
                                </div>
                                
                            </div>
                            
                           
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="service" class="home-section nopadding paddingtop-60">

        <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="section-heading">
                    <h2 class="h-bold">Perusahaan Yang Bekerjasama</h2>
                    </div>
                    <hr>
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
	                <img src="{{ asset('img/'.$kejuruan->siswa) }}" class="img-responsive" style="width: 200px; height: 200px;" alt="" />
	                </div>
	            </div>
            </div>
            
        </div>      
        </div>
        <br><br>
    </section>
</body>
</html>
