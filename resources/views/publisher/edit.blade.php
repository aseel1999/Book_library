@extends('layout.admin')
@section('title','Edit Publisher')

@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Publishers</li>
            <li class="breadcrumb-item active">Edit</li>
            </ol>
@endsection
@section ('content')
<form action="{{route('publisher.update','['id'=> $publisher->id'])}}"method="post">
  @csrf
  @method('put');
  <div class="form-group">
  <label for="">PublisherName</label>
  <input type="text"class="form-control"name="name">
</div>
<div class="form-group">
  <label for="">BookId</label>
  <select name='book_id'>
      @foreach($books as $book)
      <option value="{{$book->id}}">
          {{$book->$book_name}}
      </option>
      @endforeach
  </select>
  
</div>
<div class="form-group">
  <label for="">YearOfPubliisher</label>
  <input type="text"class="form-control"name="name">
</div>


<div class="form-group">
  <button type="submit"class="btn btn-primary">Save</button>
</div>
</form>
@endsection