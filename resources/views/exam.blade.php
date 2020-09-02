
@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <div class="container">
        <h4>Exam's List</h4>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="">Add Exam</button>

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

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Exam detail form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

            <form method="post" action="{{ URL::to('addexam') }}" enctype="multipart-data">
              <div class="modal-body">
                  <div class="form-group">
                    <input type="text" class="form-control" name="exam_name" id="exam_name" placeholder="Enter Exam">
                  </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{ csrf_field() }}
                <button type="Submit" class="btn btn-primary">Add Exam</button>
              </div>

            </form>

            </div>
          </div>
        </div>

        <div class="mt-1">
            @if ($exams[0])
                <table class="table table-hover" id="datatable">
                    <thead>
                        <tr>
                        <th>@sortablelink('id')</th>
                        <th>@sortablelink('exam_name')</th>
                        <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($exams as $exam)
                            <tr>
                                <th>{{ $exam->id }}</th>
                                <td>{{ $exam->exam_name }}</td>
                                <td>
                                    {{-- <a href="{{route('edit', $exam->id)}}" class="btn btn-info">EDIT</a> --}}
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{URL::to('examdelete', $exam->id)}}">DELETE</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$exams->links()}}
            @else

                <div><h4>No Exam Found</h4></div>

            @endif

        </div>
    </div>

</div>

@endsection


