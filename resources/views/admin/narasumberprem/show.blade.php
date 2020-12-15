@extends('admin.layout')

@section('main')
  <div class="container">

    <div class="spacer-2"></div>

    <nav class="navbar navbar-light bg-light rounded text-dark shadow-sm">
      <span class="h3 m-0">Profil Narasumber</span>
    </nav>

    <div class="spacer-2"></div>

    <div class="card shadow-sm">
      <div class="card-body">

        <div class="form-group">

        <div class="form-group">
          <label for="nama_lengkap">Nama Lengkap</label>
          <input type="text" class="form-control {{$errors->has('nama_lengkap') ? 'is-invalid' : ''}}" id="nama_lengkap" name="nama_lengkap" value="{{ $narasumber->nama_lengkap }}" disabled>
        </div>

          <label for="name">Username</label>
          <input type="text" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" id="username" name="username" value="{{ $narasumber->username }}" disabled>
        </div>
  
        <div class="form-group">
          <label for="email">E-Mail</label>
          <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="{{ $narasumber->email }}" disabled>
        </div>

        <div class="form-group">
          <label for="provinsi">Provinsi</label>
          <input type="text" class="form-control {{$errors->has('provinsi') ? 'is-invalid' : ''}}" id="provinsi" name="provinsi" value="{{ $narasumber->provinsi }}" disabled>
        </div>

        <div class="form-group">
          <label for="kota">Kota</label>
          <input type="text" class="form-control {{$errors->has('kota') ? 'is-invalid' : ''}}" id="kota" name="kota" value="{{ $narasumber->kota }}" disabled>
        </div>

        <div class="form-group">
          <label for="kecamatan">Kecamatan</label>
          <input type="text" class="form-control {{$errors->has('kecamatan') ? 'is-invalid' : ''}}" id="kecamatan" name="kecamatan" value="{{ $narasumber->kecamatan }}" disabled>
        </div>

        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control {{$errors->has('alamat') ? 'is-invalid' : ''}}" id="alamat" name="alamat" value="{{ $narasumber->alamat }}" disabled>
        </div>

        <div class="form-group">
          <label for="kodepos">kodepos</label>
          <input type="text" class="form-control {{$errors->has('kodepos') ? 'is-invalid' : ''}}" id="kodepos" name="kodepos" value="{{ $narasumber->kodepos }}" disabled>
        </div>

        <div class="spacer-2"></div>

        <div class="form-group">
          <a class="btn btn-secondary" href="{{ route('admin.narasumberpremium') }}" >Kembali</a>
        </div>

      </div>
    </div>

  </div>
@endsection