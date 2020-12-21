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
              <label for="nama_lengkap">Nama Lengkap</label>
              <input type="text" class="form-control {{$errors->has('nama_lengkap') ? 'is-invalid' : ''}}" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" aria-describedby="nama_lengkapFeedback" autofocus>
              @if ($errors->has('nama_lengkap'))
                <div id="nama_lengkapFeedback" class="invalid-feedback">
                  <strong>{{ $errors->first('nama_lengkap') }}</strong>
                </div>
              @endif
            </div>

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" id="username" name="username" value="{{ old('username') }}" aria-describedby="usernameFeedback" autofocus>
              @if ($errors->has('username'))
                <div id="usernameFeedback" class="invalid-feedback">
                  <strong>{{ $errors->first('username') }}</strong>
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
                <label for="role">Daftar Sebagai</label>
                <select class="form-control {{$errors->has('role') ? 'is-invalid' : ''}}" id="role" name="role" value="{{ old('role') }}" aria-describedby="roleFeedback" autofocus>
                <option value="penyelenggaraprem">penyelenggara</option>
                <option value="narasumberprem">narasumber</option>
                </select>
                @if ($errors->has('role'))
                  <div id="roleFeedback" class="invalid-feedback">
                    <strong>{{ $errors->first('role') }}</strong>
                  </div>
                @endif
              </div>

          <!-- <label for="scan_buktitransfer">Scan Bukti Transfer</label>
          <div class="input-group">
            <input type="file" class="custom-file-input {{$errors->has('scan_buktitransfer') ? 'is-invalid' : ''}}" id="scan_buktitransfer" name="scan_buktitransfer" value="{{ old('scan_buktitransfer') }}" aria-describedby="scan_buktitransferFeedback" autofocus>
            <label for="scan_buktitransfer" class='custom-file-label'>Pilih File</label>
            @if ($errors->has('scan_buktitransfer'))
              <div id="scan_buktitransferFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('scan_buktitransfer') }}</strong>
              </div>
            @endif
          </div><br> -->

              <div class="form-group">
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary">Buat Akun</button>
                </div>
                <p>Sudah punya akun? <a href="{{ route('login') }}" >Sign In</a></p>
              </div>
            
          </form>
        @endcomponent
      </div>
    </div>
  </div>
@endsection