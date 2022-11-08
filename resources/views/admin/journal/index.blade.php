@extends('layouts.backend')

@section('journal')
<li class="nav-item dropdown d-none d-lg-flex">
    <a class="nav-link dropdown-toggle nav-btn" id="actionDropdown" href="{{ Route('journal.create') }}">
        <span class="btn">+ Create new</span>
    </a>
</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <thead>
                    <tr>
                        <th class="text-center">Sl. no.</th>
                        <th class="text-center">Journal / Research Paper</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Department Name</th>
                        <th class="text-center">Submited By</th>
                        <th class="text-center">Approval</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">File</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($journals as $journal)
                        @if ($journal->user_id == Auth::id())
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td class="text-center">{{ $journal->journal_name }}</td>
                                <td class="text-center">{{ $journal->journal_description }}</td>
                                <td class="text-center">{{ $journal->department->department_name }}</td>
                                <td class="text-center">{{ $journal->user->name }}</td>
                                <td class="text-center">{{ ($journal->approve == 1) ? "Not Approve" : "Approved" }}</td>
                                <td class="text-center">{{ $journal->journal_image }}</td>
                                <td class="text-center">{{ $journal->journal_file }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <a href="{{ route('journal.assign', $journal->id) }}" class="btn btn-success">Assign</a>

                                        <a href="{{ route('journal.edit',$journal->id) }}" class="btn btn-info">Edit</a>
                                        <form method="POST" action="{{ route('journal.destroy', $journal->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @empty

                    @endforelse
                    @if ($journal->user_id != Auth::id())
                    <tr>
                        <td class="text-danger text-center" colspan="50">NO DATA FOUND</td>
                    </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection

