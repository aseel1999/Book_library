@extends('layout.admin')
@section('title')
<div class="d-flex justify-content-between">
<h2> Books Trashed</h2>
<div class="">
<a class="btn btn-sm btn-outline-primary" href="{{route ('book.create')}}">Create</a>
<a class="btn btn-sm btn-outline-primary" href="{{route ('book.trash')}}">Trash</a>
</div>
</div>

@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Books</li>
            </ol>
@endsection
@section('content')

<x-alert />
<div class="d-flex mb-4">
<form action="{{route('book.restore')}}" method="post" class="mr-3">
              @csrf
              @method('put')
              <button type="submit" class="btn btn-sm btn-warning">Restore All</button>
            </form></td>
            <td><form action="{{route('book.force-delete')}}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-sm btn-danger">Empty Trash</button>
            </form>
            </div>
<table class="table">
    <thead>
        <tr>
           
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>CategoryId</th>
            <th>PublisherId</th>
            <th>Available</th>
            <th></th>
            <th></th>
        
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
           
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->description}}</td>
            <td>{{$book->category_id}}</td>
            <td>{{$book->publisher_id}}</td>
            <td>{{$book->available}}</td>
            <td><form action="{{route('book.restore',$book->id)}}" method="post">
              @csrf
              @method('put')
              <button type="submit" class="btn btn-sm btn-warning">Restore</button>
            </form></td>
            <td><form action="{{route('book.force-delete',$book->id)}}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-sm btn-danger">Delete for Ever</button>
            </form></td>

        </tr>
        @endforeach 
    </tbody>

</table>
@endsection