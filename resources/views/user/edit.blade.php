@extends('layout.admin')
@section('title','Edit User')

@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Usess</li>
            <li class="breadcrumb-item active">Edit</li>
            </ol>
@endsection
@section ('content')
<form action="{{route('book.update','['id'=> $book->id'])}}"method="post">
  @csrf
  @method('put');
  <div class="form-group">
  <label for="">UserName</label>
  <input type="text"class="form-control"name="name">
</div>
<div class="form-group">
  <label for="">Author</label>
  <input type="text"class="form-control"name="name">
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  
<div class="form-group">
  <label for="">Type</label>
  <div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="status-active" value="admin"@if($category->Type==0) checked @endif>
  <label class="form-check-label" for="status-active">
    Admin
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="status-draft" value="user" @if($book->status==1) checked @endif >
  <label class="form-check-label" for="status-draft">
    User
  </label>
</div>

  </div>
</div>
<div class="form-group">
  <button type="submit"class="btn btn-primary">Save</button>
</div>
</form>
@endsection