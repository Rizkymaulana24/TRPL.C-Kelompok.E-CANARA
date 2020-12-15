@extends('admin.layout')

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
                    <th scope="col" class="text-center">nomor_hp</th>
                    <th scope="col" class="text-center">nomor_wa</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kegiatans->reverse() as $kegiatan)
                    <tr>
                      <th scope="row" class="text-center">{{ $loop->iteration}}</th>
                      <td>{{ $kegiatan->namakegiatan }}</td>
                      <td>{{ $kegiatan->tanggalpelaksanaan }}</td>
                      <td>{{ $kegiatan->waktu_pelaksanaan }}</td>
                      <td>{{ $kegiatan->alamatkegiatan }}</td>
                      <td>{{ $kegiatan->jenis }}</td>
                      <td>{{ $kegiatan->kategori }}</td>
                      <td>{{ $kegiatan->tingkat }}</td>
                      <td>{{ str_limit($kegiatan->deskripsi, 150) }}</td>
                      <td>{{ $kegiatan->scan_proposalkegiatan }}</td>
                      <td>{{ $kegiatan->nama_penanggungjawab }}</td>
                      <td>{{ $kegiatan->jabatan_penanggungjawab }}</td>
                      <td>{{ $kegiatan->nomor_hp }}</td>
                      <td>{{ $kegiatan->nomor_wa }}</td>
                      <td>{{ $kegiatan->status }}</td>
                      <!-- <td><a role="button" class="dropdown-item" data-toggle="modal" data-target="#verifModal">{{ $kegiatan->status }}</a></td> -->
                      <td><a href="{{ route('admin.kegiatan.show',['id' => $kegiatan->id]) }}" role="button">Detail</a></td>
                  <!-- <a class="btn btn-sm btn-link" href="{{ route('admin.kegiatan.edit',['id' => $kegiatan->id]) }}" role="button">Ubah</a></td> -->
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

        <!-- Modal -->
  <div class="modal fade" id="verifModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Verifikasi Kegiatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <a class="btn btn-danger" type="button" href="{{ route('admin.kegiatan') }}" onclick="event.preventDefault(); document.getElementById('decline-form').submit();">Decline</a>
          <form id="decline-form" action="{{ route('admin.kegiatan') }}" method="PUT" style="display: none;">
            {{ csrf_field() }}
          </form>
          <a class="btn btn-success" type="button" href="{{ route('admin.kegiatan') }}" onclick="event.preventDefault(); document.getElementById('approve-form').submit();">Approve</a>
          <form id="approve-form" action="{{ route('admin.kegiatan') }}" method="PUT" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
      </div>
    </div>
  </div>



<!-- 
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body">

            <a class="btn btn-primary btn-sm" href="{{ route('admin.kegiatan.create') }}" role="button">Siaran baru</a>
            
          </div>
        </div>
      </div> -->

    </div>

  </div>
@endsection