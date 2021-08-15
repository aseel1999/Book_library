@extends('layout.admin')
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">  
              <li class="breadcrumb-item"><a href="{{ URL::route('home') }}">Home</a></li>
            </ol>
@endsection
@section(content)
    <div class="content">
        <div class="btn-controls">
            <div class="btn-box-row row-fluid">
                <button class="btn-box span12" style="background: #9400D3; ">
                    <b style="color:#fff">Online Library Management System</b>
                </button>
            </div>

            <div class="btn-box-row row-fluid">
                <button class="btn-box big span4 homepage-form-box" id="findbookbox">
                    <i class="icon-list"></i>
                    <b>Find Book</b>
                </button>

                <button class="btn-box big span4 homepage-form-box" id="findissuebox">
                    <i class="icon-book"></i>
                    <b>Find Issue Book </b>
                </button>

                <button class="btn-box big span4 homepage-form-box" id="findstudentbox">
                    <i class="icon-user"></i>
                    <b>Find Student</b>
                </button>
            </div>
        </div>
        
    </div>

@endsection
