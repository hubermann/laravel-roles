@extends('layouts.frontend')

@section('content')

<div class="container ">


  <div class="g-max-width-645 text-center mx-auto ">
    <h4 class="h1 mb-3">Checkout</h4>
    <p class="g-font-size-17 mb-0">Fill up the form and hit the "Proceed with payment process".</p>
    <br>
  </div>

  <!-- New order Form -->
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <form action="{{ route('frontend.new_order') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-6 form-group g-mb-20">
          <label for="area_code">Nombre</label>
            <input name="name" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15" type="text" placeholder="Name">
          @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
          </div>


          <div class="col-md-6 form-group g-mb-20">
          <label for="area_code">Apellido</label>
            <input name="surname" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15" type="text" placeholder="Surname">
          @if ($errors->has('surname'))
              <span class="help-block">
                  <strong>{{ $errors->first('surname') }}</strong>
              </span>
          @endif
          </div>

          </div>
          <div class="row">
          <hr>
          <div class="col-md-4 form-group g-mb-20">
          <label for="area_code">Codigo de area</label>
            <input name="area_code" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15" type="tel" placeholder="Area code">
          @if ($errors->has('area_code'))
              <span class="help-block">
                  <strong>{{ $errors->first('area_code') }}</strong>
              </span>
          @endif
          </div>

          <div class="col-md-8 form-group g-mb-20">
          <label for="telephone">Telefono</label>
            <input name="telephone" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15" type="tel" placeholder="Telephone">
          @if ($errors->has('telephone'))
              <span class="help-block">
                  <strong>{{ $errors->first('telephone') }}</strong>
              </span>
          @endif
          </div>

          </div><div class="row">
          <hr>
          <div class="col-md-8 form-group g-mb-20">
          <label for="street_name">Calle</label>
            <input name="street_name" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15" type="tel" placeholder="Street">
          @if ($errors->has('street_name'))
              <span class="help-block">
                  <strong>{{ $errors->first('street_name') }}</strong>
              </span>
          @endif
          </div>

          <div class="col-md-4 form-group g-mb-20">
          <label for="street_number">Numero</label>
            <input name="street_number" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15" type="tel" placeholder="Street number">
          @if ($errors->has('street_number'))
              <span class="help-block">
                  <strong>{{ $errors->first('street_number') }}</strong>
              </span>
          @endif
          </div>

          <div class="col-md-4 form-group g-mb-20">
          <label for="state">Provincia</label>
            <select name="state" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-1 g-px-15"  placeholder="State">
              @foreach($states as $k => $v)
                <option value="{{ $k }}"> {{ $v }} </option>
              @endforeach
            </select>
          @if ($errors->has('state'))
              <span class="help-block">
                  <strong>{{ $errors->first('state') }}</strong>
              </span>
          @endif
          </div>

          <div class="col-md-4 form-group g-mb-20">
          <label for="city">Ciudad</label>
            <input name="city" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15" type="tel" placeholder="City">
          @if ($errors->has('city'))
              <span class="help-block">
                  <strong>{{ $errors->first('city') }}</strong>
              </span>
          @endif
          </div>

          <div class="col-md-4 form-group g-mb-20">
          <label for="zip_code">Codigo postal</label>
            <input name="zip_code" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15" type="tel" placeholder="Zip Code">
          @if ($errors->has('zip_code'))
              <span class="help-block">
                  <strong>{{ $errors->first('zip_code') }}</strong>
              </span>
          @endif
          </div>


        </div>

        <div class="text-center">
          <button class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25" type="submit">proceed with payment process</button>
        </div>
      </form>
    </div>
  </div>


<br>
<br>
<br>

  <!-- End order Form -->
</div>


@endsection
