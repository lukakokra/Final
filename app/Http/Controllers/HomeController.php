<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $student = new student();
        $students = student::all();
        // print_r($students);die();
        return view('home', compact('students'));
    }

    public function addNew()
    {
        return view('student');

    }

    public function addCourse()
    {
        return view('course');
    }


    public function editStudent($sid)
    {
        $student = new student();
        $student = student::where('id', $sid)->first();
        // dd($student);
        return view('student', compact('student'));
    }

    public function addStudent(Request $request)
    {
        // dd($request->all());
        $student = new student();
        $student->student_name = $request->get('student_name');
        $student->email = $request->get('email');
        $student->save();
        return redirect('/home');
        // return redirect()->action([HomeController::class, 'addCourse']);
    }

    public function updateStudent(Request $request)
    {
        // dd($request->all());
        $data = [
            'student_name' => $request->get('student_name'),
            'email' => $request->get('email'),
        ];
        $student = new student();
        $student->where('id', $request->get('id'))
        ->update($data);
        return redirect('/home');
        // return redirect()->action([HomeController::class, 'addCourse']);
    }

    public function listcourses($uid)
    {
        $course = new course();
        $course = course::where('user_id', $uid)->get();
        // $course = course::all();
        // print_r($course);die();
        return view('courselist', compact('course'));
    }

    public function courseData(Request $request){
        $course = new course();
        $course->user_id = $request->get('user_id');
        $course->course_name = $request->get('course_name');
        $course->save();
        $uid = $request->get('user_id');
        // return redirect('/home');
        // return Redirect::action('HomeController@listcourses', array('uid' => 2));
        return redirect('/course/list/'.$uid);

    }

    public function deleteStudent($id)
    {
        $students = student::find($id);
        $students->delete();
        return redirect('/home');
    }
    

    public function deleteCourse($id, $uid)
    {
        $course = new course();
        $course = course::find($id);
        $course->delete();
        return redirect('/course/list/'.$uid);
    }

    public function authenticate($email , $password)
    {
        $credentials = ['email' => $email,'password' => $password];

        try {
            if (!$token = JWTAuth::attempt($credentials)) 
            { 
                return response()->json(['error' => 'invalid_credentials'], 400); 
            } 
        }
        catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $users = User::where('email', $email)->get();
        //$users = User::all({});
        //  if($users){
        //     $last_login = $users->current_sign_in_at;
        //     $login_count = $users->sign_in_count;
        //     $login_count++;
            
        // }
        //User::find('email', $email)->update(['sign_in_count' => $login_count , 'last_sign_in_at' => $last_login ,'current_sign_in_at' => date('Y-m-d H:i:s')]);  
        // $users->sign_in_count =  $login_count;
        // $users->last_sign_in_at =  $last_login;
        // $users->current_sign_in_at =  date('Y-m-d H:i:s');


        return response()->json(compact('users','token'), 200);
    }
}
//$users = User::all({});