@extends('layout.admin')
@section('title')
{{ $title }}</h2><a href="{{route ('publisher.create')}}">Create</a>
@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Publishers</li>
            </ol>
@endsection
@section('content')
<x-alert />
<table class="table">
    <thead>
        <tr>
           
            <th>Id</th>
            <th>Name</th>
            <th>BookId</th>
            <th>YearOfPublisher</th>
            <th>Type</th>
            <th></th>
            <th></th>
        
        </tr>
    </thead>
    <tbody>
        @foreach ($publishers as $publisher)
        <tr>
           
            <td>{{$publisher->id}}</td>
            <td>{{$publisher->book_id}}</td>
            <td>{{$publisher->email}}</td>
            <td>{{$publisher->year_of_publisher}}</td>
            
            <td><a href="{{route('publisher.edit',$publisher->id)}}" class="btn btn-sm btn-dark">Edit</a></td>
            <td><form action="{{route('publisher.destroy',$publisher->id)}}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form></td>

        </tr>
        @endforeach 
    </tbody>

</table>
@endsection