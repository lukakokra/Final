<!-- @extends('layouts.app') -->

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
            <h3>Student Details</h3>
            </div>
            <div class="col-md-2">
                <a href="{{url('/student')}}" class="btn btn-success">Add New Student</a>
            </div>
            </div>           
                <table class="table table-bordered ">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($students) > 0)
                        @foreach($students as $student)
                            <tr>
                                <td>{{$student->id}}</td>
                                <td>{{$student->student_name}}</td>
                                <td>{{$student->email}}</td>
                                <!-- <td><a href="{{url('/course',$student->id)}}" class="btn btn-info">Add New Course</a> -->
                                <td><a href="{{url('/course/list', $student->id)}}" class="btn btn-info">Show Course</a>
                                    <a href="{{ url('/edit_student',$student->id)}}" class="btn btn-info"> Edit</a>
                                    <a href="{{ url('/delete_student',$student->id)}}" class="btn btn-danger"> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                    <!-- <td colspan="4" style="text-align: center;"> No Record Found</td> -->
                    <td colspan="4" style="text-align: center;"> No Record Found</td>
                    </tr>
                    @endif
                    <!-- <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr> -->
                    </tbody>
                </table>
            </div>
    </div>
@endsection

            

    <!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">



                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                    </div>
                </div>
            </div>
    </div> -->