@extends('penyelenggaraprem.layout')

@section('main')
  <div class="container">
    
    <div class="spacer-2"></div>

    <nav class="navbar navbar-light bg-light rounded text-dark shadow-sm">
      <span class="h3 m-0">Cari Narasumber</span>
    </nav>

    <div class="spacer-2"></div>

    <form class='form-inline d-flex justify-content-center md-form form-sm mt-0' action="{{ route('penyelenggaraprem.cari') }}" method="GET">
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
                    <a class="btn btn-outline-info btn-sm" href="{{ route('penyelenggaraprem.pencarian.show',['id' => $narasumber->id]) }}" role="button">Detail</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
        <div class="d-flex justify-content-between">
          <p>Menampilkan {{ $narasumbers->count() }} dari {{ $narasumbers->total() }} narasumber</p>
          <nav aria-label="Page navigation example">
            {{ $narasumbers->links('vendor.pagination.bootstrap') }}
          </nav>
        </div>

  </div>
@endsection