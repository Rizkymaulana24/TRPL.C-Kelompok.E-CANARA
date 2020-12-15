@extends('penyelenggaraprem.layout')

@section('main')
  <div class="container">
    
    <div class="spacer-2"></div>

    <nav class="navbar navbar-light bg-light rounded text-dark shadow-sm">
      <span class="h3 m-0">Data Kegiatan</span>
    </nav>

    <div class="spacer-2"></div>

    <div class="row">

      <div class="col-lg-9">
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
                  @foreach ($kegiatans as $kegiatan)
                    <tr>
                      <th scope="row" class="text-center">{{ $loop->iteration}}</th>
                      <td>{{ $kegiatan->namakegiatan }}</td>
                      <td>{{ str_limit($kegiatan->deskripsi, 150) }}</td>
                      <td>{{ $kegiatan->tglkegiatan }}</td>
                      <td>{{ $kegiatan->status }}</td>
                      <td>
                  <a class="btn btn-sm btn-link" href="{{ route('penyelenggaraprem.kegiatan.show',['id' => $kegiatan->id]) }}" role="button">Detail</a>
                  <a class="btn btn-sm btn-outline-primary" href="{{ route('penyelenggaraprem.kegiatan.edit',['id' => $kegiatan->id]) }}" role="button">Ubah</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
    
            <div class="d-flex justify-content-between">
              <p>Menampilkan {{ $kegiatans->count() }} dari {{ $kegiatans->total() }} kegiatan</p>
              <nav aria-label="Page navigation example">
                {{ $kegiatans->links('vendor.pagination.bootstrap') }}
              </nav>
            </div>
    
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="card">
          <div class="card-body">

            <a class="btn btn-primary btn-sm" href="{{ route('penyelenggaraprem.kegiatan.create') }}" role="button">Input</a>
            
          </div>
        </div>
      </div>

    </div>

  </div>
@endsection