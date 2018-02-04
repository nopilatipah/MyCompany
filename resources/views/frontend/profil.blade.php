@extends('layouts.user')

@section('content')
   <div class="ms-hero-page-override ms-hero-img-city ms-hero-bg-primary">
        <div class="container">
          <div class="text-center">
            <h6 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">
              <i><b>
              " Sekolah berkualitas dengan program pembelajaran yang berkualitas, sumber daya pengajar yang berkualitas, dan sarana prasarana yang lengkap dan mutakhir "</i></b>
            </h6>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="card card-hero animated slideInUp animation-delay-8 mb-6">
          <div class="card-block">
            <h2 class="color-primary">Tentang Kami</h2>
            <div class="row">
              <div class="col-lg-12 text-justify">
                <p class="dropcaps">{!!$profil->profil!!}</p>
              </div>
            </div>
            <hr class="dotted">
            
            <div class="row">
              <div class="col-lg-6">
                <img src="{{asset('img/gedung.jpg')}}" width="500px">
              </div>
              <div class="col-lg-6 text-justify">
                <h2 class="color-primary" align="left">Visi Dan Misi</h2>
                <p align="right">{!!$profil->visi!!}</b></p>
                <p class="dropcaps">{!!$profil->misi!!}</p>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="container container-full">
        <h1 class="text-center">
          <span class="badge badge-primary">Sejarah</span>
        </h1>
        <section class="row timeline-center">
          <div class="col-md-6">
            <article class="card card-primary timeline-center-item left wow slideInLeftTiny">
              <header class="card-header">
                <h3 class="card-title">
                  <i class="zmdi zmdi-flag"></i> 02 Mei 2009</h3>
              </header>
              <div class="card-block">
                <h3 class="color-primary">Pendirian SMK Assalaam</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus numquam, voluptatibus tempore sint nesciunt id accusantium corporis ea assumenda iure quos, temporibus accusamus cupiditate eveniet mollitia illum ipsum porro aut.</p>
                <p>Perspiciatis soluta voluptate dolore officiis libero repellat cupiditate explicabo atque facere aliquam.</p>
              </div>
            </article>
            <article class="card card-danger timeline-center-item left wow slideInLeftTiny">
              <header class="card-header">
                <h3 class="card-title"><i class="zmdi zmdi-flag"></i> Tahun 2013</h3>
              </header>
              <img src="assets/img/demo/demo992.jpg" alt="" class="img-fluid">
              <div class="card-block">
                <h3 class="color-danger">Pembukaan Jurusan RPL</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, praesentium, quam! Quia fugiat aperiam.</p>
                <p>Perspiciatis soluta voluptate dolore officiis libero repellat cupiditate explicabo atque facere aliquam.</p>
              </div>
            </article>
          </div>
          <div class="col-md-6">
            <article class="card card-success timeline-center-item right wow fadeInUp">
              <header class="card-header">
                <h3 class="card-title"> <i class="zmdi zmdi-flag"></i> Tahun 2013</h3>
              </header>
              <div class="withripple zoom-img">
                <a href="javascript:void(0);">
                  <img src="assets/img/demo/m1.jpg" alt="" class="img-fluid"> </a>
              </div>
              <div class="card-block">
                <h3 class="color-success">Akreditasi A untuk TKR</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam sed labore autem nesciunt ea veniam recusandae necessitatibus reprehenderit. Praesentium non velit at natus ut dolores iusto totam doloremque perspiciatis. Quidem.</p>
              </div>
            </article>
            <article class="card card-royal timeline-center-item right wow fadeInUp">
              <header class="card-header">
                <h3 class="card-title"><i class="zmdi zmdi-flag"></i> Tahun 2014</h3>
              </header>
              <div class="withripple zoom-img">
                <a href="javascript:void(0);">
                  <img src="assets/img/demo/m1.jpg" alt="" class="img-fluid"> </a>
              </div>
              <div class="card-block">
                <h3 class="color-success">Pembukaan Jurusan TSM</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam sed labore autem nesciunt ea veniam recusandae necessitatibus reprehenderit. Praesentium non velit at natus ut dolores iusto totam doloremque perspiciatis. Quidem.</p>
              </div>
            </article>
          </div>
        </section>
      </div>
      <div class="wrap ms-hero-bg-dark-light ms-hero-img-airplane ms-bg-fixed mb-6 mt-4">
        <div class="container">
          <h2 class="text-center color-white no-mt mb-6 wow fadeInUp">Keunggulan SMK Assalaam</h2>
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
              <div class="ms-icon-feature wow flipInX animation-delay-4">
                <div class="ms-icon-feature-icon">
                  <span class="ms-icon ms-icon-lg ms-icon-inverse ms-icon-white">
                    <i class="fa fa-star"></i>
                  </span>
                </div>
                <div class="ms-icon-feature-content">
                  <h4 class="color-primary">Cloud Computing</h4>
                  <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
              <div class="ms-icon-feature wow flipInX animation-delay-4">
                <div class="ms-icon-feature-icon">
                  <span class="ms-icon ms-icon-lg ms-icon-inverse ms-icon-white">
                    <i class="fa fa-star"></i>
                  </span>
                </div>
                <div class="ms-icon-feature-content">
                  <h4 class="color-primary">Web Design and SEO</h4>
                  <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
              <div class="ms-icon-feature wow flipInX animation-delay-4">
                <div class="ms-icon-feature-icon">
                  <span class="ms-icon ms-icon-lg ms-icon-inverse ms-icon-white">
                    <i class="fa fa-star"></i>
                  </span>
                </div>
                <div class="ms-icon-feature-content">
                  <h4 class="color-primary">Mobile and Tablet Apps</h4>
                  <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
              <div class="ms-icon-feature wow flipInX animation-delay-4">
                <div class="ms-icon-feature-icon">
                  <span class="ms-icon ms-icon-lg ms-icon-inverse ms-icon-white">
                    <i class="fa fa-star"></i>
                  </span>
                </div>
                <div class="ms-icon-feature-content">
                  <h4 class="color-primary">Wordpress Themes</h4>
                  <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
              <div class="ms-icon-feature wow flipInX animation-delay-4">
                <div class="ms-icon-feature-icon">
                  <span class="ms-icon ms-icon-lg ms-icon-inverse ms-icon-white">
                    <i class="fa fa-star"></i>
                  </span>
                </div>
                <div class="ms-icon-feature-content">
                  <h4 class="color-primary">Training and development</h4>
                  <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
              <div class="ms-icon-feature wow flipInX animation-delay-4">
                <div class="ms-icon-feature-icon">
                  <span class="ms-icon ms-icon-lg ms-icon-inverse ms-icon-white">
                    <i class="fa fa-star"></i>
                  </span>
                </div>
                <div class="ms-icon-feature-content">
                  <h4 class="color-primary">Customer service</h4>
                  <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection