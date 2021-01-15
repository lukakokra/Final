<!-- @extends('layouts.app') -->

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
            <h3>Student Course List</h3>
            </div>
            <div class="col-md-2">
                <a href="{{url('/home')}}" class="btn btn-primary">Back</a>
                <a href="{{url('/course',Request::segment(3))}}" class="btn btn-success">Add New</a>
            </div>
            </div>           
                <table class="table table-bordered ">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Course Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($course) > 0)
                        @foreach($course as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->course_name}}</td>
                                <td>
                                    <a href="{{ url('/delete_course/'.$value->id.'/'.Request::segment(3))}}" class="btn btn-danger"> Delete</a>
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