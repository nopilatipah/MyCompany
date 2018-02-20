@extends('layouts.user')

@section('content')
<style type="text/css">
  .video{
    position: relative;
    padding-bottom: 50%;
  }
  .video iframe {
    position: absolute;
    width: 100%;
    height: 100%;
  }
  .image{
    position: relative;
    padding-bottom: 50%;
  }
  .image img {
    position: absolute;
    width: 100%;
    height: 100%;
  }
</style>
<div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="card animated fadeInLeftTiny animation-delay-5">
              <div class="card-block card-block-big">
                <h1 class="no-mt">{{$berita->judul}}</h1>
                <div class="mb-4">
                  <img src="{{asset('img/default.png')}}" alt="..." class="img-circle mr-1" width="50px"> Oleh
                  <a href="javascript:void(0)">{{$berita->author}}</a> Kategori
                  @php
                  $kat = App\KategoriArtikel::where('id','=',$berita->kategori_id)->first();
                  @endphp
                  <a href="javascript:void(0)" class="ms-tag ms-tag-info">{{$kat->nama}}</a>
                  <span class="ml-1 d-none d-sm-inline">
                    <i class="zmdi zmdi-time mr-05 color-info"></i>
                    <span class="color-medium-dark">{{$berita->created_at->diffForHumans()}}</span>
                  </span>
                  <span class="ml-1">
                    <i class="zmdi zmdi-comments color-royal mr-05"></i> 25</span>
                </div>
                <div class="image">
                <img src="{{asset('img/'.$berita->foto)}}" alt="">
                </div>
                <p align="justify">{!!$berita->konten!!}</p>
              </div>
            </div>
            <div class="card animated fadeInLeftTiny animation-delay-5">
              <div class="col-lg-12">
          <div id="disqus_thread"></div>
          </div>
        </div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://company-profile-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
          </div>
          <div class="col-lg-4">
            <div class="card card-warning animated fadeInUp animation-delay-7">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="zmdi zmdi-search"></i> Cari Artikel</h3>
              </div>
              <div class="card-block">
                {!! Form::open(['url'=>url('/berita'), 'method'=>'post', 'class'=>'form-horizontal']) !!}
                  <fieldset class="container">
                          <div class="form-group row">
                            <div class="col-lg-8">
                              <input type="text" name="judul" class="form-control" id="inputName" placeholder="Judul Artikel" required=""> 
                            </div>
                            <div class="col-lg-2">
                              <button type="submit" class="btn btn-warning btn-raised">Cari</button>
                            </div>
                          </div>
                  </fieldset>
                {!! Form::close() !!}
              </div>
            </div>
            <div class="card animated fadeInUp animation-delay-7">
              <div class="card-tabs">
                <ul class="nav nav-tabs nav-tabs-full nav-tabs-3 shadow-2dp" role="tablist">
                  <li class="nav-item">
                    <a href="#favorite" aria-controls="favorite" role="tab" data-toggle="tab" class="nav-link withoutripple active">
                      <i class="no-mr zmdi zmdi-star"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#categories" aria-controls="categories" role="tab" data-toggle="tab" class="nav-link withoutripple">
                      <i class="no-mr zmdi zmdi-folder"></i>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a href="#tags" aria-controls="tags" role="tab" data-toggle="tab" class="nav-link withoutripple">
                      <i class="no-mr zmdi zmdi-tag-more"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active show" id="favorite">
                  <div class="card-block">
                    <div class="ms-media-list">
                      @php
                      $populer = App\Artikel::whereRaw('views = (select max(`views`) from artikels)')->first();
                      $kkk = App\KategoriArtikel::find($populer->kategori_id);
                      @endphp
                      <div class="media mb-2">
                        <div class="media-left media-middle">
                          <a href="{{url('/baca-selengkapnya/'.$populer->id)}}">
                            <img class="d-flex mr-3 media-object media-object-circle" src="{{asset('img/'.$populer->foto)}}" alt="..."> </a>
                        </div>
                        <div class="media-body">
                          <a href="{{url('/baca-selengkapnya/'.$populer->id)}}" class="media-heading">{{$populer->judul}}</a>
                          <div class="media-footer text-small">
                            <span class="mr-1">
                              <i class="zmdi zmdi-time color-info mr-05"></i> {{date('d M Y', strtotime($populer->created_at))}}</span>
                            <span>
                              <i class="zmdi zmdi-folder-outline color-success mr-05"></i>
                              <a href="{{url('kategori',$kkk->id)}}">{{$kkk->nama}}</a>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="categories">
                  <div class="list-group">
                    @php
                    $kategori = App\KategoriArtikel::all();
                    @endphp
                    @foreach($kategori as $data)
                    @php
                    $jml = App\Artikel::where('kategori_id','=',$data->id)->count();
                    @endphp
                    <a href="{{url('kategori',$data->id)}}" class="list-group-item list-group-item-action withripple">
                      <i class=" color-info zmdi zmdi-tag"></i>{{$data->nama}}
                      <span class="ml-auto badge-pill badge-pill-info">{{$jml}}</span>
                    </a>
                    @endforeach
                  </div>
                </div>
                
                <div role="tabpanel" class="tab-pane fade" id="tags">
                  <div class="card-block text-center">
                    @foreach($tags as $tag)
                    <a href="{{url('/filter/tags',$tag->name)}}" class="ms-tag ms-tag-primary">{{$tag->name}}</a>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="card card-success animated fadeInUp animation-delay-7">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="zmdi zmdi-play-circle-outline"></i> Feature Video</h3>
              </div>
              <div data-type="youtube" data-video-id="9ZfN87gSjvI"></div>
            </div>
            
          </div>
        </div>
      </div>
@endsection