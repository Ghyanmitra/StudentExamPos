
@extends('layouts.master')

@section('content')

<div class="container-fluid">

<div class="container">
    <h4>Student's List</h4>


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="">Add Student</button>

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
            <h5 class="modal-title" id="exampleModalLabel">Student detail form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        <form method="post" action="{{ URL::to('addstudent') }}" enctype="multipart-data">

          <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" >
              </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            {{ csrf_field() }}
            <button type="Submit" class="btn btn-primary">Add Student</button>
          </div>

        </form>

        </div>
      </div>
    </div>

    <div class="mt-1">
        @if ($students[0])
            <table class="table table-hover" id="datatable">
                <thead>
                    <tr>
                    <th>@sortablelink('id')</th>
                    <th>@sortablelink('name')</th>
                    <th>@sortablelink('email')</th>
                    <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <th>{{ $student->id }}</th>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                <a href="{{URL::to('edit', $student->id)}}" class="btn btn-info">EDIT</a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{URL::to('delete', $student->id)}}">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{$students->links()}}
        @else

            <div><h4>No Student Record Found</h4></div>

        @endif

    </div>
</div>

</div>

@endsection
