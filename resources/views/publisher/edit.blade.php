@extends('layout.admin')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Publishers</li>
            <li class="breadcrumb-item active">Edit</li>
            </ol>
@endsection
@section ('content')
<form action="{{route('publisher.update',$publisher->id)}}"method="post">
  @csrf
  @method('put');
  @include('publisher._form')
</form>
@endsection