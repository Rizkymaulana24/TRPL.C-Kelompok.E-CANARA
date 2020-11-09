@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        @component('components.card')
          @slot('header')
            Dashboard
          @endslot

          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

          Berhasil Masuk
        @endcomponent
      </div>
    </div>
  </div>
@endsection