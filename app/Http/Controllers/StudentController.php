<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index');
    }

    public function studentList(Request $request)
    {
        $results = Student::paginate(10);
        $html = view('student.list_view')->with(compact('results'))->render();
        $result_arr=array('success' => true,'html' => $html);
        return json_encode($result_arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'      => 'required',
            'age'      => 'required',
            'gender'      => 'required',
            'reporting_teacher'      => 'required'
        ]);

        Student::updateOrCreate([
            'id' => $request->id,
        ],
        [
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'reporting_teacher' => $request->reporting_teacher,
        ]);

        $result_arr=array('reset'=>true,'success' => true,'status' => 'success','message' => 'Saved successfully', 'redirect_url' => url('student'));

        return $result_arr;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.create',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if($student)
        {
            $student->delete();
            $result_arr=array('success' => true,'message' => 'Deleted Successfully','refresh' =>true);

            return $result_arr;
        }
    }
}
