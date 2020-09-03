<?php

namespace App\Http\Controllers;

use App\StudentExams;
use App\Students;
use Illuminate\Http\Request;
use Validator;
use Session;
use DB;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $students=Students::sortable()->paginate(5);
        Session::put('Student','');
        return view('home', ['students'=>$students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|unique:students,email'
        ]);

        if($validator->fails()) {
            return redirect('/')->withErrors($validator);
        }

        $student=new Students([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);

        $student->save();
        return redirect('/')->with('success', 'Student Added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Students::find($id);
        return view('editstudent', ["student"=>$student]) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        // echo json_encode($request->all());
        $student=Students::find($request->id);

        $sname=$student->name;
        $sid=$student->id;

        $student->name=$request->name;
        $student->email=$request->email;
        $student->update();

        DB::table('student_exams')
        ->where('name', $sname)
        ->update(['name' => $request->name]);

        return redirect('/')->with('success', 'Student Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $student = Students::find($request->id);
        $student->delete();

        return redirect('/')->with('success', 'Student Deleted!');
    }
}
