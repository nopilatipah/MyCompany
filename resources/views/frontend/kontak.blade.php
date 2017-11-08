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
                    <li><a href="{{url('/prestasi')}}">Prestasi</a></li>
                  </ul>
                </li>
                <li><a href="{{url('/berita')}}">Berita</a></li>
                <li><a href="{{url('/galeri')}}">Galeri</a></li>
                <li class="active"><a href="{{url('/kontak')}}">Kontak</a></li>
                
              </ul>
            </div>
            <!-- /.navbar-collapse -->
@endsection
 
@section('content')
<br><br><br><br><br><br>
<section id="callaction" class="home-section paddingtop-40">    
           <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="callaction bg-gray">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="cta-text">
                                    <h3>Hubungi Kami</h3>
                                    <p>Anda dapat mengirim kritik dan saran untuk <b>{{$komponen->nama_sekolah}}</b> Disini. </p>
                                    </div>
                                    </div>
                                </div>
                                {!! Form::open(['url'=>url('/kontak'), 'method'=>'post']) !!}
                                <div class="col-md-4">
                                    <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                                        <div class="cta-btn">
                                        <button class="btn btn-skin btn-lg" type="submit">Kirim Pesan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Nama Depan</label>
                                            <input type="text" name="nama_depan" class="form-control" id="firstname" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">Nama Belakang</label>
                                            <input type="text" name="nama_belakang" class="form-control" id="lastname">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control" id="email" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="subject">Subjek</label>
                                            <input type="text" name="subjek" class="form-control" id="subject" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="message">Pesan</label>
                                            <textarea id="message" name="pesan" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
    </section>

@endsection