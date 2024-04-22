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
    <form action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kategori Buku</label>
        <select  name="category_book_id" class="form-select" aria-label="Default select example">
          <option selected>Pilih Kategori</option>
          @foreach ($categoryBooks as $cate )
          <option value="{{$cate->id}}">{{$cate->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Penerbit</label>
        <input type="text" name="penerbit" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tahun Terbit</label>
        <input type="text" name="tahun_terbit" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <label for="exampleInputEmail1" class="form-label">Cover</label>
      <div class="input-group">
        <input type="file" name="cover" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
      </div>
      <button type="submit" class="btn btn-primary mt-5">Kirim</button>
    </form>
  </div>
</div>
</div>
@endsection