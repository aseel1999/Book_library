@extends('layout.admin')
@section('title','Edit Category')

@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
            <li class="breadcrumb-item active">Edit</li>
            </ol>
@endsection
@section ('content')
<form action="{{route('category.update','['id'=> $category->id'])}}"method="post">
  @csrf
  @method('put');
<div class="form-group">
  <label for="">CategoryName</label>
  <input type="text"class="form-control" name="name" value="{{$category->name}}">
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
  <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft"@if($category->status=='active') checked @endif >
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

