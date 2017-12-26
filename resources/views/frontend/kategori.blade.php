@extends('layouts.user')

@section('navbar')
			<!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
              <ul class="nav navbar-nav">
                <li><a href="{{url('/')}}">Beranda</a></li>
                <li class="dropdown">
                  <a href="" class="dropdown-toggle" data-toggle="dropdown">Sekolah <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{url('/profil')}}">Profil Umum</a></li>
                    <li><a href="{{url('/kejuruan')}}">Kejuruan</a></li>
                    <li><a href="{{url('/fasilitas')}}">Fasilitas</a></li>
                    <li><a href="{{url('/ekstrakurikuler')}}">Ekstrakurikuler</a></li>
                  </ul>
                </li>
                <li class="active"><a href="{{url('/berita')}}">Berita</a></li>
                <li><a href="{{url('/galeri')}}">Galeri</a></li>
                <li><a href="{{url('/kontak')}}">Kontak</a></li>
                
              </ul>
            </div>
            <!-- /.navbar-collapse -->

<style type="text/css">
.panel.sidebar-menu h3 {
  padding: 5px 0;
  margin: 0;
}
.panel.sidebar-menu {
  background: #fff;
  margin: 0 0 20px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.panel.sidebar-menu .panel-heading {
  text-transform: uppercase;
  margin-bottom: 10px;
  background: none;
  padding: 0;
  letter-spacing: 0.08em;
  border-bottom: none;
}
.panel.sidebar-menu .panel-heading h1,
.panel.sidebar-menu .panel-heading h2,
.panel.sidebar-menu .panel-heading h3,
.panel.sidebar-menu .panel-heading h4,
.panel.sidebar-menu .panel-heading h5 {
  display: inline-block;
  border-bottom: solid 5px #38a7bb;
  line-height: 1.1;
  margin-bottom: 0;
  padding-bottom: 10px;
}
.panel.sidebar-menu .panel-heading .btn.btn-danger {
  color: #fff;
  margin-top: 5px;
}
.panel.sidebar-menu .panel-body {
  padding: 0;
}
.panel.sidebar-menu .panel-body span.colour {
  display: inline-block;
  width: 15px;
  height: 15px;
  border: solid 1px #555555;
  vertical-align: top;
  margin-top: 2px;
  margin-left: 5px;
}
.panel.sidebar-menu .panel-body span.colour.white {
  background: #fff;
}
.panel.sidebar-menu .panel-body span.colour.red {
  background: red;
}
.panel.sidebar-menu .panel-body span.colour.green {
  background: green;
}
.panel.sidebar-menu .panel-body span.colour.blue {
  background: blue;
}
.panel.sidebar-menu .panel-body span.colour.yellow {
  background: yellow;
}
.panel.sidebar-menu .panel-body label {
  color: #999999;
  font-size: 12px;
}
.panel.sidebar-menu .panel-body label:hover {
  color: #555555;
}
.panel.sidebar-menu ul.nav.category-menu {
  margin-bottom: 20px;
  text-transform: uppercase;
  font-weight: 700;
  letter-spacing: 0.08em;
}
.panel.sidebar-menu ul.nav.category-menu li a {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
}
.panel.sidebar-menu ul.nav ul {
  list-style: none;
  padding-left: 0;
}
.panel.sidebar-menu ul.nav ul li {
  display: block;
}
.panel.sidebar-menu ul.nav ul li a {
  position: relative;
  font-family: "Times New Roman", Times, serif;
  font-weight: normal;
  text-transform: none !important;
  display: block;
  padding: 10px 15px;
  padding-left: 30px;
  font-size: 12px;
  color: #999999;
}
.panel.sidebar-menu ul.nav ul li a:hover,
.panel.sidebar-menu ul.nav ul li a:focus {
  text-decoration: none;
  background-color: #eeeeee;
}
.panel.sidebar-menu ul.tag-cloud {
  list-style: none;
  padding-left: 0;
}
.panel.sidebar-menu ul.tag-cloud li {
  display: inline-block;
}
.panel.sidebar-menu ul.tag-cloud li a {
  display: inline-block;
  padding: 5px;
  border: solid 1px #eeeeee;
  border-radius: 0;
  color: #38a7bb;
  margin: 5px 5px 5px 0;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  font-weight: 700;
  font-size: 12px;
}
.panel.sidebar-menu ul.tag-cloud li a:hover {
  color: #38a7bb;
  text-decoration: none;
  border-color: #38a7bb;
}
.panel.sidebar-menu ul.popular,
.panel.sidebar-menu ul.recent {
  list-style: none;
  padding-left: 0;
  padding: 20px 0;
}
.panel.sidebar-menu ul.popular li,
.panel.sidebar-menu ul.recent li {
  margin-bottom: 10px;
  padding: 5px 0;
  border-bottom: dotted 1px #eeeeee;
}
.panel.sidebar-menu ul.popular li:before,
.panel.sidebar-menu ul.recent li:before,
.panel.sidebar-menu ul.popular li:after,
.panel.sidebar-menu ul.recent li:after {
  content: " ";
  display: table;
}
.panel.sidebar-menu ul.popular li:after,
.panel.sidebar-menu ul.recent li:after {
  clear: both;
}
.panel.sidebar-menu ul.popular li:before,
.panel.sidebar-menu ul.recent li:before,
.panel.sidebar-menu ul.popular li:after,
.panel.sidebar-menu ul.recent li:after {
  content: " ";
  display: table;
}
.panel.sidebar-menu ul.popular li:after,
.panel.sidebar-menu ul.recent li:after {
  clear: both;
}
.panel.sidebar-menu ul.popular li img,
.panel.sidebar-menu ul.recent li img {
  width: 50px;
  margin-right: 10px;
}
.panel.sidebar-menu ul.popular li h5,
.panel.sidebar-menu ul.recent li h5 {
  margin: 0 0 10px;
}
.panel.sidebar-menu ul.popular li h5 a,
.panel.sidebar-menu ul.recent li h5 a {
  font-weight: normal;
}
.panel.sidebar-menu ul.popular li p.date,
.panel.sidebar-menu ul.recent li p.date {
  float: right;
  font-size: 12px;
  color: #999999;
}
.panel.sidebar-menu ul.popular li:last-child,
.panel.sidebar-menu ul.recent li:last-child {
  border-bottom: none;
}
.panel.sidebar-menu .text-widget {
  font-size: 12px;
}
.panel.sidebar-menu.with-icons ul.nav li a:after {
  font-family: 'FontAwesome';
  content: "\f105";
  position: relative;
  top: 0;
  float: right;
}
.panel {
  margin-bottom: 20px;
  background-color: #ffffff;
  border: 1px solid transparent;
  border-radius: 0;
  -webkit-box-shadow: 0 0 0;
  box-shadow: 0 0 0;
}
.panel-heading {
  border-top-right-radius: 0;
  border-top-left-radius: 0;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  padding: 15px 15px;
}
.panel-primary .panel-title {
  font-weight: 300;
}
.panel-primary .panel-title a:hover {
  color: #fff;
  text-decoration: none;
}
.nav-pills > li {
  float: left;
}
.nav-pills > li > a {
  border-radius: 0;
}
.nav-pills > li + li {
  margin-left: 2px;
}
.nav-pills > li.active > a,
.nav-pills > li.active > a:hover,
.nav-pills > li.active > a:focus {
  color: #ffffff;
  background-color: #38a7bb;
}
.nav-stacked > li {
  float: none;
}
.nav-stacked > li + li {
  margin-top: 2px;
  margin-left: 0;
}
.navbar #search {
  clear: both;
  border-top: solid 1px #38a7bb;
  text-align: right;
}
.navbar #search form {
  float: right;
}
.navbar #search form .input-group {
  width: 500px;
}
@media (max-width: 768px) {
  .navbar #search form .input-group {
    width: 100%;
  }
}
.btn-template-main {
  color: #38a7bb;
  background-color: #ffffff;
  border-color: #38a7bb;
}
.btn-template-main:hover,
.btn-template-main:focus,
.btn-template-main:active,
.btn-template-main.active,
.open > .dropdown-toggle.btn-template-main {
  color: #38a7bb;
  background-color: #e6e6e6;
  border-color: #2a7d8c;
}
.btn-template-main:active,
.btn-template-main.active,
.open > .dropdown-toggle.btn-template-main {
  background-image: none;
}
.btn-template-main.disabled,
.btn-template-main[disabled],
fieldset[disabled] .btn-template-main,
.btn-template-main.disabled:hover,
.btn-template-main[disabled]:hover,
fieldset[disabled] .btn-template-main:hover,
.btn-template-main.disabled:focus,
.btn-template-main[disabled]:focus,
fieldset[disabled] .btn-template-main:focus,
.btn-template-main.disabled:active,
.btn-template-main[disabled]:active,
fieldset[disabled] .btn-template-main:active,
.btn-template-main.disabled.active,
.btn-template-main[disabled].active,
fieldset[disabled] .btn-template-main.active {
  background-color: #ffffff;
  border-color: #38a7bb;
}
.btn-template-main .badge {
  color: #ffffff;
  background-color: #38a7bb;
}
.btn-template-main:hover,
.btn-template-main:focus,
.btn-template-main:active,
.btn-template-main.active {
  background: #38a7bb;
  color: #ffffff;
  border-color: #38a7bb;
}       
</style>

