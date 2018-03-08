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

 
</section>

<style>
  .border-none{border:0; background: #fff;}
</style>



<!-- ultimos -->
@if(count($lasts_products))
<section class="container">
 <div class="text-center mx-auto g-max-width-600 g-mb-50">
    <h2 class="g-color-black mb-4">Nuevos productos</h2>
    <p class="lead">Últimos productos cargados. Aproveche las ofertas!</p>
  </div>

<div class="row g-mx-minus-10 g-mb-50">


@foreach($lasts_products as $lasts_product)

<div class="col-md-6 col-lg-4 g-px-10 ">

<!-- Article -->
<article class="media g-brd-around g-brd-gray-light-v4 g-bg-white rounded g-pa-10 g-mb-20">
  <!-- Article Image -->
  <div class="g-max-width-100 g-mr-15">
  
  @if ( count($lasts_product->images))
      <img class="d-flex w-100" src="{{'/images-products/'.$lasts_product->images[0]->filename }}" alt="{{ $lasts_product->title }}">
  @else
      <img class="d-flex w-100" src="{{ URL::to('/') }}/images/no-image-available.jpg" alt="{{ $lasts_product->title }}">
  @endif

  </div>
  <!-- End Article Image -->

  <!-- Article Info -->
  <div class="media-body align-self-center">
    <h4 class="h5 g-mb-7">
      <a class="g-color-black g-color-primary--hover g-text-underline--none--hover" href="{{ route('frontend.product_detail', ['id' => $lasts_product->id]) }}">{{ $lasts_product->title }}</a>
    </h4>
    <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13 g-mb-10" href="{{ route('frontend.by_category', ['id' => $lasts_product->category_id]) }}">{{ $lasts_product->get_category_name($lasts_product->category_id) }}</a>
    <!-- End Article Info -->

    <!-- Article Footer -->
    <footer class="d-flex justify-content-between g-font-size-16">
      <span class="g-color-black g-line-height-1">{{ number_format($lasts_product->price, 2) }}</span>
      <ul class="list-inline g-color-gray-light-v2 g-font-size-14 g-line-height-1">
       
          <form method="POST" action="{{url('cart')}}">
          <input type="hidden" name="product_id" value="{{$lasts_product->id}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button class=" border-none" type="submit">
            <i class="icon-finance-100 u-line-icon-pro"></i> 
          </button>
        </form>

      </ul>
    </footer>
    <!-- End Article Footer -->
  </div>
</article>
<!-- End Article -->
</div>

@endforeach


</div>

 <div class="text-center">
    <a class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25" href="{{ route('frontend.products') }}">Ver todos los productos</a>
  </div>

  <br>
  <br>
  <br>
  <br>
</section>

@endif    
<!-- end ultimos -->


@endsection
