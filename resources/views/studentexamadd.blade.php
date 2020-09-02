
@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <div class="container">
        <h4>Student Assign Exam</h4>

        <form method="post" action="{{ URL::to('assignstudent') }}" enctype="multipart-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-4">
                    <select class="browser-default custom-select w-50" name='sid'>
                        <option selected>Select Student</option>
                        @foreach ($students as $item)
                            <option class="dropdown-item" value="{{$item->id}}" href="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-4">
                    <select class="browser-default custom-select w-50" name='exam_id'>
                        <option selected>Select test</option>
                            @foreach ($exams as $item)
                                <option class="dropdown-item" value="{{$item->id}}">{{$item->exam_name}}</option>
                            @endforeach
                    </select>
                </div>

                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Assign Student to Exam
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection
