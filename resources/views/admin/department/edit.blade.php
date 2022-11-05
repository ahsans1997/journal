@extends('layouts.backend')

@section('content')

<div class="row">
    <div class="col-md-5 m-auto">
        <div class="card border-success mb-3" style="border: 1px solid;">
            <div class="card-header">Edit Department</div>
            <div class="card-body ">
                <form method="POST" action="{{ route('department.update', $department_info->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Department Name</label>
                        <input type="text" class="form-control" value="{{ $department_info->department_name }}" name="department_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Department Description</label>
                        <textarea class="form-control" name="department_info" rows="5">{{ $department_info->department_info }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Department Image</label>
                        <input type="file" class="form-control" name="department_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