@endsection

@section('content')
<br><br><br><br><br>

        <section id="callaction" class="home-section paddingtop-40">    
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                    @if($jml == 0)
                    <div class="callaction bg-gray">
                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                      <div class="cta-text">
                        <h5><span class="fa fa-search"></span>&nbsp&nbsp&nbsp<b><i>Artikel Dengan Kategori "{{$kateg->nama}}" Tidak Tersedia</i></b></h5>
                      </div>
                    </div>
                    </div><br>
                    @foreach($bb as $data)
                        <div class="callaction bg-gray">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="cta-text">
                                            <h3>{{$data->judul}}</h3>
                                            <p>
                                                <span class="fa fa-user"></span> {{$data->author}} &nbsp&nbsp&nbsp
                                                <span class="fa fa-calendar"></span> {{$data->tgl_kegiatan}} &nbsp&nbsp&nbsp
                                                <span class="fa fa-eye"></span> {{$data->views}} Pembaca &nbsp&nbsp&nbsp
                                                @php
                                                $komen = App\Komentar::where('artikel_id','=',$data->id)->count();
                                                @endphp
                                                <span class="fa fa-comments"></span> {{$komen}} Komentar &nbsp&nbsp&nbsp
                                                <span class="fa fa-tag"></span> {{$data->kategori}} &nbsp&nbsp&nbsp
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                                    <img src="{{ asset('img/'.$data->foto) }}" class="img-responsive">
                                    </div>
                                    
                                    </div>
                                    <div class="col-md-8">
                                      <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                                        {!! str_limit($data->konten, 250) !!}
                                                
                                      </div>
                                        <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                                            <div class="cta-btn">
                                                <a href="{{ url('/baca-selengkapnya', $data->id) }}" class="btn btn-skin">Baca Selengkapnya</a>  
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <br>
                      @endforeach
                    @endif
                    @if($jml > 0)
                      @foreach($berita as $data)
                        <div class="callaction bg-gray">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="cta-text">
                                            <h3>{{$data->judul}}</h3>
                                            <p>
                                                <span class="fa fa-user"></span> {{$data->author}} &nbsp&nbsp&nbsp
                                                <span class="fa fa-calendar"></span> {{$data->tgl_kegiatan}} &nbsp&nbsp&nbsp
                                                <span class="fa fa-eye"></span> {{$data->views}} Pembaca &nbsp&nbsp&nbsp
                                                @php
                                                $komen = App\Komentar::where('artikel_id','=',$data->id)->count();
                                                @endphp
                                                <span class="fa fa-comments"></span> {{$komen}} Komentar &nbsp&nbsp&nbsp
                                                <span class="fa fa-tag"></span> {{$data->kategori}} &nbsp&nbsp&nbsp
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                                    <img src="{{ asset('img/'.$data->foto) }}" class="img-responsive">
                                    </div>
                                    
                                    </div>
                                    <div class="col-md-8">
                                      <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                                        {!! str_limit($data->konten, 250) !!}
                                                
                                      </div>
                                        <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                                            <div class="cta-btn">
                                                <a href="{{ url('/baca-selengkapnya', $data->id) }}" class="btn btn-skin">Baca Selengkapnya</a>  
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <br>
                      @endforeach
                    
                      
                      {{ $berita->links() }}
                      @endif
                        
                    </div>
                    <div class="col-md-3">

                        <div class="panel panel-default sidebar-menu">
                            <div class="wow fadeInRight" data-wow-delay="0.1s">
                            <div class="panel-heading">
                                <h3 class="panel-title">Terpopuler</h3>
                            </div>
                            </div>
                            @php
                            $populer = App\Artikel::whereRaw('views = (select max(`views`) from artikels)')->first();
                            @endphp
                            <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="panel-body text-widget">
                              <div class="row">
                                <div class="col-md-5">
                                <a href="{{ url('/baca-selengkapnya', $populer->id) }}">
                                  <img src="{{ asset('img/'.$populer->foto) }}" class="img-responsive">

                                </div>
                                <div class="col-md-7">
                                  {{$populer->judul}}</a>
                                </div>
                              </div>                              
                            </div>
                            </div>
                        </div>

                        <div class="panel panel-default sidebar-menu">
                            <div class="wow fadeInRight" data-wow-delay="0.1s">
                            <div class="panel-heading">
                                <h3 class="panel-title">Terbaru</h3>
                            </div>
                            </div>
                            @php
                            $baru = App\Artikel::whereRaw('id = (select max(`id`) from artikels)')->first();
                            @endphp
                            <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="panel-body text-widget">
                               <div class="row">
                                <div class="col-md-5">
                                <a href="{{ url('/baca-selengkapnya', $baru->id) }}">
                                  <img src="{{ asset('img/'.$baru->foto) }}" class="img-responsive">
                                </div>
                                <div class="col-md-7">
                                  {{$baru->judul}}</a>
                                </div>
                              </div>  
                                                             
                            </div>
                            </div>
                        </div>

                        <div class="panel panel-default sidebar-menu">
                            <div class="wow fadeInRight" data-wow-delay="0.1s">
                            <div class="panel-heading">
                                <h3 class="panel-title">Pencarian</h3>
                            </div>
                            </div>
                            <div class="panel-body">
                                {!! Form::open(['url'=>url('/berita'), 'method'=>'post', 'class'=>'form-horizontal']) !!}
                                    <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                                    <div class="input-group">
                                        <input type="text" name="judul" class="form-control" placeholder="Cari Judul Artikel">
                                        <span class="input-group-btn">

                                           <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                        <div class="panel panel-default sidebar-menu">
                            <div class="wow fadeInRight" data-wow-delay="0.1s">
                            <div class="panel-heading">
                                <h3 class="panel-title">Kategori</h3>
                            </div>
                            </div>
                            <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked">
                                    @php
                                    $kategori = App\KategoriArtikel::all();
                                    @endphp
                                    @foreach($kategori as $kat)
                                    @if($kat->id == $kateg->id)
                                    <li class="active"><a href="{{ url('/kategori',$kat->id) }}">{{$kat->nama}}</a>
                                    </li>
                                    @else
                                    <li><a href="{{ url('/kategori',$kat->id) }}">{{$kat->nama}}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                            </div>
                        </div>

                        <div class="panel sidebar-menu">
                            <div class="wow fadeInRight" data-wow-delay="0.1s">
                            <div class="panel-heading">
                                <h3 class="panel-title">Tags</h3>
                            </div>
                            </div>
                            <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="panel-body">
                                <ul class="tag-cloud">
                                    <li><a href="#"><i class="fa fa-tags"></i> html5</a> 
                                    </li>
                                    <li><a href="#"><i class="fa fa-tags"></i> css3</a> 
                                    </li>
                                    <li><a href="#"><i class="fa fa-tags"></i> jquery</a> 
                                    </li>
                                    <li><a href="#"><i class="fa fa-tags"></i> ajax</a> 
                                    </li>
                                    <li><a href="#"><i class="fa fa-tags"></i> php</a> 
                                    </li>
                                    <li><a href="#"><i class="fa fa-tags"></i> responsive</a> 
                                    </li>
                                    <li><a href="#"><i class="fa fa-tags"></i> visio</a> 
                                    </li>
                                    <li><a href="#"><i class="fa fa-tags"></i> bootstrap</a> 
                                    </li>
                                </ul>
                            </div>
                            </div>
                        </div>

                        <!-- *** MENUS AND FILTERS END *** -->

                    </div>
                </div>
            </div>
        </section>
@endsection