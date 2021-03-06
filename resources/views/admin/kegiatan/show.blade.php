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
                    <tr>
                      <th scope="row" class="text-center">{{ $kegiatan->id}}</th>
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
                      <td>
                  <div class="btn btn-sm">
                  <a class='text-success' href="{{ $kegiatan->approved == 'Approved' ? route('admin.kegiatan.decline',$kegiatan->id) : route('admin.kegiatan.approve',$kegiatan->id) }}">{{ $kegiatan->approved == 'Approved' ? 'Reject' : 'Approve' }}</a><br>
                  <a class='text-danger' href="{{ $kegiatan->declined == 'Declined' ? route('admin.kegiatan.approve',$kegiatan->id) : route('admin.kegiatan.decline',$kegiatan->id) }}">{{ $kegiatan->declined == 'Declined' ? 'Reject' : 'Decline' }}</a><br>
                  </div></td>
                    </tr>
                </tbody>
              </table>
            </div>
            </div>
            <div class="card-footer bg-light">
            <a class="btn btn-sm btn-secondary float-right" href="{{ route('admin.kegiatan') }}" >Kembali</a>
            </div>

  </div>
@endsection