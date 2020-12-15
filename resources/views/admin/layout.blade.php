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
      <li class="nav-item my-1">
        <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="btn dropdown-btn dropdown-toggle text-dark">Data Akun Free </a>
        <ul class="collapse list-unstyled" id="pageSubmenu1">
          <li class="nav-item my-2">
            <a class="nav-link {{ Request::is('admin/narasumberfree*') ? 'active' : 'text-dark' }}" href="{{ route('admin.narasumberfree') }}">Data Narasumber</a>
          </li>
          <li class="nav-item my-1">
            <a class="nav-link {{ Request::is('admin/penyelenggarafree*') ? 'active' : 'text-dark' }}" href="{{ route('admin.penyelenggarafree') }}">Data Penyelenggara</a>
          </li>
        </ul>
      </li>
      <li class="nav-item my-1">
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="btn dropdown-btn dropdown-toggle text-dark">Data Akun Premium </a>
        <ul class="collapse list-unstyled" id="pageSubmenu">
          <li class="nav-item my-2">
            <a class="nav-link {{ Request::is('admin/narasumberpremium*') ? 'active' : 'text-dark' }}" href="{{ route('admin.narasumberpremium') }}">Data Narasumber</a>
          </li>
          <li class="nav-item my-1">
            <a class="nav-link {{ Request::is('admin/penyelenggarapremium*') ? 'active' : 'text-dark' }}" href="{{ route('admin.penyelenggarapremium') }}">Data Penyelenggara</a>
          </li>
        </ul>
      </li>
      <li class="nav-item my-1">
        <a class="nav-link {{ Request::is('admin/kegiatan*') ? 'active' : 'text-dark' }}" href="{{ route('admin.kegiatan') }}">Data Kegiatan</a>
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