@extends('layout.admin')
@section('title')
{{ $title }}</h2><a href="{{route ('log.create')}}">Create</a>
@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="{{ URL::route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Logs</li>
            </ol>
@endsection
@section('content')
<x-alert />
<table class="table">
    <thead>
        <tr>
           
            <th>Id</th>
            <th>IssueId</th>
            <th>status</th>
            <th></th>
            <th></th>
        
        </tr>
    </thead>
    <tbody>
        @foreach ($logs as $log)
        <tr>
            
            <td>{{$log->id}}</td>
            <td>{{$log->issue_id}}</td>
            <td>{{$log->status}}</td>
            <td><a href="{{route('log.edit', $log->id)}}" class="btn btn-sm btn-dark">Edit</a></td>
            <td><form action="{{route('log.destroy',$log->id)}}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form></td>

        </tr>
        @endforeach 
    </tbody>

</table>
@endsection