@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $message)
      <li>{{$message}}</li>
      @endforeach
    </ul>
  </div>
  @endif

<div class="form-group">
  <label for="">StudentName</label>
  <input type="text"class="form-control @error('name')is-invalid @enderror"name="name">
  @error('name')
  <p class="invalid-feedback">{{$message}}</p>
  @enderror
</div>
<div class="form-group">
  <label for="">Author</label>
  <input type="text"class="form-control @error('author')is-invalid @enderror"name="author">
  @error('author')
  <p class="invalid-feedback">{{$message}}</p>
  @enderror
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control @error('email')is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    @error('email')
  <p class="invalid-feedback">{{$message}}</p>
  @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control @error('password')is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
    @error('password')
  <p class="invalid-feedback">{{$message}}</p>
  @enderror
  </div>

  
<div class="form-group">
  <label for="">Type</label>
  <input type="text"class="form-control @error('type')is-invalid @enderror"name="type">
  @error('type')
  <p class="invalid-feedback">{{$message}}</p>
  @enderror
</div>
<div class="form-group">
  <button type="submit"class="btn btn-primary">Save</button>
</div>