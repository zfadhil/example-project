@extends('layouts.app')
@section('main')
<div class="border rounded mt-5 mx-auto" style="width: 380px;">
    <div class="w-96 justify-content-between flex-shrink-0 p-3 link-dark  border-bottom">
        <a href="{{ url('/posts/create') }}" class="btn btn-sm btn-primary">tambah</a>
        <span class="fs-5 fw-bold">List Buku</span>
    </div>
</div>

<div class="card mx-4 my-4">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Judul</th>
        <th scope="col">Konten</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <?php $i = 1;?>
    @foreach ($data as $item)
    <tbody>
      <tr>
        <th scope="row">{{$i}}</th>
        <td>{{$item->title}}</td>
        <td>{{$item->content}}</td>
        <td><div class="card-action justify-end">
            <form action="{{url("/feeds/$item->id")}}" method="POST">
                @csrf
                @method("DELETE")
                <a href="{{url("/posts/$item->id/edit")}}" class="btn btn-warning">edit</a>
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </div></td>
      </tr>
    </tbody>
    <?php $i++;?>
    @endforeach
  </table>
</div>
@endsection
