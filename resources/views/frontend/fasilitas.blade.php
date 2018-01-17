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
                    <li class="active"><a href="{{url('/fasilitas')}}">Fasilitas</a></li>
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

    <section id="doctor" class="home-section paddingbot-60">
        <div class="container marginbot-50">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="section-heading text-center">
                    <h2 class="h-bold">Fasilitas {{$komponen->nama_sekolah}}</h2>
                    <p>Fasilitas Yang Disediakan Sekolah</p>
                    </div>
                    </div>
                    <div class="divider-short"></div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                <a href="{{url('fasilitas')}}" class="btn btn-skin">Semua</a>
                @php
                $kategori = App\KategoriFasilitas::all();
                @endphp
                @foreach($kategori as $data)
                <a href="{{url('fasilitas',$data->id)}}" class="btn btn-skin">{{$data->nama}}</a>
                @endforeach
                <br><br>

                @if($fasilitas->count() == 0)
                <b><i>Fasilitas Belum Tersedia</i></b>
                @endif
                
                @if($fasilitas->count() > 0)
                
                <div id="grid-container" class="cbp-l-grid-team">
                <ul>
                    @foreach($fasilitas as $data)
                    <li class="cbp-item psychiatrist">
                        <a href="" class="cbp-caption cbp-singlePage">
                            <div class="cbp-caption-defaultWrap">
                                <img src="{{asset('img/'.$data->foto)}}" alt="" width="100%">
                            </div>
                            
                        </a>
                        <a href="" class="cbp-singlePage cbp-l-grid-team-name">{{$data->judul}}</a>
                    </li>
                    @endforeach
                </ul>
                </div>

                @endif

                
                </div>

                </div>
            </div>
        </div>

    </section>
@endsection