@extends('layouts.master')
@section('content')

<h4>Buku</h4>


<div class="row">
  @foreach ($datas as $data )
  <div class="col-md-3 gap-2">
    <div class="card">
      <div class="card-body text-center">
        <img src="{{asset('assets/upload/'. $data->cover)}}" width="50px" class="img-fluid" alt="">
        <h4 class="font-weight-bold mt-3">{{$data->judul}}</h4>
        <p class="mb-5"> Penulis: <span class="font-weight-bold">{{$data->penulis}}</span></p>
        <a href="{{route('borrowed.detail-book', $data->slug)}}" style="font-size: 20px">See Preview</a>
        <div class="d-flex justify-content-center gap-2 mt-2">

          <form action="{{route('borrow.book', $data->slug)}}" method="POST">
            @method('PATCH')
            @csrf
            @foreach($data->borrowed as $borrowed)
            @if($borrowed->user->username == Auth::user()->username)
            @endif
            @endforeach
            @if($data->borrowed->where('user_id', Auth::user()->id)->where('status', 'dipinjam')->first())
            <button type="submit" class="btn btn-dark">Borrowed</button>
            @else
            <button type="submit" class="btn btn-primary">Borrow</button>
            @endif
          </form>

          <form action="{{route('koleksi-book.store')}}" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{$data->id}}">
            <button type="submit" class="btn btn-success">Collection</button>
          </form>
        </div>
        
          <div class="mt-3">
            @if($data->borrowed->where('user_id', Auth::user()->id)->where('status', 'kembali')->first())
              <button type="button" class="btn btn-primary float-center" data-toggle="modal" data-target="#modalReview-{{$data->id}}">
                <i class="bi bi-pen"></i> Tambah Review
              </button>
            @endif
          </div>
         
      </div>
    </div>
  </div>
  @include('pages.ulasan.index')
  @endforeach

</div>
@endsection