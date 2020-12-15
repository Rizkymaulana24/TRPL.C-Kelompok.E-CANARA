@extends('penyelenggara.layout')

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
    
            <form id="create-form" action="{{ route('penyelenggara.kegiatan.store') }}" method="POST">
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
                <label for="tanggalpelaksanaan">Tanggal Pelaksanaan</label>
                <input type="date" class="form-control {{$errors->has('tanggalpelaksanaan') ? 'is-invalid' : ''}}" id="tanggalpelaksanaan" name="tanggalpelaksanaan" value="{{ old('tanggalpelaksanaan') }}" aria-describedby="tanggalpelaksanaanFeedback">
                @if ($errors->has('tanggalpelaksanaan'))
                  <div id="tanggalpelaksanaanFeedback" class="invalid-feedback">
                    <strong>{{ $errors->first('tanggalpelaksanaan') }}</strong>
                  </div>
                @endif
              </div>
    
              <div class="form-group">
                <label for="waktu_pelaksanaan">Waktu Kegiatan</label>
                <input type="time" class="form-control {{$errors->has('waktu_pelaksanaan') ? 'is-invalid' : ''}}" id="waktu_pelaksanaan" name="waktu_pelaksanaan" value="{{ old('waktu_pelaksanaan') }}" aria-describedby="waktu_pelaksanaanFeedback" autofocus>
                @if ($errors->has('waktu_pelaksanaan'))
                  <div id="waktu_pelaksanaanFeedback" class="invalid-feedback">
                    <strong>{{ $errors->first('waktu_pelaksanaan') }}</strong>
                  </div>
                @endif
              </div>
    
              <div class="form-group">
                <label for="alamatkegiatan">Alamat Kegiatan</label>
                <input type="text" class="form-control {{$errors->has('alamatkegiatan') ? 'is-invalid' : ''}}" id="alamatkegiatan" name="alamatkegiatan" value="{{ old('alamatkegiatan') }}" aria-describedby="alamatkegiatanFeedback" autofocus>
                @if ($errors->has('alamatkegiatan'))
                  <div id="alamatkegiatanFeedback" class="invalid-feedback">
                    <strong>{{ $errors->first('alamatkegiatan') }}</strong>
                  </div>
                @endif
              </div>
    
              <div class="form-group">
                <label for="jenis">Jenis Kegiatan</label>
                <input type="text" class="form-control {{$errors->has('jenis') ? 'is-invalid' : ''}}" id="jenis" name="jenis" value="{{ old('jenis') }}" aria-describedby="jenisFeedback" autofocus>
                @if ($errors->has('jenis'))
                  <div id="jenisFeedback" class="invalid-feedback">
                    <strong>{{ $errors->first('jenis') }}</strong>
                  </div>
                @endif
              </div>

        <div class="form-group">
          <label for="kategori">Kategori</label>
        <select name="kategori" id="kategori" class="form-control {{$errors->has('kategori') ? 'is-invalid' : ''}}" id="kategori" name="kategori" value="{{ old('kategori') }}" aria-describedby="kategoriFeedback" autofocus>
          <option value="pilih">pilih</option>
          <option value="Seminar">Seminar</option>
          <option value="Webinar">Webinar</option>
          <option value="Workshop">Workshop</option>
          <option value="Pelatihan">Pelatihan</option>
          <option value="Talkshow">Talkshow</option>
          <option value="Kuliah">Kuliah</option>
          <option value="Diskusi">Diskusi</option>
          <option value="Kajian">Kajian</option>
          <option value="Keagamaan">Keagamaan</option>
        </select>
        @if ($errors->has('kategori'))
                  <div id="kategoriFeedback" class="invalid-feedback">
                    <strong>{{ $errors->first('kategori') }}</strong>
                  </div>
                @endif
        </div>

        <div class="form-group">
          <label for="tingkat">Tingkat</label>
        <select name="tingkat" id="tingkat" class="form-control {{$errors->has('tingkat') ? 'is-invalid' : ''}}" id="tingkat" name="tingkat" value="{{ old  ('tingkat') }}" aria-describedby="tingkatFeedback" autofocus>
          <option value="pilih">pilih</option>
          <option value="Nasional">Nasional</option>
          <option value="Regional">Regional</option>
          <option value="Kabupaten/Kota">Kabupaten/Kota</option>
          <option value="Kecamatan">Kecamatan</option>
          <option value="Desa">Desa</option>
          <option value="Khusus">Khusus</option>
        </select>
        @if ($errors->has('tingkat'))
                  <div id="tingkatFeedback" class="invalid-feedback">
                    <strong>{{ $errors->first('tingkat') }}</strong>
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

          <label for="scan_proposal">Scan Proposal</label>
          <div class="input-group">
            <input type="file" class="custom-file-input {{$errors->has('scan_proposal') ? 'is-invalid' : ''}}" id="scan_proposal" name="scan_proposal" value="{{ old('scan_proposal') }}" aria-describedby="scan_proposalFeedback">
            <label for="scan_proposal" class='custom-file-label'>Upload File</label>
            @if ($errors->has('scan_proposal'))
              <div id="scan_proposalFeedback" class="invalid-feedback">
                <strong>{{ $errors->first('scan_proposal') }}</strong>
              </div>
            @endif
          </div>
    
              <div class="form-group">
                <label for="nama_penanggungjawab">Nama Penanggung Jawab</label>
                <input type="text" class="form-control {{$errors->has('nama_penanggungjawab') ? 'is-invalid' : ''}}" id="nama_penanggungjawab" name="nama_penanggungjawab" value="{{ old('nama_penanggungjawab') }}" aria-describedby="nama_penanggungjawabFeedback" autofocus>
                @if ($errors->has('nama_penanggungjawab'))
                  <div id="nama_penanggungjawabFeedback" class="invalid-feedback">
                    <strong>{{ $errors->first('nama_penanggungjawab') }}</strong>
                  </div>
                @endif
              </div>
    
              <div class="form-group">
                <label for="jabatan_penanggungjawab">jabatan Penanggung Jawab</label>
                <input type="text" class="form-control {{$errors->has('jabatan_penanggungjawab') ? 'is-invalid' : ''}}" id="jabatan_penanggungjawab" name="jabatan_penanggungjawab" value="{{ old('jabatan_penanggungjawab') }}" aria-describedby="jabatan_penanggungjawabFeedback" autofocus>
                @if ($errors->has('jabatan_penanggungjawab'))
                  <div id="jabatan_penanggungjawab" class="invalid-feedback">
                    <strong>{{ $errors->first('jabatan_penanggungjawab') }}</strong>
                  </div>
                @endif
              </div>
    
              <div class="form-group">
                <label for="nomor_hp">Nomor HP</label>
                <input type="text" class="form-control {{$errors->has('nomor_hp') ? 'is-invalid' : ''}}" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}" aria-describedby="nomor_hpFeedback" autofocus>
                @if ($errors->has('nomor_hp'))
                  <div id="nomor_hp" class="invalid-feedback">
                    <strong>{{ $errors->first('nomor_hp') }}</strong>
                  </div>
                @endif
              </div>
    
              <div class="form-group">
                <label for="nomor_wa">Nomor WA</label>
                <input type="text" class="form-control {{$errors->has('nomor_wa') ? 'is-invalid' : ''}}" id="nomor_wa" name="nomor_wa" value="{{ old('nomor_wa') }}" aria-describedby="nomor_waFeedback" autofocus>
                @if ($errors->has('nomor_wa'))
                  <div id="nomor_wa" class="invalid-feedback">
                    <strong>{{ $errors->first('nomor_wa') }}</strong>
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
            <a class="btn btn-sm btn-secondary" href="{{ route('penyelenggara.kegiatan') }}" >Batal</a>
          </div>
        </div>

      </div>

    </div>

  </div>
@endsection