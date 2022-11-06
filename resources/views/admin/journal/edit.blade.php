@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-md-7 m-auto">
        <div class="card border-success mb-3" style="border: 1px solid;">
            <div class="card-header">Eidt Journal</div>
            <div class="card-body text-success">
                <form method="POST" action="{{ route('journal.update', $journal_info->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Journal / Research Paper Name</label>
                        <input type="text" class="form-control" placeholder="Journal / Research Paper Name" name="journal_name" value="{{ $journal_info->journal_name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Journal / Research Paper Description</label>
                        <textarea rows="8" class="form-control" placeholder="Journal / Research Paper Name" name="journal_description">{{ $journal_info->journal_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="department_id">
                            <option selected>Select Department</option>
                            @foreach ($departments as $department)
                                <option {{ ($department->id == $journal_info->department_id) ? "selected" : "" }} value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Journal / Research Paper Image</label>
                        <input type="file" class="form-control" name="journal_image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Journal / Research Paper File</label>
                        <input type="file" class="form-control" name="journal_file">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>

    </div>
</div>
@endsection

