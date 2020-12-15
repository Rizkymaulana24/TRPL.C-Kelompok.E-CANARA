@extends('penyelenggaraprem.layout')

@section('main')
  <div class="container">
    
    <div class="spacer-2"></div>

    <nav class="navbar navbar-light bg-light rounded text-dark shadow-sm">
      <span class="h3 m-0">Data Kegiatan</span>
    </nav>

    <div class="spacer-2"></div>

    <div class="row">

      <!-- <div class="col-lg-9"> -->
        <div class="card shadow-sm">
          <div class="card-body">

            @include('components.flashsession')
    
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="text-center">No. </th>
                    <th scope="col" class="text-center">Nama Kegiatan</th>
                    <th scope="col" class="text-center">Deskripsi</th>
                    <th scope="col" class="text-center">Tanggal Kegiatan</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <th scope="row" class="text-center">{{ $kegiatan->id}}</th>
                      <td>{{ $kegiatan->namakegiatan }}</td>
                      <td>{{ $kegiatan->deskripsi }}</td>
                      <td>{{ $kegiatan->tglkegiatan }}</td>
                      <td>{{ $kegiatan->status }}</td>
                      <td>
                      <a class="btn btn-sm btn-outline-primary" href="{{ route('penyelenggaraprem.kegiatan.edit',['id' => $kegiatan->id]) }}" role="button">Ubah</a></td>
                    </tr>
                </tbody>
              </table>
            </div>

      <!-- <div class="col-lg-3">
        <div class="card shadow-sm">
          <div class="card-body">
            <a class="btn btn-sm btn-primary" href="{{ route('penyelenggaraprem.kegiatan.edit',['id' => $kegiatan->id]) }}" role="button">Ubah</a>
          </div> -->
          <div class="card-footer bg-light">
            <a class="btn btn-sm btn-secondary float-right" href="{{ route('penyelenggaraprem.kegiatan') }}" >Kembali</a>
          </div>
        </div>
      </div>

    </div>

  </div>
@endsection