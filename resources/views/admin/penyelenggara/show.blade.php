@extends('admin.layout')

@section('main')
  <div class="container">

    <div class="spacer-2"></div>

    <nav class="navbar navbar-light bg-light rounded text-dark shadow-sm">
      <span class="h3 m-0">Profil penyelenggara</span>
    </nav>

    <div class="spacer-2"></div>

    <div class="card shadow-sm">
      <div class="card-body">

        <div class="form-group">

        <div class="form-group">
          <label for="nama_lengkap">Nama Lengkap</label>
          <input type="text" class="form-control {{$errors->has('nama_lengkap') ? 'is-invalid' : ''}}" id="nama_lengkap" name="nama_lengkap" value="{{ $penyelenggara->nama_lengkap }}" disabled>
        </div>

          <label for="name">Username</label>
          <input type="text" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" id="username" name="username" value="{{ $penyelenggara->username }}" disabled>
        </div>
  
        <div class="form-group">
          <label for="email">E-Mail</label>
          <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="{{ $penyelenggara->email }}" disabled>
        </div>

        <div class="form-group">
          <label for="provinsi">Provinsi</label>
          <input type="text" class="form-control {{$errors->has('provinsi') ? 'is-invalid' : ''}}" id="provinsi" name="provinsi" value="{{ $penyelenggara->provinsi }}" disabled>
        </div>

        <div class="form-group">
          <label for="kota">Kota</label>
          <input type="text" class="form-control {{$errors->has('kota') ? 'is-invalid' : ''}}" id="kota" name="kota" value="{{ $penyelenggara->kota }}" disabled>
        </div>

        <div class="form-group">
          <label for="kecamatan">Kecamatan</label>
          <input type="text" class="form-control {{$errors->has('kecamatan') ? 'is-invalid' : ''}}" id="kecamatan" name="kecamatan" value="{{ $penyelenggara->kecamatan }}" disabled>
        </div>

        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control {{$errors->has('alamat') ? 'is-invalid' : ''}}" id="alamat" name="alamat" value="{{ $penyelenggara->alamat }}" disabled>
        </div>

        <div class="form-group">
          <label for="kodepos">kodepos</label>
          <input type="text" class="form-control {{$errors->has('kodepos') ? 'is-invalid' : ''}}" id="kodepos" name="kodepos" value="{{ $penyelenggara->kodepos }}" disabled>
        </div>

        <div class="spacer-2"></div>

        <div class="form-group">
          <a class="btn btn-secondary" href="{{ route('admin.penyelenggarafree') }}" >Kembali</a>
        </div>

      </div>
    </div>

  </div>
@endsection