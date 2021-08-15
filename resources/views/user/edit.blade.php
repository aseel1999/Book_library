@extends('layout.admin')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
            <li class="breadcrumb-item active">Edit</li>
            </ol>
@endsection
@section ('content')
<form action="{{route('user.update',$user->id)}}"method="post">
  @csrf
  @method('put');
@include('user._form')
</form>
@endsection