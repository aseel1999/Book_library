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
  <label for="">CategoryName</label>
  <input type="text"class="form-control @error('name')is-invalid @enderror"name="name">
  @error('name')
<p class="invalid-feedback">{{$message}}</p>
@enderror
</div>
<div class="form-group">
  <button type="submit"class="btn btn-primary">Save</button>
</div>