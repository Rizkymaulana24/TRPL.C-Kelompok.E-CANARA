@extends('layouts.app')

@section('body')

<style>
body {background-image: linear-gradient(to bottom right, #3D4DAC, #F14494);
      background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center}
</style>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand p-0 my-0" href="{{ route('welcome') }}">{{ config('app.name') }}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <div class="container">

    <div class="spacer-5"></div>

    <div class="row">
      <div class="col-sm-5">

        <div class="spacer-5"></div>

        <div class="jumbotron jumbotron-fluid bg-transparent text-light rounded">
          <div class="container">
            <h1 class="display-3">CANARA</h1>
            <p class="lead">Cari Narasumber</p>
          </div>
        </div>

      </div>

      <div class="col-sm-5 offset-sm-1">

        <div class="text-center mb-4">
          <h1 class="text-light">Login</h1>
        </div>

        <div class="card shadow-lg">
          <div class="card-body">
            @if (Session::has('error'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailFeedback"  autofocus>
                @if ($errors->has('email'))
                  <div id="emailFeedback" class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                  </div>
                @endif
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password" aria-describedby="passwordFeedback" >
                @if ($errors->has('password'))
                  <div id="passwordFeedback" class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                  </div>
                @endif
              </div>
              
              <div class="spacer-2"></div>

              <div class="form-group">
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <p>Belum punya akun? <a href="{{ route('register') }}" >Daftar</a></p>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
