@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" action="{{ url('/add/course') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="course_name">Course Name:</label>
                            <input type="hidden" name="user_id" value="{{ Request::segment(2) }}">
                            <input type="text" class="form-control" id="course_name" placeholder="Enter Course Name" name="course_name">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
        </div>
    </div>
@endsection