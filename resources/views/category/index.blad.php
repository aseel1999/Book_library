@extends('layout.admin')
@section('title')
{{!! $title !!}}}</h2><a href="{{route ('category.create')}}">Create</a>
@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
            </ol>
@endsection
@section('content')

<table class="table">
    <thead>
        <tr>
           <th><{{loop}}</th> 
            <th>Id</th>
            <th>Name</th>
            <th></th>
            <th></th>
        
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{$loop}}</td>
            <td>{{$category->id}}</td>
            <td>{{$category->cat_name}}</td>
            <td><a href="{{route(category.edit},['id'=> $category->id'])}}" class="btn btn-sm btn-dark">Edit</a></td>
            <td><form action="{{route('category.destroy',$category->id)}}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form></td>

        </tr>
        @endforeach 
    </tbody>

</table>
@endsection
