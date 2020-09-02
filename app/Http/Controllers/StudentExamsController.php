<?php

namespace App\Http\Controllers;

use App\StudentExams;
use Illuminate\Http\Request;
use Session;

class StudentExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('StudentExam','');
        return view('studentexam');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentExams  $studentExams
     * @return \Illuminate\Http\Response
     */
    public function show(StudentExams $studentExams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentExams  $studentExams
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentExams $studentExams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentExams  $studentExams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentExams $studentExams)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentExams  $studentExams
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentExams $studentExams)
    {
        //
    }
}
