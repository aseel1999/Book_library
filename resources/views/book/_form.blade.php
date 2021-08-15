
@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif<div class="form-group">
  <label for="">BookTitle</label>
  <input type="text"class="form-control @error('title')is-invalid @enderror"name="title">
  @error('title')
<p class="invalid-feedback">{{$message}}</p>
@enderror
</div>
<div class="form-group">
  <label for="">Author</label>
  <input type="text"class="form-control @error('author')is-invalid @enderror"name="name">
  @error('author')
<p class="invalid-feedback">{{$message}}</p>
@enderror
</div>
<div class="form-group">
  <label for="">Description</label>
  <textarea class="form-control @error('description')is-invalid @enderror"name="description"></textarea>
  @error('description')
<p class="invalid-feedback">{{$message}}</p>
@enderror
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
  @error('name')
<p class="text-danger">{{$message}}</p>
@enderror
</div>
<div class="form-group">
  <label for="">Available</label>
  <input type="text"class="form-control @error('available')is-invalid @enderror"name="available">
  @error('available')
<p class="invalid-feedback">{{$message}}</p>
@enderror
</div>
<div class="form-group">
  <button type="submit"class="btn btn-primary">{{$button}}</button>
</div>
</form>