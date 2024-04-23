@extends('layouts.master')
@section('content')
<div class="card shadow-sm">
  <div class="card-body">
    @if(Session::get('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
    @endif
    @if(Session::get('error'))
    <div class="alert alert-danger">
      {{session('error')}}
    </div>
    @endif

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Cover</th>
          <th scope="col">Kategori Buku</th>
          <th scope="col">Judul</th>
          <th scope="col">Penulis</th>
          <th scope="col">Penerbit</th>
          <th scope="col">Tahun Terbit</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($datas as $data)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><img src="{{asset('assets/upload/'.$data->books->cover)}}" width="100px" alt=""></td>
         <td></td>
          <td>{{$data->books->judul}}</td>
          <td>{{$data->books->penulis}}</td>
          <td>{{$data->books->penerbit}}</td>
          <td>{{$data->books->tahun_terbit}}</td>
          <td>
                                <form action="{{route('koleksiHapus', ['id' => $data->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark">Hapus Koleksi</button>
                                </form>
                            </td>
</td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
@endsection
