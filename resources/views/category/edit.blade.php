@extends('layout.admin')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
            <li class="breadcrumb-item active">Edit</li>
            </ol>
@endsection
@section ('content')
<form action="{{route('category.update',$category->id)}}"method="post">
  @csrf
  @method('put');
  @include('category._form')
</form>
@endsection