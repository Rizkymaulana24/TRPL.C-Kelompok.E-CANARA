@extends('penyelenggara.layout')

@section('main')
  <div class="container">

    <div class="spacer-2"></div>

    <nav class="navbar navbar-light rounded text-dark shadow-sm">
      <span class="h3 m-0">Profil Saya</span>
    </nav>

    <div class="spacer-2"></div>

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    @if (session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <div class="card shadow-sm">
      <div class="card-body">

        <div class="form-group">

        <div class="form-group">
          <label for="nama_lengkap">Nama Lengkap</label>
          <input type="text" class="form-control {{$errors->has('nama_lengkap') ? 'is-invalid' : ''}}" id="nama_lengkap" name="nama_lengkap" value="{{ $user->nama_lengkap }}" disabled>
        </div>

          <label for="name">Username</label>
          <input type="text" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" id="username" name="username" value="{{ $user->username }}" disabled>
        </div>
  
        <div class="form-group">
          <label for="email">E-Mail</label>
          <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="{{ $user->email }}" disabled>
        </div>

        <div class="form-group">
          <label for="provinsi">Provinsi</label>
          <input type="text" class="form-control {{$errors->has('provinsi') ? 'is-invalid' : ''}}" id="provinsi" name="provinsi" value="{{ $user->provinsi }}" disabled>
        </div>

        <div class="form-group">
          <label for="kota">Kota</label>
          <input type="text" class="form-control {{$errors->has('kota') ? 'is-invalid' : ''}}" id="kota" name="kota" value="{{ $user->kota }}" disabled>
        </div>

        <div class="form-group">
          <label for="kecamatan">Kecamatan</label>
          <input type="text" class="form-control {{$errors->has('kecamatan') ? 'is-invalid' : ''}}" id="kecamatan" name="kecamatan" value="{{ $user->kecamatan }}" disabled>
        </div>

        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control {{$errors->has('alamat') ? 'is-invalid' : ''}}" id="alamat" name="alamat" value="{{ $user->alamat }}" disabled>
        </div>

        <div class="form-group">
          <label for="kodepos">Kode Pos</label>
          <input type="text" class="form-control {{$errors->has('kodepos') ? 'is-invalid' : ''}}" id="kodepos" name="kodepos" value="{{ $user->kodepos }}" disabled>
        </div>

        <div class="form-group">
          <label for="nomor_hp">Nomor HP</label>
          <input type="text" class="form-control {{$errors->has('nomor_hp') ? 'is-invalid' : ''}}" id="nomor_hp" name="nomor_hp" value="{{ $user->nomor_hp }}" disabled>
        </div>

        <div class="form-group">
          <label for="nomor_wa">Nomor Wa</label>
          <input type="text" class="form-control {{$errors->has('nomor_wa') ? 'is-invalid' : ''}}" id="nomor_wa" name="nomor_wa" value="{{ $user->nomor_wa }}" disabled>
        </div>

        <div class="form-group">
          <label for="nama_penanggungjawab">Nama Penanggungjawab</label>
          <input type="text" class="form-control {{$errors->has('nama_penanggungjawab') ? 'is-invalid' : ''}}" id="nama_penanggungjawab" name="nama_penanggungjawab" value="{{ $user->nama_penanggungjawab }}" disabled>
        </div>

        <div class="form-group">
          <label for="jabatan_penanggungjawab">Jabatan Penanggungjawab</label>
          <input type="text" class="form-control {{$errors->has('jabatan_penanggungjawab') ? 'is-invalid' : ''}}" id="jabatan_penanggungjawab" name="jabatan_penanggungjawab" value="{{ $user->jabatan_penanggungjawab }}" disabled>
        </div>
        
        <table class="table table-bordered table-hover table-striped">
          <thead>
            <tr>
              <th>Logo</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> 
                <img src="{{ asset('uploads/logo_penyelenggara/'.$user->logo_penyelenggara) }}" style="height:120px; width:200px"/>
              </td>
            </tr>
          </tbody>
        </table>
        
        <table class="table table-bordered table-hover table-striped">
          <thead>
            <tr>
              <th>Scan Struktur Kepengurusan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> 
                <img src="{{ asset('uploads/scan_strukturkepengurusan/'.$user->scan_strukturkepengurusan) }}" style="height:120px; width:200px"/>
              </td>
            </tr>
          </tbody>
        </table>

        <div class="form-group">
          <label for="jenis_identitaspenanggungjawab">Jenis Identitas Penanggungjawab</label>
          <input type="text" class="form-control {{$errors->has('jenis_identitaspenanggungjawab') ? 'is-invalid' : ''}}" id="jenis_identitaspenanggungjawab" name="jenis_identitaspenanggungjawab" value="{{ $user->jenis_identitaspenanggungjawab }}" disabled>
        </div>
        
        <table class="table table-bordered table-hover table-striped">
          <thead>
            <tr>
              <th>Scan Identitas Penanggungjawab</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> 
                <img src="{{ asset('uploads/scan_identitaspenanggungjawab/'.$user->scan_identitaspenanggungjawab) }}" style="height:120px; width:200px"/>
              </td>
            </tr>
          </tbody>
        </table>

        <div class="spacer-2"></div>

        <div class="form-group">
          <div class="d-flex justify-content-between">
            <div>
              <a class="btn btn-secondary" href="{{ route('penyelenggara') }}" >Kembali</a>
            </div>
            <div>
              <a class="btn btn-outline-primary" href="{{ route('penyelenggara.password') }}" >Ubah Password</a>
              <a class="btn btn-primary" href="{{ route('penyelenggara.edit') }}" role="button">Edit</a>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
@endsection