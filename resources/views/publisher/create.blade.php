@extends('layout.admin')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ URL::route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Publishers</li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection
@section('content')
    <form action="{{ route('publisher.store') }}" method="post">
        <input type="hidden" type="_token" value="{{ csrf_token() }}">
        {{ csrf_field() }}
        @csrf
        @include('publisher._form')
    </form>
@endsection
