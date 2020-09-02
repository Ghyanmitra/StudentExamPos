
@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <div class="container">
        <h4>Student Search</h4>

        <div class="mb-2">
            <form action="{{URL::to('search')}}" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                        placeholder="Search users"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>

        <h4>Student Opted for exam's List</h4>
        <a href="{{URL::to('assign')}}">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="">Add Student Exam
            </button>
        </a>

        <div class="col-sm-12">
          @if(session()->get('success'))
            <div class="alert alert-success mt-1">
              {{ session()->get('success') }}
            </div>
          @endif
        </div>

        @if($errors->any())
            <div class="alert alert-danger mt-1">
                {{ implode('', $errors->all(':message')) }}
            </div>
        @endif

        <div class="mt-1">
            @if ($studentexams[0])
                <table class="table table-hover" id="datatable">


                @if ($type_from=='studentexamhome')
                    <thead>
                        <tr>
                        <th>@sortablelink('id')</th>
                        <th>@sortablelink('name')</th>
                        <th>@sortablelink('exam_name')</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                @else
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Exam Name</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                @endif

                    <tbody>
                        @foreach($studentexams as $row)
                            <tr>
                                <th>{{ $row->id }}</th>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->exam_name }}</td>
                                <td>
                                    {{-- <a href="{{URL::to('editexam', $student->id)}}" class="btn btn-info">EDIT</a> --}}
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{URL::to('deletstudentexam', $row->id)}}">DELETE</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

               @if ($type_from=='studentexamhome')
                   {{$studentexams->links()}}
               @else

               @endif

            @else

                <div><h4>No Student Record Found</h4></div>

            @endif

        </div>
    </div>

    </div>

@endsection


