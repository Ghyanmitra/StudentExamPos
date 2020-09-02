<?php

namespace App\Http\Controllers;

use App\Exams;
use App\StudentExams;
use App\Students;
use Illuminate\Http\Request;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;

class StudentExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $studentexams=StudentExams::sortable()->paginate(5);
        Session::put('StudentExam','');
        return view('studentexam', ['studentexams'=>$studentexams, 'type_from'=>'studentexamhome']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $students=Students::all();
        $exams=Exams::all();

        return view('studentexamadd',[ 'students'=>$students, 'exams'=>$exams]);
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
            'sid'=>'required',
            'exam_id'=>'required'
        ]);

        $student=Students::findOrFail($request->sid);
        $exam=Exams::findOrFail($request->exam_id);

        // $student->exams()->save($exam);
        $studentexam = new StudentExams([
            'user_id' => $student->id,
            'exam_id' => $exam->id,
            'name' => $student->name,
            'exam_name' => $exam->exam_name
        ]);

        $studentexam->save();
        return redirect('/studentexam')->with('success', 'Student Assigned to Exam!');

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentExams  $studentExams
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $exam = StudentExams::find($request->id);
        $exam->delete();

        return redirect('/studentexam')->with('success', 'Exam Deleted!');
    }

    public function searchmethod(Request $request) {

        $q = $request->q;
        $studentexams = StudentExams::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'exam_name', 'LIKE', '%' . $q . '%' )->sortable()->get ();

        Session::put('StudentExam','');
        return view ( 'StudentExam', ['studentexams'=>$studentexams, 'type_from'=>'serach'] );
    }

}
