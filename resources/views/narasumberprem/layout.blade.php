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
        <a class="nav-link {{ Request::is('narasumberprem') || Request::is('narasumberprem/profile*') ? 'active' : 'text-dark' }}" href="{{ route('narasumberprem') }}">Home</a>
        </li>
      <li class="nav-item my-1">
        <a class="nav-link {{ Request::is('narasumberprem/pencarian*') ? 'active' : 'text-dark' }}" href="{{ route('narasumberprem.pencarian') }}">Cari Kegiatan</a>
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