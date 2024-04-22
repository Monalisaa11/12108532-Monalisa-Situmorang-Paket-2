@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-lg-8 d-flex align-items-strech">
    @if(Auth::check())
    <h1>Selamat Datang {{Auth::user()->nama_lengkap}}</h1>
    @else
    <h1>Error, user doesn't login</h1>
    @endif
  </div>
</div>

@endsection
