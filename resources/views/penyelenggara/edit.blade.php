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

          <div class="form-group">
            <label for="nomor_hp">Nomor HP</label>
            <input type="text" class="form-control {{$errors->has('nomor_hp') ? 'is-invalid' : ''}}" id="nomor_hp" name="nomor_hp" value="{{ $user->nomor_hp }}" aria-describedby="nomor_hpFeedback">
            @if ($errors->has('nomor_hp'))
              <div id="nomor_hpFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('nomor_hp') }}</strong>
              </div>
            @endif
          </div>

          <div class="form-group">
            <label for="nomor_wa">Nomor WA</label>
            <input type="text" class="form-control {{$errors->has('nomor_wa') ? 'is-invalid' : ''}}" id="nomor_wa" name="nomor_wa" value="{{ $user->nomor_wa }}" aria-describedby="nomor_waFeedback">
            @if ($errors->has('nomor_wa'))
              <div id="nomor_waFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('nomor_wa') }}</strong>
              </div>
            @endif
          </div>

          <div class="form-group">
            <label for="nama_penanggungjawab">Nama Penanggungjawab</label>
            <input type="text" class="form-control {{$errors->has('nama_penanggungjawab') ? 'is-invalid' : ''}}" id="nama_penanggungjawab" name="nama_penanggungjawab" value="{{ $user->nama_penanggungjawab }}" aria-describedby="nama_penanggungjawabFeedback">
            @if ($errors->has('nama_penanggungjawab'))
              <div id="nama_penanggungjawabFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('nama_penanggungjawab') }}</strong>
              </div>
            @endif
          </div>

          <div class="form-group">
            <label for="jabatan_penanggungjawab">Jabatan Penanggungjawab</label>
            <input type="text" class="form-control {{$errors->has('jabatan_penanggungjawab') ? 'is-invalid' : ''}}" id="jabatan_penanggungjawab" name="jabatan_penanggungjawab" value="{{ $user->jabatan_penanggungjawab }}" aria-describedby="jabatan_penanggungjawabFeedback">
            @if ($errors->has('jabatan_penanggungjawab'))
              <div id="jabatan_penanggungjawabFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('jabatan_penanggungjawab') }}</strong>
              </div>
            @endif
          </div>

          <label for="logo_penyelenggara">Logo Penyelenggara</label>
          <div class="input-group">
            <input type="file" class="custom-file-input {{$errors->has('logo_penyelenggara') ? 'is-invalid' : ''}}" id="logo_penyelenggara" name="logo_penyelenggara" value="{{ $user->logo_penyelenggara }}" aria-describedby="logo_penyelenggaraFeedback">
            <label for="logo_penyelenggara" class='custom-file-label'>Pilih Logo</label>
            @if ($errors->has('logo_penyelenggara'))
              <div id="logo_penyelenggaraFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('logo_penyelenggara') }}</strong>
              </div>
            @endif
          </div>

          <label for="scan_strukturkepengurusan">Scan Struktur Kepengurusan</label>
          <div class="input-group">
            <input type="file" class="custom-file-input {{$errors->has('scan_strukturkepengurusan') ? 'is-invalid' : ''}}" id="scan_strukturkepengurusan" name="scan_strukturkepengurusan" value="{{ $user->scan_strukturkepengurusan }}" aria-describedby="scan_strukturkepengurusanFeedback">
            <label for="scan_strukturkepengurusan" class='custom-file-label'>Pilih File</label>
            @if ($errors->has('scan_strukturkepengurusan'))
              <div id="scan_strukturkepengurusanFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('scan_strukturkepengurusan') }}</strong>
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

          <label for="scan_identitaspenanggungjawab">Scan Identitas Penanggungjawab</label>
          <div class="input-group">
            <input type="file" class="custom-file-input {{$errors->has('scan_identitaspenanggungjawab') ? 'is-invalid' : ''}}" id="scan_identitaspenanggungjawab" name="scan_identitaspenanggungjawab" value="{{ $user->scan_identitaspenanggungjawab }}" aria-describedby="scan_identitaspenanggungjawabFeedback">
            <label for="scan_identitaspenanggungjawab" class='custom-file-label'>Pilih File</label>
            @if ($errors->has('scan_identitaspenanggungjawab'))
              <div id="scan_identitaspenanggungjawabFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('scan_identitaspenanggungjawab') }}</strong>
              </div>
            @endif
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