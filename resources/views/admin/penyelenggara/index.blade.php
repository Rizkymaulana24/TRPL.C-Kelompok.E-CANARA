@extends('admin.layout')

@section('main')
  <div class="container">
    
    <div class="spacer-2"></div>

    <nav class="navbar navbar-light bg-light text-dark rounded shadow-sm">
      <span class="h3 m-0">Data penyelenggara</span>
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

    <div class="card shadow-sm">
      <div class="card-body">

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
              @foreach ($penyelenggaras as $penyelenggara)
                <tr>
                  <th scope="row" class="text-center">{{ $loop->iteration}}</th>
                  <td>{{ $penyelenggara->nama_lengkap }}</td>
                  <td>{{ $penyelenggara->email }}</td>
                  <td>
                    <div class="d-flex justify-content-center">
                    <a class="btn btn-outline-info btn-sm" href="{{ route('admin.penyelenggarafree.show',['id' => $penyelenggara->id]) }}" role="button">Detail</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
        <div class="d-flex justify-content-between">
          <p>Menampilkan {{ $penyelenggaras->count() }} dari {{ $penyelenggaras->total() }} penyelenggara</p>
          <nav aria-label="Page navigation example">
            {{ $penyelenggaras->links('vendor.pagination.bootstrap') }}
          </nav>
        </div>

      </div>
    </div>

  </div>
@endsection