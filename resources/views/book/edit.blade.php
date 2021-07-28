@extends('layout.admin')
@section('title','Edit Book')

@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Books</li>
            <li class="breadcrumb-item active">Edit</li>
            </ol>
@endsection
@section ('content')
<form action="{{route('book.update','['id'=> $book->id'])}}"method="post">
  @csrf
  @method('put');
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
  <label for="status">Status</label>
  <div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="status-active" value="active"@if($category->status=='active') checked @endif>
  <label class="form-check-label" for="status-active">
    Active
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft" @if($book->status=='active') checked @endif >
  <label class="form-check-label" for="status-draft">
    Draft
  </label>
</div>

  </div>
</div>
<div class="form-group">
  <button type="submit"class="btn btn-primary">Save</button>
</div>
</form>
@endsection

