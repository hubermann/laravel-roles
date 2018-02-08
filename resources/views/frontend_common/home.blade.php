@extends('layouts.frontend')

@section('content')

<style>
.carousel-caption{ bottom: 180px;}
.carousel-caption h3{font-size: 4em;}
</style>

@if($sliders->count())
<!-- carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach( $sliders as $key => $slider )
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="{{ $key == 0 ? ' active' : '' }}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">

  @foreach( $sliders as $key => $slider )
      <div class="carousel-item {{ $key == 0 ? ' active' : '' }}" >
          <img class="d-block w-100" src="{{'/images-sliders/'.$slider->filename }}" alt="{{ $slider->title }}">

      <div class="carousel-caption">
          @if ($slider->title)
            <h3> {{$slider->title}}</h3>
          @endif
          @if ($slider->text)
            <h5> {{$slider->text}}</h5>
          @endif

          @if ($slider->link)
            <a href="{{$slider->link}}" class="btn btn-primary" >{{$slider->title_button}}</a>
          @endif
      </div>




      </div>
  @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- end carousel  -->
@endif

@include('frontend_common.call_to_action')






<!--  PRODUCTOS BOXES  -->

<section class="container g-py-100">
  <div class="text-center mx-auto g-max-width-600 g-mb-50">
    <h2 class="g-color-black mb-4">Nuevos productos</h2>
    <p class="lead">Últimos productos cargados. Aproveche las ofertas!</p>
  </div>

  <div class="row g-mx-minus-10 g-mb-50">



    <style>
    .border-none{border: none;}
    .background-none{background: none;}
    </style>

    <!--   PRODUCTOS DESTACADOS  -->

    @if(count($outstandings))

    <div class="container">

      <div class="row g-mx-minus-10">


        @foreach($outstandings as $outstanding)
          <div class="col-sm-6 col-md-4 g-px-10 g-mb-30">
          <!-- Blog Background Overlay Blocks -->
          <article class="u-block-hover">
            <div class="g-bg-cover g-bg-white-gradient-opacity-v1--after">
              @if ( count($outstanding->images))
                  <img class="d-flex align-items-end u-block-hover__main--mover-down" src="{{'/images-products/'.$outstanding->images[0]->filename }}" alt="{{ $outstanding->title }}">
              @else
                  <img class="d-flex align-items-end u-block-hover__main--mover-down" src="{{ URL::to('/') }}/images/no-image-available.jpg" alt="{{ $outstanding->title }}">
              @endif

            </div>
            <div class="u-block-hover__additional--partially-slide-up text-center g-z-index-1 mt-auto">
              <div class="u-block-hover__visible g-pa-25">
                <!-- <span class="d-block g-color-white-opacity-0_7 g-font-size-13 mb-2">design</span> -->
                <h2 class="h4 g-color-white g-font-weight-400 mb-3">
                  <a class="u-link-v5 g-color-white g-color-primary--hover g-cursor-pointer" href="{{ route('frontend.product_detail', ['id' => $outstanding->id]) }}">{{ $outstanding->title }}</a>
                </h2>
                <h4 class="d-inline-block g-color-white-opacity-0_7 g-font-size-11 mb-0">
                  <a class="g-color-white-opacity-0_7 text-uppercase" href="{{ route('frontend.by_category', ['id' => $outstanding->category_id]) }}">{{ $outstanding->get_category_name($outstanding->category_id) }}</a>
                  -
                  <a class="g-color-white-opacity-0_7 text-uppercase" href="{{ route('frontend.by_subcategory', ['id' => $outstanding->subcategory_id]) }}">{{$outstanding->get_subcategory_name($outstanding->subcategory_id) }}</a>


                </h4>
                <div class="mb-4"></span>
              </div>

              <a class="d-inline-block g-brd-bottom g-brd-white g-color-white g-font-weight-500 g-font-size-12 text-uppercase g-text-underline--none--hover g-mb-30" href="{{ route('frontend.product_detail', ['id' => $outstanding->id]) }}">Ver más</a>
            </div>

          </article>
          <!-- End Blog Background Overlay Blocks -->
        </div>
        @endforeach

      </div>
    </div>


    @endif

  </div>

  <div class="text-center">
    <a class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25" href="{{ route('frontend.products') }}">Ver todos los productos</a>
  </div>
</section>



@endsection
