@extends('narasumberprem.layout')

@section('main')
  <div class="container">
    
    <div class="spacer-2"></div>

    <nav class="navbar navbar-light bg-light rounded text-dark shadow-sm">
      <span class="h3 m-0">Data Kegiatan</span>
    </nav>

    <div class="spacer-2"></div>

    <form class='form-inline d-flex justify-content-center md-form form-sm mt-0' action="{{ route('narasumberprem.cari') }}" method="GET">
	<input class='form-control form-control-sm ml-3 w-75' type="text" name="cari" placeholder="Cari Kegiatan .." value="{{ old('cari') }}"><br>
	<input class='btn btn-primary btn-rounded' type="submit" value="Cari">
</form>
    <div class="row">

      <div class="col-lg-12">
        <div class="card shadow-sm">
          <div class="card-body">

            @include('components.flashsession')
    
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="text-center">No. </th>
                    <th scope="col" class="text-center">Nama Kegiatan</th>
                    <th scope="col" class="text-center">Tanggal Pelaksanaan</th>
                    <th scope="col" class="text-center">Waktu Pelaksanaan</th>
                    <th scope="col" class="text-center">Alamat</th>
                    <th scope="col" class="text-center">Jenis Kegiatan</th>
                    <th scope="col" class="text-center">Kategori</th>
                    <th scope="col" class="text-center">Tingkat</th>
                    <th scope="col" class="text-center">Deskripsi</th>
                    <th scope="col" class="text-center">Scan Proposal</th>
                    <th scope="col" class="text-center">Nama Penanggung Jawab</th>
                    <th scope="col" class="text-center">Jabatan Penanggung Jawab</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kegiatans as $kegiatan)
                    <tr>
                      <th scope="row" class="text-center">{{ $loop->iteration}}</th>
                      <td>{{ $kegiatan->namakegiatan }}</td>
                      <td>{{ $kegiatan->tanggalpelaksanaan }}</td>
                      <td>{{ $kegiatan->waktu_pelaksanaan }}</td>
                      <td>{{ str_limit($kegiatan->alamatkegiatan,15) }}</td>
                      <td>{{ $kegiatan->jenis }}</td>
                      <td>{{ $kegiatan->kategori }}</td>
                      <td>{{ $kegiatan->tingkat }}</td>
                      <td>{{ str_limit($kegiatan->deskripsi, 25) }}</td>
                      <td>{{ $kegiatan->scan_proposalkegiatan }}</td>
                      <td>{{ $kegiatan->nama_penanggungjawab }}</td>
                      <td>{{ $kegiatan->jabatan_penanggungjawab }}</td>
                      <td>
                  <a class="btn btn-sm btn-link" href="{{ route('narasumberprem.pencarian.show',['id' => $kegiatan->id]) }}" role="button">Detail</a>
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
    </div>

  </div>
@endsection