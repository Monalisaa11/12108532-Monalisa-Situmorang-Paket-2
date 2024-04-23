@extends('layouts.master')
@section('title', 'Akun User')
@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <a href="{{ route('user-akun.create') }}"> <button class="btn btn-primary mb-3">Tambah User</button>
            <a href="{{route('export-user')}}"> <button class="btn btn-info">Unduh Data</button></a>
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $data->username }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->role }}</td>
                            <td class="d-flex gap-3">
                            <form id="deleteForm-{{$data->id}}" action="{{route('user-akun.destroy', $data->id)}}" method="POST" class="deleteForm-{{$data->id}}">
              @method('DELETE')
              @csrf
              <button type="submit" onclick="return confirmation({{$data->id}})" class="btn btn-danger btn-sm" >
                Hapus
              </button>
            </form>
            <a href="{{route('user-akun.edit', $data->id)}}">
              <button class="btn btn-info">Edit</button>
            </a>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
