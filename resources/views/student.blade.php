@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" action="{{ !empty($student) ? url('/update/Student') : url('/add/Student') }}" method="post">
                        @csrf
                        @if(!empty($student))
                            <input type="hidden" name="id" value={{$student->id}}>
                        @endif
                        <div class="form-group">
                            <label for="student_name">Student Name:</label>
                            <input type="text" class="form-control" id="student_name" placeholder="Enter Name" name="student_name" value={{ !empty($student) ? $student->student_name : "" }}>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value={{ !empty($student) ? $student->email : "" }}>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value={{ !empty($student) ? 'Update' : 'Submit' }}>
                        </div>
                    </form>
                </div>
        </div>
    </div>
@endsection