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
    <h5 class="card-title fw-semibold mb-4">Ubah Buku</h5>
    <form action="{{route('book.update', $data->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method("PATCH")
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kategori Buku</label>
        <select  name="category_book_id" class="form-select" aria-label="Default select example">
          <option selected>Pilih Kategori</option>
          @foreach ($categoryBooks as $cate )
          <option value="{{$cate->id}}" {{ $cate->id == $data->category_book_id ? 'selected' : '' }}>{{$cate->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Judul</label>
        <input type="text" value="{{$data->judul}}" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Penulis</label>
        <input type="text" value="{{$data->penulis}}" name="penulis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Penerbit</label>
        <input type="text" value="{{$data->penerbit}}" name="penerbit" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tahun Terbit</label>
        <input type="text" value="{{$data->tahun_terbit}}" name="tahun_terbit" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tanggal</label>
        <input type="dateTime" value="{{$data->tanggal}}" name="tanggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <label for="exampleInputEmail1" class="form-label">Cover</label>
      <div class="input-group mb-2">
        <input type="file" value="{{$data->cover}}" name="cover" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
      </div>
      @if($data->cover)
      <div style="width: 150px">
          <img src="{{asset('assets/upload/'. $data->cover)}}" class="img-preview img-fluid d-blok">
      </div>
      @else
      <div style="width: 150px">
          <img class="img-preview img-fluid">
      </div>
      @endif
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
        <input type="text" value="{{$data->deskripsi}}" name="deskripsi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <button type="submit" class="btn btn-primary mt-5">Kirim</button>
    </form>
  </div>
</div>
</div>
@endsection
