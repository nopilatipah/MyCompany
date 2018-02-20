@php
$komponen = App\Komponen::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#333">
    <title>{{$komponen->nama_sekolah}}</title>
    <meta name="description" content="Material Style Theme">
    <link rel="shortcut icon" href="{{asset('img/'.$komponen->logo)}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset('new/themes/material-style/2.0.4/assets/css/preload.min.css')}}">
    <link rel="stylesheet" href="{{asset('zmdi/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('new/themes/material-style/2.0.4/assets/css/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('new/themes/material-style/2.0.4/assets/css/style.light-blue-500.min.css')}}">
    <link rel="stylesheet" href="{{asset('new/themes/material-style/2.0.4/assets/css/width-boxed.min.css')}}" id="ms-boxed" disabled="">

    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  </head>
  <body>

    <!-- <a href="" data-toggle="modal" data-target="#pesan" class="ms-conf-btn ms-configurator-btn btn-circle btn-circle-raised btn-circle-primary animated rubberBand">
      <i class="fa fa-comment"></i>
    </a>

    <div class="modal modal-primary" id="pesan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog animated zoomIn animated-3x" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Kirim Pesan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" method="post" action="{{url('kirimpesan')}}">
                        {{ csrf_field() }}
                        <fieldset class="container">
                          <div class="form-group row">
                            <div class="col-lg-6">
                              <input type="text" name="nama_depan" class="form-control" id="inputName" placeholder="Nama Depan" required=""> </div>
                              <div class="col-lg-6">
                              <input type="text" name="nama_belakang" class="form-control" id="inputName" placeholder="Nama Belakang" required=""> </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-12">
                              <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Alamat Email" required=""> </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-12">
                              <input type="text" name="subjek" class="form-control" id="inputSubject" placeholder="Subjek" required=""> </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-lg-12">
                              <textarea class="form-control" name="pesan" rows="3" id="textArea" placeholder="Pesan Anda..." required=""></textarea>
                            </div>
                          </div>
                        </fieldset>
                      
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-royal">Kirim</button>
                </div>
                </form>
                        
            </div>
        </div>
    </div> -->
    
    <div id="ms-preload" class="ms-preload">
      <div id="status">
        <div class="spinner">
          <div class="dot1"></div>
          <div class="dot2"></div>
        </div>
      </div>
    </div>
    <div class="ms-site-container">
      
      <header class="ms-header ms-header-primary">
        <!--ms-header-primary-->
        <div class="container container-full">
          <div class="ms-title">
            <a href="index.html">
              <!-- <img src="assets/img/demo/logo-header.png" alt=""> -->
              <img src="{{asset('img/logo-1.png')}}" height="80px">
              <h1 class="animated fadeInRight animation-delay-6">
                <span> {{$komponen->nama_sekolah}}</span>
              </h1>
            </a>
          </div>
          
        </div>
      </header>
      <nav class="navbar navbar-expand-md  navbar-static ms-navbar ms-navbar-primary">
        <div class="container container-full">
          <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
              <!-- <img src="assets/img/demo/logo-navbar.png" alt=""> -->
              <img src="{{asset('img/logo-1.png')}}" height="40px">
              <span class="ms-title">
                <strong>{{$komponen->nama_sekolah}}</strong>
              </span>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="ms-navbar">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a href="{{url('/')}}" class="nav-link dropdown-toggle animated fadeIn animation-delay-8">Beranda
                </a>
              </li>
              <li class="nav-item dropdown">
                <a href="{{url('/profil')}}" class="nav-link dropdown-toggle animated fadeIn animation-delay-8">Profil
                </a>
              </li>
              <li class="nav-item dropdown">
                <a href="{{url('/fasilitas')}}" class="nav-link dropdown-toggle animated fadeIn animation-delay-8">Fasilitas
                </a>
              </li>
              <li class="nav-item dropdown">
                <a href="{{url('/ekstrakurikuler')}}" class="nav-link dropdown-toggle animated fadeIn animation-delay-8">Ekstrakurikuler
                </a>
              </li>
              
              <li class="nav-item dropdown">
                <a href="{{url('/berita')}}" class="nav-link dropdown-toggle animated fadeIn animation-delay-8">Berita
                </a>
              </li>
              
            </ul>
          </div>
          
        </div>
        <!-- container -->
      </nav>
      
      @include('sweet::alert')
      @yield('content')
      
      @php
      $info = App\Info::find(1);
      $vendor = App\Vendor::find(1);
      $agenda = App\Agenda::all()->take(3);
      $fb = App\Kontak::find(1);
      $tw = App\Kontak::find(2);
      $fx = App\Kontak::find(3);
      $yt = App\Kontak::find(4);
      $ig = App\Kontak::find(5);
      $wa = App\Kontak::find(6);
      $em = App\Kontak::find(7);
      $tlp = App\Kontak::find(8);
      @endphp
      <aside class="ms-footbar">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 ms-footer-col">
              <div class="ms-footbar-block">
                <h3 class="ms-footbar-title">Pendaftaran</h3>
                <i class="zmdi zmdi-tag"></i> &nbsp Tanggal : {{$info->tgl_daftar}}
                <br>
                <i class="zmdi zmdi-tag"></i> &nbsp Waktu : {{$info->waktu}}
                <br>
                <i class="zmdi zmdi-tag"></i> &nbsp Lokasi : {{$info->lokasi}}
                <br>
                <i class="zmdi zmdi-tag"></i> &nbsp Persyaratan :
                <br>
                <i class="zmdi zmdi-star"></i> {{$info->syarat}}
              </div>
              <div class="ms-footbar-block">
                <h3 class="ms-footbar-title">Alamat</h3>
                <p class="">{{$vendor->lokasi}}</p>
                <p>
                    <i class="color-info-light zmdi zmdi-email mr-1"></i>
                    <a href="mailto:joe@example.com">{{$em->kontak}}</a>
                  </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 ms-footer-col ms-footer-alt-color">
              <div class="ms-footbar-block">
                <h3 class="ms-footbar-title text-center mb-2">Agenda Kegiatan</h3>
                <div class="ms-footer-media">
                  <center>
                  @foreach($agenda as $data)
                  <div class="media">
                    <div class="media-body">
                      <h4 class="media-heading">
                        <a href="">{{$data->kegiatan}}</a>
                      </h4>
                      <div class="media-footer">
                        <span>
                          <i class="zmdi zmdi-time color-info-light"></i> {{$data->tanggal}}</span>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  </center>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 ms-footer-col ms-footer-text-right">
              <div class="ms-footbar-block">
                <div class="ms-footbar-title">
                  <h3 class="no-m ms-site-title">
                    <span>{{$komponen->nama_sekolah}}</span>
                  </h3>
                </div>
                <address class="no-mb">
                  <p>
                    <i class="color-royal-light zmdi zmdi-phone mr-1"></i>{{$tlp->kontak}} </p>
                  <p>
                    <i class="color-success-light fa fa-whatsapp mr-1"></i>{{$wa->kontak}} </p>
                </address>
              </div>
              <div class="ms-footbar-block">
                <h3 class="ms-footbar-title">Media Sosial</h3>
                <div class="ms-footbar-social">
                  <a href="javascript:void(0)" class="btn-circle btn-facebook">
                    <i class="zmdi zmdi-facebook"></i>
                  </a>
                  <a href="javascript:void(0)" class="btn-circle btn-twitter">
                    <i class="zmdi zmdi-twitter"></i>
                  </a>
                  <a href="javascript:void(0)" class="btn-circle btn-youtube">
                    <i class="zmdi zmdi-youtube-play"></i>
                  </a>
                  <a target="_blank" href="{{$ig->link}}" class="btn-circle btn-instagram">
                    <i class="zmdi zmdi-instagram"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </aside>
      <footer class="ms-footer">
        <div class="container">
          <p>Copyright &copy; Material Style 2017</p>
        </div>
      </footer>
      <div class="btn-back-top">
        <a href="#" data-scroll id="back-top" class="btn-circle btn-circle-primary btn-circle-sm btn-circle-raised ">
          <i class="zmdi zmdi-long-arrow-up"></i>
        </a>
      </div>
    </div>
    <!-- ms-site-container -->
    <div class="ms-slidebar sb-slidebar sb-left sb-style-overlay" id="ms-slidebar">
      <div class="sb-slidebar-container">
        <header class="ms-slidebar-header">
          <div class="ms-slidebar-login">
            <a href="javascript:void(0)" class="withripple">
              <i class="zmdi zmdi-account"></i> Login</a>
            <a href="javascript:void(0)" class="withripple">
              <i class="zmdi zmdi-account-add"></i> Register</a>
          </div>
          <div class="ms-slidebar-title">
            <form class="search-form">
              <input id="search-box-slidebar" type="text" class="search-input" placeholder="Search..." name="q" />
              <label for="search-box-slidebar">
                <i class="zmdi zmdi-search"></i>
              </label>
            </form>
            <div class="ms-slidebar-t">
              <span class="ms-logo ms-logo-sm">M</span>
              <h3>Material
                <span>Style</span>
              </h3>
            </div>
          </div>
        </header>
        <ul class="ms-slidebar-menu" id="slidebar-menu" role="tablist" aria-multiselectable="true">
          <li class="card" role="tab" id="sch1">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#slidebar-menu" href="#sc1" aria-expanded="false" aria-controls="sc1">
              <i class="zmdi zmdi-home"></i> Home </a>
            <ul id="sc1" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch1">
              <li>
                <a href="index.html">Default Home</a>
              </li>
              <li>
                <a href="home-generic-2.html">Home Black Slider</a>
              </li>
              <li>
                <a href="home-landing.html">Home Landing Intro</a>
              </li>
              <li>
                <a href="home-landing3.html">Home Landing Video</a>
              </li>
              <li>
                <a href="home-shop.html">Home Shop 1</a>
              </li>
            </ul>
          </li>
          <li class="card" role="tab" id="sch2">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#slidebar-menu" href="#sc2" aria-expanded="false" aria-controls="sc2">
              <i class="zmdi zmdi-desktop-mac"></i> Pages </a>
            <ul id="sc2" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch2">
              <li>
                <a href="page-about.html">About US</a>
              </li>
              <li>
                <a href="page-team.html">Our Team</a>
              </li>
              <li>
                <a href="page-product.html">Products</a>
              </li>
              <li>
                <a href="page-services.html">Services</a>
              </li>
              <li>
                <a href="page-faq.html">FAQ</a>
              </li>
              <li>
                <a href="page-timeline_left.html">Timeline</a>
              </li>
              <li>
                <a href="page-contact.html">Contact Option</a>
              </li>
              <li>
                <a href="page-login.html">Login</a>
              </li>
              <li>
                <a href="page-pricing.html">Pricing</a>
              </li>
              <li>
                <a href="page-coming.html">Coming Soon</a>
              </li>
            </ul>
          </li>
          <li class="card" role="tab" id="sch4">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#slidebar-menu" href="#sc4" aria-expanded="false" aria-controls="sc4">
              <i class="zmdi zmdi-edit"></i> Blog </a>
            <ul id="sc4" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch4">
              <li>
                <a href="blog-sidebar.html">Blog Sidebar 1</a>
              </li>
              <li>
                <a href="blog-sidebar2.html">Blog Sidebar 2</a>
              </li>
              <li>
                <a href="blog-masonry.html">Blog Masonry 1</a>
              </li>
              <li>
                <a href="blog-masonry2.html">Blog Masonry 2</a>
              </li>
              <li>
                <a href="blog-full.html">Blog Full Page 1</a>
              </li>
              <li>
                <a href="blog-full2.html">Blog Full Page 2</a>
              </li>
              <li>
                <a href="blog-post.html">Blog Post 1</a>
              </li>
              <li>
                <a href="blog-post2.html">Blog Post 2</a>
              </li>
            </ul>
          </li>
          <li class="card" role="tab" id="sch5">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#slidebar-menu" href="#sc5" aria-expanded="false" aria-controls="sc5">
              <i class="zmdi zmdi-shopping-basket"></i> E-Commerce </a>
            <ul id="sc5" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch5">
              <li>
                <a href="ecommerce-filters.html">E-Commerce Sidebar</a>
              </li>
              <li>
                <a href="ecommerce-filters-full.html">E-Commerce Sidebar Full</a>
              </li>
              <li>
                <a href="ecommerce-filters-full2.html">E-Commerce Topbar Full</a>
              </li>
              <li>
                <a href="ecommerce-item.html">E-Commerce Item</a>
              </li>
              <li>
                <a href="ecommerce-cart.html">E-Commerce Cart</a>
              </li>
            </ul>
          </li>
          <li class="card" role="tab" id="sch6">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#slidebar-menu" href="#sc6" aria-expanded="false" aria-controls="sc6">
              <i class="zmdi zmdi-collection-image-o"></i> Portfolio </a>
            <ul id="sc6" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch6">
              <li>
                <a href="portfolio-filters_sidebar.html">Portfolio Sidebar Filters</a>
              </li>
              <li>
                <a href="portfolio-filters_topbar.html">Portfolio Topbar Filters</a>
              </li>
              <li>
                <a href="portfolio-filters_sidebar_fluid.html">Portfolio Sidebar Fluid</a>
              </li>
              <li>
                <a href="portfolio-filters_topbar_fluid.html">Portfolio Topbar Fluid</a>
              </li>
              <li>
                <a href="portfolio-cards.html">Porfolio Cards</a>
              </li>
              <li>
                <a href="portfolio-masonry.html">Porfolio Masonry</a>
              </li>
              <li>
                <a href="portfolio-item.html">Portfolio Item 1</a>
              </li>
              <li>
                <a href="portfolio-item2.html">Portfolio Item 2</a>
              </li>
            </ul>
          </li>
          <li>
            <a class="link" href="component-typography.html">
              <i class="zmdi zmdi-view-compact"></i> UI Elements</a>
          </li>
          <li>
            <a class="link" href="page-all.html">
              <i class="zmdi zmdi-link"></i> All Pages</a>
          </li>
        </ul>
        <div class="ms-slidebar-social ms-slidebar-block">
          <h4 class="ms-slidebar-block-title">Social Links</h4>
          <div class="ms-slidebar-social">
            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-facebook">
              <i class="zmdi zmdi-facebook"></i>
              <span class="badge-pill badge-pill-pink">12</span>
              <div class="ripple-container"></div>
            </a>
            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-twitter">
              <i class="zmdi zmdi-twitter"></i>
              <span class="badge-pill badge-pill-pink">4</span>
              <div class="ripple-container"></div>
            </a>
            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-google">
              <i class="zmdi zmdi-google"></i>
              <div class="ripple-container"></div>
            </a>
            <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-instagram">
              <i class="zmdi zmdi-instagram"></i>
              <div class="ripple-container"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <script src="{{asset('new/themes/material-style/2.0.4/assets/js/plugins.min.js')}}"></script>
    <script src="{{asset('new/themes/material-style/2.0.4/assets/js/app.min.js')}}"></script>
    <script src="{{asset('new/themes/material-style/2.0.4/assets/js/configurator.min.js')}}"></script>
    <script src="{{asset('new/themes/material-style/2.0.4/assets/js/component-carousels.js')}}"></script>
    <script>
      (function(i, s, o, g, r, a, m)
      {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function()
        {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
      })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-90917746-2', 'auto');
      ga('send', 'pageview');
    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5a7ecacd4b401e45400cd5bc/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    @stack('js')
  </body>
</html>