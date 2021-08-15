@extends('layout.admin')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Logs</li>
            <li class="breadcrumb-item active">Edit</li>
            </ol>
@endsection
@section ('content')
<form action="{{route('log.update',$log->id)}}"method="post">
  @csrf
  @method('put');
  @include('log._form')
</form>
@endsection


