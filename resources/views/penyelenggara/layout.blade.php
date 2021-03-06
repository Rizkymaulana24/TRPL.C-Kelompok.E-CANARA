@extends('layouts.home')
<!-- <style>
body {background-image: linear-gradient(to bottom right, #3D4DAC, #F14494);
      background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center}
</style> -->
@section('sidebar')
  <div class="container">
    <ul class="nav nav-pills flex-column">
      <li class="nav-item my-1">
        <a class="nav-link {{ Request::is('penyelenggara') || Request::is('penyelenggara/profile*') ? 'active' : 'text-dark' }}" href="{{ route('penyelenggara') }}">Home</a>
      </li>
      <li class="nav-item my-1">
        <a class="nav-link {{ Request::is('penyelenggara/kegiatan*') ? 'active' : 'text-dark' }}" href="{{ route('penyelenggara.kegiatan') }}">Data Kegiatan</a>
      </li>
      <li class="nav-item my-1">
        <a class="nav-link {{ Request::is('penyelenggara/pencarian*') ? 'active' : 'text-dark' }}" href="{{ route('penyelenggara.pencarian') }}">Cari Narasumber</a>
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