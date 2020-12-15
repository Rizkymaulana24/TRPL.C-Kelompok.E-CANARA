@extends('penyelenggara.layout')

@section('main')
  <div class="container">

    <div class="spacer-2"></div>

    <nav class="navbar navbar-light bg-light rounded text-dark shadow-sm">
      <span class="h3 m-0">Edit Profil Saya</span>
    </nav>

    <div class="spacer-2"></div>

    <div class="card shadow-sm">
      <div class="card-body">

        <form action="{{ route('penyelenggara.update') }}" method="POST" enctype='multipart/form-data'>
          {{ csrf_field() }}
          {{ method_field('PUT') }}
    
          <div class="form-group">
            <label for="nama_lengkap">Nama lengkap</label>
            <input type="text" class="form-control {{$errors->has('nama_lengkap') ? 'is-invalid' : ''}}" id="nama_lengkap" name="nama_lengkap" value="{{ $user->nama_lengkap }}" aria-describedby="nama_lengkapFeedback">
            @if ($errors->has('nama_lengkap'))
              <div id="nama_lengkapFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('nama_lengkap') }}</strong>
              </div>
            @endif
          </div>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" id="username" name="username" value="{{ $user->username }}" aria-describedby="usernameFeedback">
            @if ($errors->has('username'))
              <div id="usernameFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('username') }}</strong>
              </div>
            @endif
          </div>
    
          <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="{{ $user->email }}" aria-describedby="emailFeedback">
            @if ($errors->has('email'))
              <div id="emailFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
              </div>
            @endif
          </div>

          <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <input type="text" class="form-control {{$errors->has('provinsi') ? 'is-invalid' : ''}}" id="provinsi" name="provinsi" value="{{ $user->provinsi }}" aria-describedby="provinsiFeedback">
            @if ($errors->has('provinsi'))
              <div id="provinsiFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('provinsi') }}</strong>
              </div>
            @endif
          </div>

          <div class="form-group">
            <label for="kota">Kota</label>
            <input type="text" class="form-control {{$errors->has('kota') ? 'is-invalid' : ''}}" id="kota" name="kota" value="{{ $user->kota }}" aria-describedby="kotaFeedback">
            @if ($errors->has('kota'))
              <div id="kotaFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('kota') }}</strong>
              </div>
            @endif
          </div>

          <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" class="form-control {{$errors->has('kecamatan') ? 'is-invalid' : ''}}" id="kecamatan" name="kecamatan" value="{{ $user->kecamatan }}" aria-describedby="kecamatanFeedback">
            @if ($errors->has('kecamatan'))
              <div id="kecamatanFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('kecamatan') }}</strong>
              </div>
            @endif
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control {{$errors->has('alamat') ? 'is-invalid' : ''}}" id="alamat" name="alamat" value="{{ $user->alamat }}" aria-describedby="alamatFeedback">
            @if ($errors->has('alamat'))
              <div id="alamatFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('alamat') }}</strong>
              </div>
            @endif
          </div>

          <div class="form-group">
            <label for="kodepos">Kode Pos</label>
            <input type="text" class="form-control {{$errors->has('kodepos') ? 'is-invalid' : ''}}" id="kodepos" name="kodepos" value="{{ $user->kodepos }}" aria-describedby="kodeposFeedback">
            @if ($errors->has('kodepos'))
              <div id="kodeposFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('kodepos') }}</strong>
              </div>
            @endif
          </div>

          <label for="foto">Foto</label>
          <div class="input-group">
            <input type="file" class="custom-file-input {{$errors->has('foto') ? 'is-invalid' : ''}}" id="foto" name="foto" value="{{ $user->foto }}" aria-describedby="fotoFeedback">
            <label for="foto" class='custom-file-label'>Pilih Foto</label>
            @if ($errors->has('foto'))
              <div id="fotoFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('foto') }}</strong>
              </div>
            @endif
          </div>

        <div class="form-group">
          <label for="jenis_identitas">Jenis Identitas</label>
        <select class="form-control {{$errors->has('jenis_identitas') ? 'is-invalid' : ''}}" id="jenis_identitas" name="jenis_identitas" value="{{ $user->jenis_identitas }}" aria-describedby="jenis_identitasFeedback">
          <option value="pilih">pilih</option>
          <option value="ktp">ktp</option>
          <option value="sim">sim</option>
          <option value="passport">passport</option>
          <option value="npwp">npwp</option>
        </select>
        </div>

          <div class="spacer-2"></div>
    
          <div class="form-group">
            <a class="btn btn-secondary" href="{{ route('penyelenggara.profile') }}" >Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
          
        </form>

      </div>
    </div>

  </div>
@endsection