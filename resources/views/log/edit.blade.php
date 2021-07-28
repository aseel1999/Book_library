@extends('layout.admin')
@section('title','Edit Log')

@endsection
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Logs</li>
            <li class="breadcrumb-item active">Edit</li>
            </ol>
@endsection
@section ('content')
<form action="{{route('log.update','['id'=> $log->id'])}}"method="post">
  @csrf
  @method('put');
  <div class="form-group">
  <label for="">IssueId</label>
  <select name='issue_id'>
      @foreach($issues as $issue)
      <option value="{{$issue->id}}">
          {{$issue->$issue_name}}
      </option>
      @endforeach
  </select>
</div>
<div class="form-group">
  <label for="">Status</label>
  <div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="status-active" value="1"@if($log->status=='1') checked @endif>
  <label class="form-check-label" for="status-active">
    Returned
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="status-draft" value="-1"@if($log->status=='-1') checked @endif >
  <label class="form-check-label" for="status-draft">
    NonReturned
  </label>
</div>

  </div>
</div>

<div class="form-group">
  <button type="submit"class="btn btn-primary">Save</button>
</div>
</form>
@endsection


