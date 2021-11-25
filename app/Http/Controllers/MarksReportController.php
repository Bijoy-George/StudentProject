<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentMark;


class MarksReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('marks.index');
    }


    public function searchList(Request $request)
    {
        $results = StudentMark::with('student')->paginate(10);
        $html = view('marks.list_view')->with(compact('results'))->render();
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
        $students = Student::pluck('name','id')->all();
         return view('marks.create',compact('students'));
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
            'student_id'      => 'required',
            'term'      => 'required',
            'maths_mark'      => 'required',
            'scince_mark'      => 'required',
            'history_mark'      => 'required',
        ],
        [
            'student_id.required' => 'Student Required'
        ]);


        $total = $request->maths_mark + $request->scince_mark + $request->history_mark;

            $data = StudentMark::updateOrCreate([
            'student_id'=>$request->student_id,
            'term'=>$request->term,
        ],
        [
            'maths_mark' => $request->maths_mark,
            'scince_mark' => $request->scince_mark,
            'history_mark' => $request->history_mark,
            'total' => $total,
        ]);


        $result_arr=array('reset'=>true,'success' => true,'status' => 'success','message' => 'Saved successfully', 'redirect_url' => url('marks'));

        return $result_arr;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marks = StudentMark::find($id);
        $students = Student::pluck('name','id')->all();

        return view('marks.create',compact('marks','students'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marks = StudentMark::find($id);

        if($marks)
        {
            $marks->delete();
            $result_arr=array('success' => true,'message' => 'Deleted Successfully','refresh' =>true);

            return $result_arr;
        }


    }
}
