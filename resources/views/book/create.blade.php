@extends('layout.admin')
@section('title','Create New Book')

@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Books</li>
            <li class="breadcrumb-item active">Create</li>
            </ol>
@endsection
@section ('content')
<form action="{{route('book.store')}}"method="post">
  <input type="hidden" type="_token" value="{{csrf_token()}}">
  {{csrf_field()}}
  @csrf

<div class="form-group">
  <label for="">BookTitle</label>
  <input type="text"class="form-control"name="name">
</div>
<div class="form-group">
  <label for="">Author</label>
  <input type="text"class="form-control"name="name">
</div>
<div class="form-group">
  <label for="">Description</label>
  <textarea class="form-control"name="description"></textarea>
</div>
<div class="form-group">
  <label for="">CategoryId</label>
  <select name='category_id' >
	  @foreach($categories as $category)
	  <option value="{{$category->id}}">
		  {{$category->cat_name}}
</option>
@endforeach
  </select>
  
</div>
<div class="form-group">
  <label for="">PublisherId</label>
  <select name='publisher_id' >
	  @foreach($publishers as $publisher)
	  <option value="{{$publisher->id}}">
		  {{$publisher->publisher_name}}
</option>
@endforeach
  </select>
</div>
<div class="form-group">
  <label for="">Available</label>
  <input type="text"class="form-control"name="name">
</div>
<div class="form-group">
  <button type="submit"class="btn btn-primary">Save</button>
</div>
</form>
@endsection