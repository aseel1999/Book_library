@extends('layout.admin')
@section('title')
{{ $title }}</h2><a href="{{route ('issue.create')}}">Create</a>
@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="{{ URL::route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Issues</li>
            </ol>
@endsection
@section('content')
<x-alert />

<table class="table">
    <thead>
        <tr>
           
            <th>Id</th>
            <th>BookId</th>
            <th>IssueOn</th>
            <th>ReturnDate</th>

            <th></th>
            <th></th>
        
        </tr>
    </thead>
    <tbody>
        @foreach ($issues as $issue)
        <tr>
            <td>{{$issue->id}}</td>
            <td>{{$issue->book_id}}</td>
            <td>{{$issue->issue_on}}</td>
            <td>{{$issue->Return_date}}</td>
            <td><a href="{{route('issue.edit',$issue->id)}}" class="btn btn-sm btn-dark">Edit</a></td>
            <td><form action="{{route('issue.destroy',$issue->id)}}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form></td>

        </tr>
        @endforeach 
    </tbody>

</table>
@endsection