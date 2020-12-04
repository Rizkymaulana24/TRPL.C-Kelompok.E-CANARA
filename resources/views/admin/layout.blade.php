@extends('layouts.home')
<!-- <style>
body {background-image: linear-gradient(to bottom right, #3D4DAC, #F14494);
      background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center}
</style> -->
@section('sidebar')
  <div class="container">
    <ul class="nav nav-pills">
      <li class="nav-item my-1">
        <a class="nav-link {{ Request::is('admin') || Request::is('admin/profile*') ? 'active' : 'text-dark' }}" href="{{ route('admin') }}">Dashboard</a>
      </li>
      <button class="dropdown-btn btn dropdown-toggle text-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Data User
  </button>
  <div class="dropdown-container">
      <li class="nav-item my-1">
        <a class="nav-link {{ Request::is('admin/narasumber*') ? 'active' : 'text-dark' }}" href="{{ route('admin.narasumber') }}">Narasumber</a>
      </li>
      <li class="nav-item my-1">
        <a class="nav-link {{ Request::is('admin/penyelenggara*') ? 'active' : 'text-dark' }}" href="{{ route('admin.penyelenggara') }}">Penyelenggara</a>
      </li>
  </div>
      <li class="nav-item my-1">
        <a class="nav-link {{ Request::is('admin/kegiatan*') ? 'active' : 'text-dark' }}" href="{{ route('admin.kegiatan') }}">Kegiatan</a>
      </li>
    </ul>
  </div>
@endsection

@section('main')
  @yield('main')
@endsection

@section('script')
  @yield('script')
@endsection