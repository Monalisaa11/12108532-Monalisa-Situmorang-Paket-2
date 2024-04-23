@extends('layouts.master')
@section('content')


<div class="card shadow-sm">
  <div class="card-body">
    <a href="{{route('book.create')}}"> <button class="btn btn-primary right mb-3">Add Book</button>
    
    <!-- <a href="/export-book"> <button class="btn btn-info">Unduh Data</button></a> -->
    
    </a>
    @if(Session::get('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
    @endif
    <table class="table mt-5">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Cover</th>
          <th scope="col">Kategori Buku</th>
          <th scope="col">Judul</th>
          <th scope="col">Penulis</th>
          <th scope="col">Penerbit</th>
          <th scope="col">Tahun Terbit</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($datas as $data)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td><img src="{{asset('assets/upload/'. $data->cover)}}" width="50px" alt=""></td>
          <td>{{$data->categoryBook->name}}</td>
          <td>{{$data->judul}}</td>
          <td>{{$data->penulis}}</td>
          <td>{{$data->penerbit}}</td>
          <td>{{$data->tahun_terbit}}</td>
          <td>{{$data->tanggal}}</td>
          <td>{{$data->deskripsi}}</td>
          <td class="d-flex">
            <form id="deleteForm-{{$data->id}}" action="{{route('book.destroy', $data->id)}}" method="POST" class="deleteForm-{{$data->id}}">
              @method('DELETE')
              @csrf
              <button type="submit" onclick="return confirmation({{$data->id}})" class="btn btn-danger btn-sm" fdprocessedid="a3qvej">
                Hapus
              </button>
            </form>
            <a href="{{route('book.edit', $data->id)}}">
              <button class="btn btn-info">Edit</button>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection