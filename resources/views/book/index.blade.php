@extends('layout.admin')
@section('title')
{{ $title }}}</h2><a href="{{route ('book.create')}}">Create</a>
@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Books</li>
            </ol>
@endsection
@section('content')

<table class="table">
    <thead>
        <tr>
           <th><{{loop}}</th> 
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
            <td>{{$loop}}</td>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->description}}</td>
            <td>{{$book->category_id}}</td>
            <td>{{$book->publisher_id}}</td>
            <td>{{$book->available}}</td>
            <td><a href="{{route(book.edit},['id'=> $book->id'])}}" class="btn btn-sm btn-dark">Edit</a></td>
            <td><form action="{{route('book.destroy',$book->id)}}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form></td>

        </tr>
        @endforeach 
    </tbody>

</table>
@endsection