@extends('layouts.master')
@section('content')
<h4>Buku</h4>
@if(Session::get('success'))
<div class="alert alert-success">
  {{session('success')}}
</div>
@endif

<a href="{{route('export.book')}}"><button class="btn btn-info">Downlaod Data</button></a>
<div class="row">
  @foreach ($datas as $data )
  <div class="col-md-4">
    <div class="card">
      <div class="card-body text-center">
        <img src="{{asset('assets/upload/'. $data->cover)}}" width="200px" class="img-fluid" alt="">
        <h4 class="font-weight-bold mt-3">{{$data->judul}}</h4>
        <p class="mb-5"> Penulis: <span class="font-weight-bold">{{$data->penulis}}</span></p>
        <a href="{{route('detail.book', $data->slug)}}" style="font-size: 20px">See Preview</a>
        <div class="d-flex justify-content-center gap-2 mt-2">

          @if($data->available == true)
          <form action="{{route('borrow.book', $data->slug)}}" method="POST">
            @method('PATCH')
            @csrf
            <button type="submit" class="btn btn-primary">Borrow</button>
          </form>
          @else
          <button disabled class="btn btn-dark">Borrow</button>
          @endif

          <form action="{{route('collection.store')}}" method="POST">
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