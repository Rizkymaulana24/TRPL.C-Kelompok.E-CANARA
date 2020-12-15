@extends('penyelenggaraprem.layout')

@section('main')
  <div class="container">
    
    <div class="spacer-2"></div>

    <nav class="navbar navbar-light bg-light rounded text-dark shadow-sm">
      <span class="h3 m-0">Buat Kegiatan Baru</span>
    </nav>

    <div class="spacer-2"></div>

    <div class="row">

      <div class="col-lg-9">

        <div class="card shadow-sm">
          <div class="card-body">
    
            <form id="create-form" action="{{ route('penyelenggaraprem.kegiatan.store') }}" method="POST">
              {{ csrf_field() }}
    
              <div class="form-group">
                <label for="namakegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control {{$errors->has('namakegiatan') ? 'is-invalid' : ''}}" id="namakegiatan" name="namakegiatan" value="{{ old('namakegiatan') }}" aria-describedby="namakegiatanFeedback" autofocus>
                @if ($errors->has('namakegiatan'))
                  <div id="namakegiatanFeedback" class="invalid-feedback">
                    <strong>{{ $errors->first('namakegiatan') }}</strong>
                  </div>
                @endif
              </div>
        
              <div class="form-group">
                <label for="deskripsi">Deskripsi Kegiatan</label>
                <textarea class="form-control {{$errors->has('deskripsi') ? 'is-invalid' : ''}}" name="deskripsi" id="deskripsi" cols="30" rows="10" aria-describedby="deskripsiFeedback">{{ old('deskripsi') }}</textarea>
                @if ($errors->has('deskripsi'))
                  <div id="deskripsiFeedback" class="invalid-feedback">
                    <strong>{{ $errors->first('deskripsi') }}</strong>
                  </div>
                @endif
              </div>
    
              <div class="form-group">
                <label for="tglkegiatan">Tanggal Kegiatan</label>
                <input type="date" class="form-control {{$errors->has('tglkegiatan') ? 'is-invalid' : ''}}" id="tglkegiatan" name="tglkegiatan" value="{{ old('tglkegiatan') }}" aria-describedby="tglkegiatanFeedback">
                @if ($errors->has('tglkegiatan'))
                  <div id="tglkegiatanFeedback" class="invalid-feedback">
                    <strong>{{ $errors->first('tglkegiatan') }}</strong>
                  </div>
                @endif
              </div>
              
            </form>
    
          </div>
        </div>

      </div>

      <div class="col-lg-3">

        <div class="card shadow-sm">
          <div class="card-body">
            <a class="btn btn-sm btn-primary" role="button" onclick="event.preventDefault(); document.getElementById('create-form').submit();">Simpan</a>
          </div>
          <div class="card-footer bg-light">
            <a class="btn btn-sm btn-secondary" href="{{ route('penyelenggaraprem.kegiatan') }}" >Batal</a>
          </div>
        </div>

      </div>

    </div>

  </div>
@endsection