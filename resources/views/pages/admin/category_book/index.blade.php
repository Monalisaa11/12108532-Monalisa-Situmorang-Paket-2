@extends('layouts.master')
@section('content')


<div class="card shadow-sm">
  <div class="card-body">
    <a href="{{route('category-book.create')}}"> <button class="btn btn-primary mb-3">Buat Kategori Buku</button>   </a>
    <a href="/export-category-book"> <button class="btn btn-info">Unduh Data</button></a>
 
    @if(Session::get('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
    @endif
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Kategori</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($datas as $data)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$data->name}}</td>
          <td class="d-flex">
            <form id="deleteForm-{{$data->id}}" action="{{route('category-book.destroy', $data->id)}}" method="POST" class="deleteForm-{{$data->id}}">
              @method('DELETE')
              @csrf
              <button type="submit" onclick="return confirmation({{$data->id}})" class="btn btn-danger btn-sm" >
                Hapus
              </button>
            </form>
            <a href="{{route('category-book.edit', $data->id)}}">
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
