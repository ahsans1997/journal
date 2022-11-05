@extends('layouts.backend')

@section('department')
<li class="nav-item dropdown d-none d-lg-flex">
    <a class="nav-link dropdown-toggle nav-btn" id="actionDropdown" href="{{ Route('department.create') }}">
        <span class="btn">+ Create new</span>
    </a>
</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        @if (session('delete'))
            <div class="alert alert-danger">{{ session('delete') }}</div>
        @endif
        @if (session('edit'))
            <div class="alert alert-success">{{ session('edit') }}</div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Sl. NO.</th>
                    <th class="text-center">Department Name</th>
                    <th class="text-center">Department Description</th>
                    <th class="text-center">Department Image</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($departments as $department)
                    <tr>
                        <th class="text-center">{{ $loop->index + 1 }}</th>
                        <td class="text-center">{{ $department->department_name }}</td>
                        <td class="text-center">{{ $department->department_info }}</td>
                        <td class="text-center">{{ $department->department_image }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('department.edit', $department->id) }}" class="btn btn-info">Edit</a>
                                <form method="POST" action="{{ route('department.destroy', $department->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                              </div>
                        </td>
                    </tr>
                @empty

                @endforelse

            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <div class="card border-success mb-3" style="border: 1px solid;">
            <div class="card-header">Add Department</div>
            <div class="card-body ">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @error('department_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <form method="POST" action="{{ route('department.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Department Name</label>
                        <input type="text" class="form-control" placeholder="Department Name" name="department_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Department Description</label>
                        <textarea class="form-control" name="department_info" rows="5"></textarea>
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
