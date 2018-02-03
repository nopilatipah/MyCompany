@extends('layouts.user')

@section('content')
@php
$komponen = App\Komponen::find(1);
@endphp
<div class="ms-hero-page ms-hero-img-keyboard ms-hero-bg-primary mb-6">
        <div class="container">
          <div class="text-center">
            <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">Berita Seputar {{$komponen->nama_sekolah}}</h1>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            @foreach($berita as $data)
            <article class="card mb-4 wow materialUp animation-delay-5">
              <figure class="ms-thumbnail ms-thumbnail-diagonal">
                <img src="{{asset('img/'.$data->foto)}}" alt="" class="img-fluid">
                <figcaption class="ms-thumbnail-caption text-center">
                  <div class="ms-thumbnail-caption-content">
                    <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <div class="mt-2">
                      <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-sm mr-1 btn-circle-white color-danger">
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
                      <a href="javascript:void(0)" class="ms-tag ms-tag-info">Design</a>
                      <a href="javascript:void(0)" class="ms-tag ms-tag-danger">Productivity</a>
                      <a href="javascript:void(0)" class="ms-tag ms-tag-royal">Resources</a>
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
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="javascript:void(0)">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">4</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="col-lg-4">
            <div class="card animated fadeInUp animation-delay-7">
              <div class="card-tabs">
                <ul class="nav nav-tabs nav-tabs-full nav-tabs-4 shadow-2dp" role="tablist">
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
                    <a href="#archives" aria-controls="archives" role="tab" data-toggle="tab" class="nav-link withoutripple">
                      <i class="no-mr zmdi zmdi-time"></i>
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
                      <div class="media mb-2">
                        <div class="media-left media-middle">
                          <a href="#">
                            <img class="d-flex mr-3 media-object media-object-circle" src="assets/img/demo/p75.jpg" alt="..."> </a>
                        </div>
                        <div class="media-body">
                          <a href="javascript:void(0)" class="media-heading">Lorem ipsum dolor sit amet in consectetur adipisicing</a>
                          <div class="media-footer text-small">
                            <span class="mr-1">
                              <i class="zmdi zmdi-time color-info mr-05"></i> August 18, 2016</span>
                            <span>
                              <i class="zmdi zmdi-folder-outline color-success mr-05"></i>
                              <a href="javascript:void(0)">Design</a>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="media mb-2">
                        <div class="media-left media-middle">
                          <a href="#">
                            <img class="d-flex mr-3 media-object media-object-circle" src="assets/img/demo/p75.jpg" alt="..."> </a>
                        </div>
                        <div class="media-body">
                          <a href="javascript:void(0)" class="media-heading">Nemo enim ipsam voluptatem quia voluptas sit aspernatur</a>
                          <div class="media-footer text-small">
                            <span class="mr-1">
                              <i class="zmdi zmdi-time color-info mr-05"></i> August 18, 2016</span>
                            <span>
                              <i class="zmdi zmdi-folder-outline color-danger mr-05"></i>
                              <a href="javascript:void(0)">Productivity</a>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="media">
                        <div class="media-left media-middle">
                          <a href="#">
                            <img class="d-flex mr-3 media-object media-object-circle" src="assets/img/demo/p75.jpg" alt="..."> </a>
                        </div>
                        <div class="media-body">
                          <a href="javascript:void(0)" class="media-heading">inventore veritatis et vitae quasi architecto beatae </a>
                          <div class="media-footer text-small">
                            <span class="mr-1">
                              <i class="zmdi zmdi-time color-info mr-05"></i> August 18, 2016</span>
                            <span>
                              <i class="zmdi zmdi-folder-outline color-royal-light mr-05"></i>
                              <a href="javascript:void(0)">Resources</a>
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
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class=" color-info zmdi zmdi-tag"></i>{{$data->nama}}
                      <span class="ml-auto badge-pill badge-pill-info">{{$jml}}</span>
                    </a>
                    @endforeach
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="archives">
                  <div class="list-group">
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class="zmdi zmdi-calendar"></i> January 2016
                      <span class="ml-auto badge-pill">25</span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class="zmdi zmdi-calendar"></i> February 2016
                      <span class="ml-auto badge-pill">14</span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class="zmdi zmdi-calendar"></i> March 2016
                      <span class="ml-auto badge-pill">9</span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class="zmdi zmdi-calendar"></i> April 2016
                      <span class="ml-auto badge-pill">12</span>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple">
                      <i class="zmdi zmdi-calendar"></i> June 2016
                      <span class="ml-auto badge-pill">65</span>
                    </a>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tags">
                  <div class="card-block text-center">
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Design</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Productivity</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Web</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Resources</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Multimedia</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">HTML5</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">CSS3</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Javascript</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Jquery</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Bootstrap</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Angular</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Gulp</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Atom</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Fonts</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Pictures</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Developers</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Code</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">SASS</a>
                    <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Less</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card card-success animated fadeInUp animation-delay-7">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="zmdi zmdi-play-circle-outline"></i> Feature Video</h3>
              </div>
              <div data-type="vimeo" data-video-id="94747106"></div>
            </div>
            <div class="card card-primary animated fadeInUp animation-delay-7">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="zmdi zmdi-widgets"></i> Text Widget</h3>
              </div>
              <div class="card-block">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat ipsam non eaque est architecto doloribus, labore nesciunt laudantium, ex id ea, cum facilis similique tenetur fugit nemo id minima possimus.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection