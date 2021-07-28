@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Issues</li>
            <li class="breadcrumb-item active">Edit</li>
            </ol>
@endsection
@section ('content')
<form action="{{route('issue.update','['id'=> '$issue->id'])}}"method="post">
  @csrf
  @method('put');
  
  <input type="hidden" type="_token" value="{{csrf_token()}}">
  {{csrf_field()}}
  @csrf
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
<label class="control-label" for="date">IssueOn</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
</div>

<div class="form-group">
<label class="control-label" for="date">IssueOn</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
</div>
<div class="form-group">
  <button type="submit"class="btn btn-primary">Save</button>
</div>
</form>
@endsection