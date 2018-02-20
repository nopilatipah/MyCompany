@extends('layouts.user')

@section('content')
@php
$komponen = App\Komponen::find(1);
@endphp

      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            @foreach($berita as $data)
            @php
            $tagged = DB::table('tagging_tagged')->where('taggable_id','=',$data->id)->get();
            @endphp
            <article class="card mb-4 wow materialUp animation-delay-5">
              <figure class="ms-thumbnail ms-thumbnail-diagonal">
                <img src="{{asset('img/'.$data->foto)}}" alt="" class="img-fluid">
                <figcaption class="ms-thumbnail-caption text-center">
                  <div class="ms-thumbnail-caption-content">
                    <h3 class="ms-thumbnail-caption-title">{{$data->judul}}</h3>
                    <div class="mt-2">
                      <a href="{{url('like',$data->id)}}" class="btn-circle btn-circle-raised btn-circle-sm mr-1 btn-circle-white color-danger">
                        <i class="zmdi zmdi-favorite"></i>
                      </a>
                      <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-sm ml-1 mr-1 btn-circle-white color-warning">
                        <i class="zmdi zmdi-star"></i>
                      </a>
                      <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-sm ml-1 btn-circle-white color-success">
                        <i class="zmdi zmdi-share"></i>
                      </a>
                    </div>
                  </div>
                </figcaption>
              </figure>
              <div class="card-block">
                <h2>
                  <a href=javascript:void(0)>{{$data->judul}}</a>
                </h2>
                <p>{!! str_limit($data->konten, 350) !!}</p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mt-1">
                      @foreach($tagged as $tg)
                      <a href="javascript:void(0)" class="ms-tag ms-tag-danger">{{$tg->tag_name}}</a>
                      @endforeach
                    </div>
                  </div>
                  <div class="col-md-6">
                    <a href="{{url('/baca-selengkapnya/'.$data->id)}}" class="btn btn-primary btn-raised btn-block animate-icon">Baca Selengkapnya
                      <i class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>
            @endforeach
            {{ $berita->links() }}
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
                      $pop = DB::table('artikels')
                        ->join('kategori_artikels','kategori_artikels.id','=','artikels.kategori_id')
                        ->select('artikels.*', 'kategori_artikels.nama as kategori')
                        ->orderBy('artikels.views','desc')->take(3)->get();             
                      @endphp

                      @foreach($pop as $populer)
                      @php
                      $kkk = App\KategoriArtikel::find($populer->kategori_id);
                      @endphp
                      <div class="media mb-2">
                        <div class="media-left media-middle">
                          <a href="{{url('/baca-selengkapnya/'.$populer->id)}}">
                            <img class="d-flex mr-3 media-object media-object-circle" src="{{asset('img/'.$populer->foto)}}" alt="..."> </a>
                        </div>
                        <div class="media-body">
                          <a href="{{url('/baca-selengkapnya/'.$data->id)}}" class="media-heading">{{$populer->judul}}</a>
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
                      @endforeach
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