@extends('layouts.master')
@section('content')


<div class="card shadow-sm">
  <div class="card-body">
    @if(Session::get('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
    @endif

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Cover</th>
          <th scope="col">Judul Buku</th>
          <th scope="col">Status</th>
          <th scope="col">Tanggal Pinjam</th>
          <th scope="col">Tanggal Kembali</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($datas as $data)
        <tr>
            
          <td scope="row">{{$loop->iteration}}</td>
          <td><img src="{{asset('assets/upload/'.$data->books->cover)}}" width="100px" alt=""></td>
          <td>{{$data->books->judul}}</td>
          <td>{{$data->status}}</td>
          <td>{{$data->tanggal_peminjaman}}</td>
          <td>{{$data->tanggal_pengembalian}}</td>

          <td>
            @if($data->tanggal_pengembalian == "")
            <form action="{{route('return.book', $data->id)}}" method="POST">
              @method('PATCH')
              @csrf
              <button type="submit" class="btn btn-danger">Kembalikan</button>
            </form>
            @else
            <button disabled class="btn btn-dark">Sudah</button>
            @endif
          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
