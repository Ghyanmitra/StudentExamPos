
@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="container">

        <form method="post" action="{{ URL::to('/update') }}" enctype="multipart-data">
            {{ csrf_field() }}

            <div class="modal-body">

                <div class="form-group">
                  <input type="text" class="form-control" name="name" value="{{$student->name}}" >
                </div>

                <div class="form-group">
                  <input type="email" class="form-control" name="email" value="{{$student->email}}">
                </div>

                <input type="hidden" class="form-control" name="id" value="{{$student->id}}" >

                <div class="form-group">
                    <input type="Submit" class="btn btn-primary" >
                </div>

            </div>

          </form>

    </div>
</div>
@endsection
