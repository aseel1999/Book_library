@extends('layout.admin')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ URL::route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Issues</li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection
@section('content')
    <form action="{{ route('issue.update', $issue->id) }}" method="post">
        @csrf
        @method('put');
       @include('issue._form')
    </form>
@endsection
