@extends('layouts.frontend')

@section('content')

<div class="container g-py-100">
  <!-- Contact Info -->
  <div class="row g-mb-100">
    <div class="col-md-6 col-lg-4 mx-auto g-py-15">
      <!-- Media -->
      <div class="media g-brd-around g-brd-gray-light-v4 rounded g-pa-40">
        <div class="d-flex g-mr-30">
          <i class="d-inline-block g-color-primary g-font-size-40 g-pos-rel g-top-3 icon-communication-004 u-line-icon-pro"></i>
        </div>
        <div class="media-body">
          <span class="d-block g-font-weight-500 g-font-size-default text-uppercase mb-2">Teléfono</span>
          <ul class="list-unstyled mb-0">

            <li class="d-block g-color-gray-dark-v4">+(54) 9 11 6966-1866</li>
          </ul>
        </div>
      </div>
      <!-- End Media -->
    </div>

    <div class="col-md-6 col-lg-4 mx-auto g-py-15">
      <!-- Media -->
      <div class="media g-brd-around g-brd-gray-light-v4 rounded g-pa-40">
        <div class="d-flex g-mr-30">
          <i class="d-inline-block g-color-primary g-font-size-40 g-pos-rel g-top-3 icon-communication-062 u-line-icon-pro"></i>
        </div>
        <div class="media-body">
          <span class="d-block g-font-weight-500 g-font-size-default text-uppercase mb-2">Emails</span>
          <span class="d-block g-color-gray-dark-v4">ventas@proctecno.com <br> soporte@proctecno.com</span>
        </div>
      </div>
      <!-- End Media -->
    </div>

      <!-- Media -->
    <div class="col-md-6 col-lg-4 mx-auto g-py-15">
      <div class="media g-brd-around g-brd-gray-light-v4 rounded g-pa-40">
        <div class="d-flex g-mr-30">
          <i class="d-inline-block g-color-primary g-font-size-40 g-pos-rel g-top-3 icon-hotel-restaurant-249 u-line-icon-pro"></i>
        </div>
        <div class="media-body text-left">
          <span class="d-block g-font-weight-500 g-font-size-default text-uppercase mb-2">Horario de atención</span>
          <ul class="list-unstyled mb-0">
            <li class="d-block g-color-gray-dark-v4">08AM a 20PM</li>
          </ul>
        </div>
      </div>
      <!-- End Media -->
    </div>
  </div>
  <!-- End Contact Info -->


<div class="row" id="contact">
    <div class="g-max-width-645 text-center mx-auto g-mb-70">
      <h2 class="h1 mb-3" >Contacto</h2>
      <p class="g-font-size-17 mb-0">Complete el siguiente formulario y haga click en "Enviar Mensaje". Uno de nuestros representantes se comunicara a la brevedad.</p>
    </div>

    <!-- Contact Form -->
    <div class="row justify-content-center" >
      <div class="col-lg-8">
        <form method="post" action="{{ route('frontend.process_contact') }}">
         {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6 form-group g-mb-20">
              <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15" type="text" placeholder="Nombre" name="name" value="{{ old('name') }}">
              @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
              @endif
            </div>

            <div class="col-md-6 form-group g-mb-20">
              <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15" type="email" placeholder="Email" name="email" value="{{ old('email') }}">
              @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>

            <div class="col-md-6 form-group g-mb-20">
              <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15" type="text" placeholder="Asunto" name="subject" value="{{ old('subject') }}">
              @if ($errors->has('subject'))
              <span class="help-block">
                  <strong>{{ $errors->first('subject') }}</strong>
              </span>
              @endif
            </div>

            <div class="col-md-6 form-group g-mb-20">
              <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15" type="text" placeholder="Teléfono" name="telephone" value="{{ old('telephone') }}">
              @if ($errors->has('telephone'))
              <span class="help-block">
                  <strong>{{ $errors->first('telephone') }}</strong>
              </span>
              @endif
            </div>

            <div class="col-md-12 form-group g-mb-40">
              <textarea class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover g-resize-none rounded g-py-13 g-px-15" rows="7" name="message" placeholder="Mensaje"> {{ old('message') }}</textarea>
              @if ($errors->has('message'))
              <span class="help-block">
                  <strong>{{ $errors->first('message') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="text-center">
            <button class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25" type="submit">Enviar Mensaje</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Contact Form -->
</div>


@endsection
