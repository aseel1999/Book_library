@extends('layout.admin')
@section('title')
{{ $title }}</h2><a href="{{route ('user.create')}}">Create</a>
@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="{{ URL::route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
            </ol>
@endsection
@section('content')
<x-alert />
<table class="table">
    <thead>
        <tr>
           
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Type</th>
            <th></th>
            <th></th>
        
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->type}}</td>
            <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-dark">Edit</a></td>
            <td><form action="{{route('user.destroy',$user->id)}}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form></td>

        </tr>
        @endforeach 
    </tbody>

</table>
@endsection