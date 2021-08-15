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
  <label for="">BookId</label>
  <select name='book_id'>
      @foreach($books as $book)
      <option value="{{$book->id}}">
          {{$book->book_name}}
      </option>
      @endforeach
  </select>
</div>
<div class="form-group">
<label class="control-label" for="date">IssueOn</label>
        <input class="form-control  @error('date')is-invalid @enderror" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
        @error('date')
         <p class="invalid-feedback">{{$message}}</p>
          @enderror
      </div>

<div class="form-group">
<label class="control-label" for="date">ReturnDate</label>
        <input class="form-control  @error('date')is-invalid @enderror" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
        @error('date')
        <p class="invalid-feedback">{{$message}}</p>
        @enderror
      </div>
<div class="form-group">
  <button type="submit"class="btn btn-primary">Save</button>
</div>