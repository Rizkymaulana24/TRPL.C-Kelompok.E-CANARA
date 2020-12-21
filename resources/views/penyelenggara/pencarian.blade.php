@extends('penyelenggara.layout')

@section('main')
  <div class="container">
    
    <div class="spacer-2"></div>

    <nav class="navbar navbar-light bg-light rounded text-dark shadow-sm">
      <span class="h3 m-0">Cari Narasumber</span>
    </nav>

    <div class="spacer-2"></div>

    <form class='form-inline d-flex justify-content-center md-form form-sm mt-0' action="{{ route('penyelenggara.cari') }}" method="GET">
	<input class='form-control form-control-sm ml-3 w-75' type="text" name="cari" placeholder="Cari Kegiatan .." value="{{ old('cari') }}"><br>
	<input class='btn btn-primary btn-rounded' type="submit" value="Cari">
</form>
    <div class="row">

      <div class="col-lg-9">
        <div class="card shadow-sm">
          <div class="card-body">

            @include('components.flashsession')
    
            <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="text-center">No.</th>
                <th scope="col" class="text-center">Nama</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($narasumbers as $narasumber)
                <tr>
                  <th scope="row" class="text-center">{{ $loop->iteration}}</th>
                  <td>{{ $narasumber->username }}</td>
                  <td>{{ $narasumber->email }}</td>
                  <td>
                    <div class="d-flex justify-content-center">
                    <a class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#detailmodal" role="button">Detail</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  </div>

      <!-- Modal -->
      <div class="modal fade" id="detailmodal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Akses Ditolak</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Mohon Maaf, Akun free tidak dapat menikmati fitur akun premium ini. Segera beralih ke akun premium jika ingin mendapatkan fitur ini</p>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
@endsection