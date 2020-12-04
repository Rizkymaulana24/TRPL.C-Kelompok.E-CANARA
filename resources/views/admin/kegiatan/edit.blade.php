@extends('admin.layout')

@section('main')
  <div class="container">

    <div class="spacer-2"></div>

    <nav class="navbar navbar-light bg-light rounded text-dark shadow-sm">
      <span class="h3 m-0">Edit Data Siaran</span>
    </nav>

    <div class="spacer-2"></div>

    <div class="row">

      <div class="col-lg-9">

        <div class="card shadow-sm">
          <div class="card-body">
    
            <form id="edit-form" action="{{ route('admin.kegiatan.update',['id' => $kegiatan->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
        
              <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control {{$errors->has('status') ? 'is-invalid' : ''}}" id="status" name="status" value="{{ $kegiatan->status }}" aria-describedby="statusFeedback" autofocus>
                @if ($errors->has('status'))
                  <div id="statusFeedback" class="invalid-feedback">
                    <strong>{{ $errors->first('status') }}</strong>
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
            <a class="btn btn-sm btn-primary" role="button" onclick="event.preventDefault(); document.getElementById('edit-form').submit();">Simpan</a>
          </div>
          <div class="card-footer bg-light">
            <a class="btn btn-sm btn-secondary" href="{{ route('admin.kegiatan') }}" >Batal</a>
          </div>
        </div>

      </div>

    </div>

  </div>
@endsection