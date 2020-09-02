<?php

namespace App\Http\Controllers;

use App\Exams;
use Illuminate\Http\Request;
use Validator;
use Session;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $exams=Exams::sortable()->paginate(5);
        Session::put('Exam','');
        return view('exam', ['exams'=>$exams]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $validator = Validator::make($request->all(), [
            'exam_name'=>'required|unique:exams|min:4',
        ]);


        if($validator->fails()) {
            return redirect('/exam')->withErrors($validator);
        }

        $exam=new Exams([
            'exam_name' => $request->get('exam_name')
        ]);

        $exam->save();
        return redirect('/exam')->with('success', 'Exam Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exams  $exams
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $exam = Exams::find($request->id);
        $exam->delete();

        return redirect('/exam')->with('success', 'Exam Deleted!');
    }
}
