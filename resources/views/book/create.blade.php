@extends('layout.admin')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Books</li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection
@section('content')
    <form action="{{ route('book.store') }}" method="post">
        <input type="hidden" type="_token" value="{{ csrf_token() }}">
        {{ csrf_field() }}
        @csrf
        

       @include('book._form',[
       'button'=>'Add'
       ])
    </form>
@endsection