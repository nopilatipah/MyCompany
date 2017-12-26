@extends('layouts.user')

@section('navbar')
			<!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('/')}}">Beranda</a></li>
                <li class="dropdown">
                  <a href="" class="dropdown-toggle" data-toggle="dropdown">Sekolah <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{url('/profil')}}">Profil Umum</a></li>
                    <li><a href="{{url('/kejuruan')}}">Kejuruan</a></li>
                    <li><a href="{{url('/fasilitas')}}">Fasilitas</a></li>
                    <li><a href="{{url('/ekstrakurikuler')}}">Ekstrakurikuler</a></li>
                  </ul>
                </li>
                <li><a href="{{url('/berita')}}">Berita</a></li>
                <li><a href="{{url('/galeri')}}">Galeri</a></li>
                <li><a href="{{url('/kontak')}}">Kontak</a></li>
                
              </ul>
            </div>
            <!-- /.navbar-collapse -->
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">

<style type="text/css">
    .testimonial{ margin: 0 20px 50px; }
.testimonial .pic{
    display: inline-block;
    width: 90px;
    height: 90px;
    border-radius: 50%;
    margin: 0 15px 15px 0;
}
.testimonial .pic img{
    width: 100%;
    height: auto;
    border-radius: 50%;
}
.testimonial .testimonial-profile{
    display: inline-block;
    position: relative;
    top: 15px;
}
.testimonial .title{
    display: block;
    font-size: 20px;
    font-weight: 600;
    color: #2f2f2f;
    text-transform: capitalize;
    margin: 0 0 7px 0;
}
.testimonial .post{
    display: block;
    font-size: 14px;
    color: #067182;
}
.testimonial .description{
    padding: 20px 22px;
    background: #12aaaa;
    font-size: 15px;
    color: #fff;
    line-height: 25px;
    margin: 0;
    position: relative;
}
.testimonial .description:before,
.testimonial .description:after{
    content: "";
    border-width: 18px 0 0 18px;
    border-style: solid;
    border-color: #067182 transparent transparent;
    position: absolute;
    bottom: -18px;
    left: 0;
}
.testimonial .description:after{
    border-width: 18px 18px 0 0;
    left: auto;
    right: 0;
}
.owl-theme .owl-controls{
    margin-top: 10px;
    margin-left: 30px;
}
.owl-theme .owl-controls .owl-buttons div{
    opacity: 0.8;
    background: #fff;
}
.owl-prev:before,
.owl-next:before{
    content: "\f053";
    font-family: 'FontAwesome';
    font-size: 20px;
    color: #1f487e;
}
.owl-next:before{ content: "\f054"; }
</style>
    <!-- Section: intro -->
    <section id="intro" class="intro">
        <div class="intro-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="well well-trans">
                    <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                    <h2 class="h-ultra">{{$komponen->nama_sekolah}}</h2>
                    </div>
                    <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                    <h4 class="h-light">{{$komponen->deskripsi}}</h4>
                    </div>
                    </div>
                        <div class="well well-trans">
                        <div class="wow fadeInRight" data-wow-delay="0.1s">

                        <ul class="lead-list">
                            <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Lokasi {{$komponen->nama_sekolah}}</strong><br />{{$lokasi->lokasi}}</span></li>
                            <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Visi {{$komponen->nama_sekolah}}</strong><br />{!!$sambutan->visi!!}</span></li>
                        </ul>
                        <p class="text-right wow bounceIn" data-wow-delay="0.4s">
                        <a href="{{ url('/profil') }}" class="btn btn-skin btn-lg">Pelajari Selengkapnya <i class="fa fa-angle-right"></i></a>
                        </p>
                        </div>
                        </div>


                    </div>
                    <div class="col-lg-6">
                        <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                        <center>
                        <img src="{{ asset('img/'.$komponen->foto_utama) }}" class="img-responsive" alt=""/>
                        </center>
                        </div>
                    </div>                  
                </div>      
            </div>
        </div>      
    </section>
    
    <!-- /Section: intro -->

    <!-- Section: services -->
    <section id="service" class="home-section nopadding paddingtop-60">

        <div class="container">

        <div class="row">
            <div class="col-sm-5">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                <img src="{{ asset('img/'.$sambutan->foto) }}" class="img-responsive" alt="" />
                </div>
            </div>
            <div class="col-sm-7">
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="section-heading">
                    <h2 class="h-bold">Sambutan Kepala Sekolah</h2>
                    </div>
                    <hr>
                    <p align="justify">{!!$sambutan->sambutan!!}</p>
                </div>
            </div>
            
        </div>      
        </div>
    </section>
    <!-- /Section: services -->
    
    
    <!-- Section: testimonial -->
    <section id="testimonial" class="home-section paddingbot-60">
            <div class="container">
                <div class="row">
                    @php
                    $alumni = App\Alumni::all();
                    @endphp
                       
                    <div id="testimonial-slider" class="owl-carousel">
                        @foreach($alumni as $al)
                        <div class="testimonial">
                            <div class="pic">
                                <img src="{{asset('img/'.$al->foto)}}">
                            </div>
                            <div class="testimonial-profile">
                                <h3 class="title">{{$al->nama}}</h3>
                                <span class="post">{{$al->pekerjaan}}</span>
                            </div>
                            <p class="description">
                                {{$al->testimoni}}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>
    <!-- /Section: testimonial -->
    
    <section id="nnn" class="home-section paddingbot-60">   
        <div class="container marginbot-50">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                    <div class="section-heading text-center">
                    <h2 class="h-bold">Kerjasama Perusahaan</h2>
                    <p>Perusahaan Yang Bekerja Sama Dengan SMK Assalaam Bandung</p>
                    </div>
                    </div>
                    <div class="divider-short"></div>
                </div>
            </div>
        </div>
        @php
        $pers = App\Perusahaan::all();
        @endphp
        <div class="container">
            <div class="row">
                <script src="{{asset('ss/js/jssor.slider-26.7.0.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: 1,
              $AutoPlaySteps: 5,
              $SlideDuration: 160,
              $SlideWidth: 200,
              $SlideSpacing: 3,
              $Cols: 5,
              $Align: 390,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 5
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /* jssor slider loading skin spin css */
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }


        .jssorb057 .i {position:absolute;cursor:pointer;}
        .jssorb057 .i .b {fill:none;stroke:#fff;stroke-width:2000;stroke-miterlimit:10;stroke-opacity:0.4;}
        .jssorb057 .i:hover .b {stroke-opacity:.7;}
        .jssorb057 .iav .b {stroke-opacity: 1;}
        .jssorb057 .i.idn {opacity:.3;}

        .jssora073 {display:block;position:absolute;cursor:pointer;}
        .jssora073 .a {fill:#ddd;fill-opacity:.7;stroke:#000;stroke-width:160;stroke-miterlimit:10;stroke-opacity:.7;}
        .jssora073:hover {opacity:.8;}
        .jssora073.jssora073dn {opacity:.4;}
        .jssora073.jssora073ds {opacity:.3;pointer-events:none;}
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1000px;height:150px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="{{asset('ss/img/spin.svg')}}" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:150px;overflow:hidden;">
            @foreach($pers as $per)
            <div data-p="43.75">
                <img data-u="image" src="{{asset('img/'.$per->logo)}}" />
            </div>
            @endforeach
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb057" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5000"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora073" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora073" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z"></path>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
            </div>
        </div>
           
    </section>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:2,
        itemsDesktop:[1000,2],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,1],
        pagination:false,
        navigation:true,
        navigationText:["",""],
        autoPlay:true
    });
});
</script>
@endsection