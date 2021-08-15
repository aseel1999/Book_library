@extends('layout.admin')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Books</li>
            <li class="breadcrumb-item active">Edit</li>
            </ol>
@endsection
@section ('content')
<form action="{{route('book.update',$book->id)}}"method="post">
  @csrf
  @method('put');
  
  @include('book._form',[
  'button'=>'Update'
  ])
   </form>
@endsection

