@extends('layouts.master')

@section('content')
    @if (Session::get('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('assets/upload/' . $data->cover) }}" class="img-fluid" alt="">
                    <h4 class="font-weight-bold mt-3">{{ $data->judul }}</h4>
                    <p> Penulis: <span class="font-weight-bold">{{ $data->penulis }}</span></p>
                    <p> Tahun Terbit: <span class="font-weight-bold">{{ $data->tahun_terbit }}</span></p>
                    <p>Deskripsi: <span class="font-weight-bold">{{ $data->deskripsi }}</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1>{{ $data->judul }}</h1>
                    <p>Penulis: {{ $data->penulis }}</p>
                    <p>Penerbit: {{ $data->penerbit }}</p>
                    <p>Tahun Terbit: {{ $data->tahun_terbit }}</p>
                    <p>Deskripsi: {{ $data->deskripsi }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3>Komentar</h3>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="bi bi-pencil-square" style="font-size:20px"></i>
                        </button>
                    </div>

                </div>
                @foreach ($ulasans as $item)
                    <div class="card-body border m-2">
                        <div class="d-flex gap-2  mb-2">
                            @for ($x = 0; $x <= $item->rating - 1; $x++)
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16" style="color: rgb(255, 183, 0)">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            @endfor
                        </div>
                        <span class="badge text-bg-info mb-3">{{ $item->user->name }}</span>

                        <p>{{ $item->ulasan }}</p>
                    </div>
                @endforeach
            </div>

        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('ulasan.store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title badge text-bg-primary fs-5" id="exampleModalLabel">{{ $data->judul }}
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="riview">Riview</label>
                                <textarea name="ulasan" class="form-control" id="riview" cols="10" rows="5"></textarea>
                                <input type="hidden" name="buku_id" value="{{ $data->id }}">
                            </div>
                            <div class="form-group">
                                <label for="riview">Rating</label>

                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" value="1"
                                            id="rate1">
                                        <label class="form-check-label" for="rate1">
                                            1
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" value="2"
                                            id="rate2" checked>
                                        <label class="form-check-label" for="rate2">
                                            2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" value="3"
                                            id="rate2" checked>
                                        <label class="form-check-label" for="rate2">
                                            3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" value="4"
                                            id="rate2" checked>
                                        <label class="form-check-label" for="rate2">
                                            4
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" value="5"
                                            id="rate2" checked>
                                        <label class="form-check-label" for="rate2">
                                            5
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
