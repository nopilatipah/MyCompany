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
                    <li class="active"><a href="{{url('/ekstrakurikuler')}}">Ekstrakurikuler</a></li>
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
                    <h2 class="h-bold">Ekstrakurikuler {{$komponen->nama_sekolah}}</h2>
                    <p>Kegiatan Ekstrakurikuler Yang Disediakan Sekolah</p>
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
                <a href="{{url('ekstrakurikuler')}}" class="btn btn-skin">Semua</a>
                @php
                $kategori = App\KategoriEkskul::all();
                @endphp
                @foreach($kategori as $data)
                <a href="{{url('ekstrakurikuler',$data->id)}}" class="btn btn-skin">{{$data->nama}}</a>
                @endforeach
                <br><br>

                @if($ekskul->count() == 0)
                <b><i>Ekstrakurikuler Belum Tersedia</i></b>
                @endif
                
                @if($ekskul->count() > 0)
                
                <div id="grid-container" class="cbp-l-grid-team">
                <ul>
                    @foreach($ekskul as $data)
                    <li class="cbp-item psychiatrist">
                        <a href="" class="cbp-caption cbp-singlePage">
                            <div class="cbp-caption-defaultWrap">
                                <img src="{{asset('img/'.$data->foto)}}" alt="" width="100%">
                            </div>
                            
                        </a>
                        <a href="" class="cbp-singlePage cbp-l-grid-team-name">{{$data->nama}}</a>
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


    <section id="facilities" class="home-section bg-gray paddingbot-60">
        <div class="container marginbot-50">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="section-heading text-center">
                    <h2 class="h-bold">Prestasi Kami</h2>
                    <p>Prestasi Yang Di Raih Oleh {{$komponen->nama_sekolah}}</p>
                    </div>
                    </div>
                    <div class="divider-short"></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" >
                    <div class="wow bounceInUp" data-wow-delay="0.2s">
                    <div id="owl-works" class="owl-carousel">
                        @foreach($prestasi as $data)
                        <div class="item"><a href="{{asset('img/'.$data->gambar)}}" title="{{$data->judul}}" data-lightbox-gallery="gallery1" data-lightbox-hidpi="{{asset('img/'.$data->gambar)}}"><img src="{{asset('img/'.$data->gambar)}}" class="img-responsive" alt="img"></a></div>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection