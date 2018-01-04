@extends('layouts.frontend')

@section('content')
<div class="container g-py-50">
        <div class="row">
          <div class="col-lg-7">
            <!-- Carousel -->
            <div id="carouselCus1" class="js-carousel g-pt-10 g-mb-10 slick-initialized slick-slider" data-infinite="true" data-fade="true" data-arrows-classes="u-arrow-v1 g-brd-around g-brd-white g-absolute-centered--y g-width-45 g-height-45 g-font-size-14 g-color-white g-color-primary--hover rounded-circle" data-arrow-left-classes="fa fa-angle-left g-left-40" data-arrow-right-classes="fa fa-angle-right g-right-40" data-nav-for="#carouselCus2"><div class="js-prev u-arrow-v1 g-brd-around g-brd-white g-absolute-centered--y g-width-45 g-height-45 g-font-size-14 g-color-white g-color-primary--hover rounded-circle fa fa-angle-left g-left-40 slick-arrow" style="display: block;"></div>
              <div aria-live="polite" class="slick-list draggable"><div class="slick-track" role="listbox" style="opacity: 1; width: 1905px;"><div class="js-slide g-bg-cover g-bg-black-opacity-0_1--after slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 635px; position: relative; left: 0px; top: 0px; z-index: 998; opacity: 0; height: auto; transition: opacity 500ms ease;">
                <img class="img-fluid w-100" src="assets/img-temp/650x750/img1.jpg" alt="Image Description">
              </div><div class="js-slide g-bg-cover g-bg-black-opacity-0_1--after slick-slide slick-current slick-active" data-slick-index="1" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide01" style="width: 635px; position: relative; left: -635px; top: 0px; z-index: 999; opacity: 1; height: auto;">
                <img class="img-fluid w-100" src="assets/img-temp/650x750/img2.jpg" alt="Image Description">
              </div><div class="js-slide g-bg-cover g-bg-black-opacity-0_1--after slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide02" style="width: 635px; position: relative; left: -1270px; top: 0px; z-index: 998; opacity: 0; height: auto; transition: opacity 500ms ease;">
                <img class="img-fluid w-100" src="assets/img-temp/650x750/img3.jpg" alt="Image Description">
              </div></div></div>
              
              
            <div class="js-next u-arrow-v1 g-brd-around g-brd-white g-absolute-centered--y g-width-45 g-height-45 g-font-size-14 g-color-white g-color-primary--hover rounded-circle fa fa-angle-right g-right-40 slick-arrow" style="display: block;"></div></div>

            <div id="carouselCus2" class="js-carousel text-center u-carousel-v3 g-mx-minus-5 slick-initialized slick-slider" data-infinite="true" data-center-mode="true" data-slides-show="3" data-is-thumbs="true" data-nav-for="#carouselCus1">
              <div aria-live="polite" class="slick-list draggable" style="padding: 0px;"><div class="slick-track" role="listbox" style="opacity: 1; width: 3010px; left: -860px;"><div class="js-slide g-cursor-pointer g-px-5 slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1" style="width: 215px;">
                <img class="img-fluid" src="assets/img-temp/250x170/img3.jpg" alt="Image Description">
              </div><div class="js-slide g-cursor-pointer g-px-5 slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" tabindex="-1" style="width: 215px;">
                <img class="img-fluid" src="assets/img-temp/250x170/img1.jpg" alt="Image Description">
              </div><div class="js-slide g-cursor-pointer g-px-5 slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" tabindex="-1" style="width: 215px;">
                <img class="img-fluid" src="assets/img-temp/250x170/img2.jpg" alt="Image Description">
              </div><div class="js-slide g-cursor-pointer g-px-5 slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1" style="width: 215px;">
                <img class="img-fluid" src="assets/img-temp/250x170/img3.jpg" alt="Image Description">
              </div><div class="js-slide g-cursor-pointer g-px-5 slick-slide slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide10" style="width: 215px; height: auto;">
                <img class="img-fluid" src="assets/img-temp/250x170/img1.jpg" alt="Image Description">
              </div><div class="js-slide g-cursor-pointer g-px-5 slick-slide slick-current slick-active slick-center" data-slick-index="1" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide11" style="width: 215px; height: auto;">
                <img class="img-fluid" src="assets/img-temp/250x170/img2.jpg" alt="Image Description">
              </div><div class="js-slide g-cursor-pointer g-px-5 slick-slide slick-active" data-slick-index="2" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide12" style="width: 215px; height: auto;">
                <img class="img-fluid" src="assets/img-temp/250x170/img3.jpg" alt="Image Description">
              </div><div class="js-slide g-cursor-pointer g-px-5 slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide13" style="width: 215px; height: auto;">
                <img class="img-fluid" src="assets/img-temp/250x170/img1.jpg" alt="Image Description">
              </div><div class="js-slide g-cursor-pointer g-px-5 slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide14" style="width: 215px; height: auto;">
                <img class="img-fluid" src="assets/img-temp/250x170/img2.jpg" alt="Image Description">
              </div><div class="js-slide g-cursor-pointer g-px-5 slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide15" style="width: 215px; height: auto;">
                <img class="img-fluid" src="assets/img-temp/250x170/img3.jpg" alt="Image Description">
              </div><div class="js-slide g-cursor-pointer g-px-5 slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" tabindex="-1" style="width: 215px;">
                <img class="img-fluid" src="assets/img-temp/250x170/img1.jpg" alt="Image Description">
              </div><div class="js-slide g-cursor-pointer g-px-5 slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" tabindex="-1" style="width: 215px;">
                <img class="img-fluid" src="assets/img-temp/250x170/img2.jpg" alt="Image Description">
              </div><div class="js-slide g-cursor-pointer g-px-5 slick-slide slick-cloned" data-slick-index="8" aria-hidden="true" tabindex="-1" style="width: 215px;">
                <img class="img-fluid" src="assets/img-temp/250x170/img3.jpg" alt="Image Description">
              </div><div class="js-slide g-cursor-pointer g-px-5 slick-slide slick-cloned" data-slick-index="9" aria-hidden="true" tabindex="-1" style="width: 215px;">
                <img class="img-fluid" src="assets/img-temp/250x170/img1.jpg" alt="Image Description">
              </div></div></div>

              

              

              

              

              
            </div>
            <!-- End Carousel -->
          </div>

          <div class="col-lg-5">
            <div class="g-px-40--lg g-pt-70">
              <!-- Product Info -->
              <div class="g-mb-30">
                <h1 class="g-font-weight-300 mb-4">{{ $product->title }}</h1>
                <p>Dress is the "rain mac" version of our beloved essential the Unify Parka. Crafted from a water resistant fluid memory fabric to create an elegant draped effect when thrown on, this lightweight shell will take you from season to season and protect you from that unexpected shower.</p>
              </div>
              <!-- End Product Info -->

              <!-- Price -->
        <div class="g-mb-30">
          <h2 class="g-color-gray-dark-v5 g-font-weight-400 g-font-size-12 text-uppercase mb-2">Precio</h2>
          <span class="g-color-black g-font-weight-500 g-font-size-30 mr-2">$ {{ number_format($product->price, 2) }}</span>

        </div>
        <!-- End Price -->

        <hr>

        @foreach(json_decode($product->dinamic_fields, true) as $key => $value)
          <div class="row ">
            <div class="col-md-6 g-font-weight-400 g-font-size-default mb-0 g-color-gray-dark-v5 ">{{ $value['propiedad'] }}</div>
            <div class="col-md-6 g-font-weight-400 g-font-size-default mb-0 g-color-gray-dark-v5 text-right">{{ $value['valor'] }}</div>
          </div>
          <hr>
        @endforeach


              <!-- Buttons -->
              <div class="row g-mx-minus-5 g-mb-20">
                <div class="col g-px-5 g-mb-10">
                  <button class="btn btn-block u-btn-primary g-font-size-12 text-uppercase g-py-15 g-px-25" type="button">
                    Add to Cart <i class="align-middle ml-2 icon-finance-100 u-line-icon-pro"></i>
                  </button>
                </div>
                <div class="col g-px-5 g-mb-10">
                  <!-- <button class="btn btn-block u-btn-outline-black g-brd-gray-dark-v5 g-brd-black--hover g-color-gray-dark-v4 g-color-white--hover g-font-size-12 text-uppercase g-py-15 g-px-25" type="button">
                    Add to Wishlist <i class="align-middle ml-2 icon-medical-022 u-line-icon-pro"></i>
                  </button> -->
                </div>
              </div>
              <!-- End Buttons -->

              <!-- Nav Tabs -->
              <ul class="nav d-flex justify-content-between g-font-size-12 text-uppercase" role="tablist" data-target="nav-1-1-default-hor-left">
                <li class="nav-item g-brd-bottom g-brd-gray-dark-v4">
                  <a class="nav-link active g-color-primary--active g-pa-0 g-pb-1" data-toggle="tab" href="#nav-1-1-default-hor-left--3" role="tab">Returns</a>
                </li>
                <li class="nav-item g-brd-bottom g-brd-gray-dark-v4">
                  <a class="nav-link g-color-primary--active g-pa-0 g-pb-1" data-toggle="tab" href="#nav-1-1-default-hor-left--1" role="tab">View Size Guide</a>
                </li>
                <li class="nav-item g-brd-bottom g-brd-gray-dark-v4">
                  <a class="nav-link g-color-primary--active g-pa-0 g-pb-1" data-toggle="tab" href="#nav-1-1-default-hor-left--2" role="tab">Delivery</a>
                </li>
              </ul>
              <!-- End Nav Tabs -->

              <!-- Tab Panes -->
              <div id="nav-1-1-default-hor-left" class="tab-content">
                <div class="tab-pane fade show active g-pt-30" id="nav-1-1-default-hor-left--3" role="tabpanel">
                  <p class="g-color-gray-dark-v4 g-font-size-13 mb-0">You can return/exchange your orders in Unify E-commerce. For more information, read our
                    <a href="#">FAQ</a>.</p>
                </div>

                <div class="tab-pane fade g-pt-30" id="nav-1-1-default-hor-left--1" role="tabpanel">
                  <h4 class="g-font-size-15 mb-3">General Clothing Size Guide</h4>

                  <!-- Size -->
                  <table>
                    <tbody>
                      <tr class="g-color-gray-dark-v4 g-font-size-12">
                        <td class="align-top g-width-150 g-py-5">Unify Size (UK)</td>
                        <td class="align-top g-width-50 g-py-5">S</td>
                        <td class="align-top g-width-50 g-py-5">M</td>
                        <td class="align-top g-width-50 g-py-5">L</td>
                        <td class="align-top g-width-50 g-py-5">XL</td>
                        <td class="align-top g-width-50 g-py-5">XXL</td>
                      </tr>
                      <tr class="g-color-gray-dark-v4 g-font-size-12">
                        <td class="align-top g-width-150 g-py-5">UK</td>
                        <td class="align-top g-width-50 g-py-5">6</td>
                        <td class="align-top g-width-50 g-py-5">8</td>
                        <td class="align-top g-width-50 g-py-5">10</td>
                        <td class="align-top g-width-50 g-py-5">12</td>
                        <td class="align-top g-width-50 g-py-5">14</td>
                      </tr>
                      <tr class="g-color-gray-dark-v4 g-font-size-12">
                        <td class="align-top g-width-150 g-py-5">Europe</td>
                        <td class="align-top g-width-50 g-py-5">32</td>
                        <td class="align-top g-width-50 g-py-5">34</td>
                        <td class="align-top g-width-50 g-py-5">36</td>
                        <td class="align-top g-width-50 g-py-5">38</td>
                        <td class="align-top g-width-50 g-py-5">40</td>
                      </tr>
                      <tr class="g-color-gray-dark-v4 g-font-size-12">
                        <td class="align-top g-width-150 g-py-5">US</td>
                        <td class="align-top g-width-50 g-py-5">2</td>
                        <td class="align-top g-width-50 g-py-5">4</td>
                        <td class="align-top g-width-50 g-py-5">6</td>
                        <td class="align-top g-width-50 g-py-5">8</td>
                        <td class="align-top g-width-50 g-py-5">10</td>
                      </tr>
                      <tr class="g-color-gray-dark-v4 g-font-size-12">
                        <td class="align-top g-width-150 g-py-5">Australia</td>
                        <td class="align-top g-width-50 g-py-5">6</td>
                        <td class="align-top g-width-50 g-py-5">8</td>
                        <td class="align-top g-width-50 g-py-5">10</td>
                        <td class="align-top g-width-50 g-py-5">12</td>
                        <td class="align-top g-width-50 g-py-5">14</td>
                      </tr>
                      <tr class="g-color-gray-dark-v4 g-font-size-12">
                        <td class="align-top g-width-150 g-py-5">Japan</td>
                        <td class="align-top g-width-50 g-py-5">7</td>
                        <td class="align-top g-width-50 g-py-5">9</td>
                        <td class="align-top g-width-50 g-py-5">11</td>
                        <td class="align-top g-width-50 g-py-5">13</td>
                        <td class="align-top g-width-50 g-py-5">15</td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- End Size -->
                </div>

                <div class="tab-pane fade g-pt-30" id="nav-1-1-default-hor-left--2" role="tabpanel">
                  <!-- Shipping Mehtod -->
                  <table>
                    <thead class="h6 g-brd-bottom g-brd-gray-light-v3 g-color-gray-dark-v3 g-font-size-13">
                      <tr>
                        <th class="g-width-100 g-font-weight-500 g-pa-0 g-pb-10">Destination</th>
                        <th class="g-width-140 g-font-weight-500 g-pa-0 g-pb-10">Delivery type</th>
                        <th class="g-width-150 g-font-weight-500 g-pa-0 g-pb-10">Delivery time</th>
                        <th class="g-font-weight-500 text-right g-pa-0 g-pb-10">Cost</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="g-color-gray-dark-v4 g-font-size-12">
                        <td class="align-top g-py-10">UK</td>
                        <td class="align-top g-py-10">Standard delivery</td>
                        <td class="align-top g-font-size-11 g-py-10">2-3 Working days</td>
                        <td class="align-top text-right g-py-10">$5.5</td>
                      </tr>
                      <tr class="g-color-gray-dark-v4 g-font-size-12">
                        <td class="align-top g-py-10"></td>
                        <td class="align-top g-py-10">Next day</td>
                        <td class="align-top g-font-size-11 g-py-10">Order before 12pm monday - thursday and receive it the next day</td>
                        <td class="align-top text-right g-py-10">$9.5</td>
                      </tr>
                      <tr class="g-color-gray-dark-v4 g-font-size-12">
                        <td class="align-top g-py-10"></td>
                        <td class="align-top g-py-10">Saturday delivery</td>
                        <td class="align-top g-font-size-11 g-py-10">Saturday delivery for orders placed before 12pm on friday</td>
                        <td class="align-top text-right g-py-10">$12.00</td>
                      </tr>
                      <tr class="g-color-gray-dark-v4 g-font-size-12">
                        <td class="align-top g-py-10">Europe</td>
                        <td class="align-top g-py-10">Standard delivery</td>
                        <td class="align-top g-font-size-11 g-py-10">3-9 Working days</td>
                        <td class="align-top text-right g-py-10">$20.00</td>
                      </tr>
                      <tr class="g-color-gray-dark-v4 g-font-size-12">
                        <td class="align-top g-py-10">America</td>
                        <td class="align-top g-py-10">Standard delivery</td>
                        <td class="align-top g-font-size-11 g-py-10">3-9 Working days</td>
                        <td class="align-top text-right g-py-10">$25.00</td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- End Shipping Mehtod -->
                </div>
              </div>
              <!-- End Tab Panes -->
            </div>
          </div>
        </div>
      </div>



@endsection