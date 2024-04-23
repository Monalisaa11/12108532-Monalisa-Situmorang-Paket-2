@extends('layouts.master')
@section('content')
<h4>Buku</h4>
@if(Session::get('success'))
<div class="alert alert-success">
  {{session('success')}}
</div>
@endif

<div class="row">
  @foreach ($datas as $data )
  <div class="col-md-4">
    <div class="card">
      <div class="card-body text-center">
        <img src="{{asset('assets/upload/'. $data->cover)}}" width="200px" class="img-fluid" alt="">
        <h4 class="font-weight-bold mt-3">{{$data->judul}}</h4>
        <p class="mb-5"> Penulis: <span class="font-weight-bold">{{$data->penulis}}</span></p>
        <a href="{{route('borrowed.detail-book', $data->slug)}}" style="font-size: 20px">See Preview</a>
        <div class="d-flex justify-content-center gap-2 mt-2">

        <form action="{{route('borrow.book', $data->slug)}}" method="POST">
            @method('PATCH')
            @csrf
          @if($data->available == true)

            <button type="submit" class="btn btn-primary">Borrow</button>
            @else
            <button type="submit"  class="btn btn-dark">Borrowed</button>
            @endif

        </form>

          <form action="{{route('koleksi-book.store')}}" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{$data->id}}">
            <button type="submit" class="btn btn-success">Add To Collection</button>
          </form>

        </div>
      </div>
    </div>
  </div>
  @endforeach

</div>
@endsection