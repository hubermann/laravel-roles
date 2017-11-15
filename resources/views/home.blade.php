@extends('layouts.app')

@section('content')




<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<div class="row">
  @if(Session::has('message'))
  Hay mensaje
  <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
  @endif

</div>

                    You are logged in (HOME)!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

