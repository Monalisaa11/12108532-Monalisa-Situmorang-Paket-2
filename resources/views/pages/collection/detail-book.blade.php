@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <img src="{{asset('assets/upload/'. $book->cover)}}" class="img-fluid" alt="">
        <h4 class="font-weight-bold mt-3">{{$book->judul}}</h4>
        <p> Penulis: <span class="font-weight-bold">{{$book->penulis}}</span></p>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <h1>{{$book->judul}}</h1>
        <p>Penulis: {{$book->penulis}}</p>
        <p>Penerbit: {{$book->penerbit}}</p>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h3>Komentar</h3>
        
      </div>
    </div>
  </div>
  
</div>
<div class="row">
  <div class="col-md-8">

  </div>
</div>
@endsection
