@extends('layout.admin')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="{{ URL::route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Issues</li>
            <li class="breadcrumb-item active">Create</li>
            </ol>
@endsection
@section ('content')
<form action="{{route('issue.store')}}"method="post">
  <input type="hidden" type="_token" value="{{csrf_token()}}">
  {{csrf_field()}}
  @csrf
  @include('issue._form')
</form>
@endsection