@extends('layouts.backend')

@section('user')
<li class="nav-item dropdown d-none d-lg-flex">
    <a class="nav-link dropdown-toggle nav-btn" id="actionDropdown" href="{{ Route('user.create') }}">
        <span class="btn">+ Create new</span>
    </a>
</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 m-auto">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table id="usertable" class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Sl. No.</th>
                    <th class="text-center">User Name</th>
                    <th class="text-center">User Email</th>
                    <th class="text-center">User Role</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td class="text-center">{{ $user->name }}</td>
                    <td class="text-center">{{ $user->email }}</td>
                    <td class="text-center">
                        @if ($user->role == 1)
                            Admin
                        @endif
                        @if ($user->role == 2)
                            Teacher
                        @endif
                        @if ($user->role == 3)
                            Student
                        @endif
                    </td>
                    <td class="text-center">
                        @if (Auth::id() != $user->id)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form method="POST" action="{{ route('user.admin', $user->id) }}">
                                @csrf

                                <button type="submit" class="btn btn-success btn-sm">Make Admin</button>

                            </form>
                            <form method="POST" action="{{ route('user.teacher', $user->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm">Make Teacher</button>
                            </form>
                            <form method="POST" action="{{ route('user.student', $user->id) }}">
                                @csrf
                                @if ($user->role != 2)
                                <button type="submit" class="btn btn-warning btn-sm">Make Student</button>
                                @endif
                            </form>
                            <form method="POST" action="">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('footer_script')
<script>
    $(document).ready(function () {
        $('#usertable').DataTable();
    });
</script>
@endsection

