@extends('layouts.app')
@section('content')

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
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        @component('components.card')
          @slot('header')
            Daftar
          @endslot

          <form action="{{ route('store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">

              <label for="name">Nama</label>
              <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" value="{{ old('name') }}" aria-describedby="nameFeedback" autofocus>
              @if ($errors->has('name'))
                <div id="nameFeedback" class="invalid-feedback">
                  <strong>{{ $errors->first('name') }}</strong>
                </div>
              @endif
            </div>

            <div class="form-group">
              <label for="email">E-Mail Address</label>
              <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailFeedback">
              @if ($errors->has('email'))
                <div id="emailFeedback" class="invalid-feedback">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password" value="{{ old('password') }}" aria-describedby="passwordFeedback">
              @if ($errors->has('password'))
                <div id="passwordFeedback" class="invalid-feedback">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>

            <div class="form-group">
            <label>Daftar Sebagai :</label>
            <div class="form-group">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="narasumber" value="narasumber">
                <label class="form-check-label" for="narasumber">Narasumber</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="penyelenggara" value="penyelenggara">
                <label class="form-check-label" for="penyelenggara">Penyelenggara</label>
              </div>
            </div>
          </div>

              <div class="form-group">
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
                <p>Sudah punya akun? <a href="{{ route('login') }}" >Login</a></p>
              </div>
            
          </form>
        @endcomponent
      </div>
    </div>
  </div>
@endsection