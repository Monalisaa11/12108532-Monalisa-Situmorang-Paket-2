@extends('layouts.master')
@section('content')
<div class="card">
  <div class="card-body">
    @if($errors->any())
    <div class="alert alert-danger">
      <ul>@foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <h5 class="card-title fw-semibold mb-4">Buat Kategori Buku</h5>
    
    <form action="{{route('category-book.store')}}" method="POST">
      
      @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
  </div>
</div>
</div>
@endsection
