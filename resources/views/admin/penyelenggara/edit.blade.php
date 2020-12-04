@extends('admin.layout')

@section('main')
  <div class="container">

    <div class="spacer-2"></div>

    <nav class="navbar navbar-light bg-light rounded text-dark shadow-sm">
      <span class="h3 m-0">Edit Profil Petani</span>
    </nav>

    <div class="spacer-2"></div>

    <div class="card shadow-sm">
      <div class="card-body">

        <form action="{{ route('admin.narasumber.update',['id' => $narasumber->id]) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
    
    <div class="form-group">
      <label for="nama_lengkap">Nama lengkap</label>
      <input type="text" class="form-control {{$errors->has('nama_lengkap') ? 'is-invalid' : ''}}" id="nama_lengkap" name="nama_lengkap" value="{{ $narasumber->nama_lengkap }}" aria-describedby="nama_lengkapFeedback">
      @if ($errors->has('nama_lengkap'))
        <div id="nama_lengkapFeedback" class="invalid-feedback">
          <strong>{{ $errors->first('nama_lengkap') }}</strong>
        </div>
      @endif
    </div>

    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" id="username" name="username" value="{{ $narasumber->username }}" aria-describedby="usernameFeedback">
      @if ($errors->has('username'))
        <div id="usernameFeedback" class="invalid-feedback">
          <strong>{{ $errors->first('username') }}</strong>
        </div>
      @endif
    </div>

    <div class="form-group">
      <label for="email">E-Mail</label>
      <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="{{ $narasumber->email }}" aria-describedby="emailFeedback">
      @if ($errors->has('email'))
        <div id="emailFeedback" class="invalid-feedback">
          <strong>{{ $errors->first('email') }}</strong>
        </div>
      @endif
    </div>

    <div class="form-group">
      <label for="provinsi">Provinsi</label>
      <input type="text" class="form-control {{$errors->has('provinsi') ? 'is-invalid' : ''}}" id="provinsi" name="provinsi" value="{{ $narasumber->provinsi }}" aria-describedby="provinsiFeedback">
      @if ($errors->has('provinsi'))
        <div id="provinsiFeedback" class="invalid-feedback">
          <strong>{{ $errors->first('provinsi') }}</strong>
        </div>
      @endif
    </div>

    <div class="form-group">
      <label for="kota">Kota</label>
      <input type="text" class="form-control {{$errors->has('kota') ? 'is-invalid' : ''}}" id="kota" name="kota" value="{{ $narasumber->kota }}" aria-describedby="kotaFeedback">
      @if ($errors->has('kota'))
        <div id="kotaFeedback" class="invalid-feedback">
          <strong>{{ $errors->first('kota') }}</strong>
        </div>
      @endif
    </div>

    <div class="form-group">
      <label for="kecamatan">Kecamatan</label>
      <input type="text" class="form-control {{$errors->has('kecamatan') ? 'is-invalid' : ''}}" id="kecamatan" name="kecamatan" value="{{ $narasumber->kecamatan }}" aria-describedby="kecamatanFeedback">
      @if ($errors->has('kecamatan'))
        <div id="kecamatanFeedback" class="invalid-feedback">
          <strong>{{ $errors->first('kecamatan') }}</strong>
        </div>
      @endif
    </div>

    <div class="form-group">
      <label for="alamat">Alamat</label>
      <input type="text" class="form-control {{$errors->has('alamat') ? 'is-invalid' : ''}}" id="alamat" name="alamat" value="{{ $narasumber->alamat }}" aria-describedby="alamatFeedback">
      @if ($errors->has('alamat'))
        <div id="alamatFeedback" class="invalid-feedback">
          <strong>{{ $errors->first('alamat') }}</strong>
        </div>
      @endif
    </div>

    <div class="form-group">
      <label for="kodepos">Kode Pos</label>
      <input type="text" class="form-control {{$errors->has('kodepos') ? 'is-invalid' : ''}}" id="kodepos" name="kodepos" value="{{ $narasumber->kodepos }}" aria-describedby="kodeposFeedback">
      @if ($errors->has('kodepos'))
        <div id="kodeposFeedback" class="invalid-feedback">
          <strong>{{ $errors->first('kodepos') }}</strong>
        </div>
      @endif
    </div>

          <div class="spacer-2"></div>
    
          <div class="form-group">
            <a class="btn btn-secondary" href="{{ route('admin.narasumber.show',['id' => $narasumber->id]) }}" >Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
          
        </form>

      </div>
    </div>

  </div>
@endsection