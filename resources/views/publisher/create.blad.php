@extends('layout.admin')
@section('title','Create New Publisher')

@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Publishers</li>
            <li class="breadcrumb-item active">Create</li>
            </ol>
@endsection
@section ('content')
<form action="{{route('publisher.store')}}"method="post">
  <input type="hidden" type="_token" value="{{csrf_token()}}">
  {{csrf_field()}}
  @csrf

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
  <label for="">YearOfPublisher</label>
  <input type="text"class="form-control"name="name">
</div>


<div class="form-group">
  <button type="submit"class="btn btn-primary">Save</button>
</div>
</form>
@endsection