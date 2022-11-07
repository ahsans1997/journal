@extends('layouts.backend')

@section('content')

<div class="row">
    <div class="col-md-8 m-auto">
        <div class="card border-success mb-3" style="border : 1px solid">
            <div class="card-header">Search</div>
            <div class="card-body text-success">
                <form method="GET" action="">
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Seach By Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Email" name="search">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success">Search</button>
                </form>
            </div>
          </div>

    </div>
   @if (isset($searchs))
   <div class="col-md-12 mb-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($searchs as $search)
                    <tr>
                        <td>{{ $search->name }}</td>
                        <td>{{ $search->email }}</td>
                        <td>
                            <form method="POST" action="{{ route('journal.add') }}">
                                @csrf
                                <input type="hidden" value="{{ $journal_id }}" name="journal_id">
                                <input type="hidden" value="{{ $search->id }}" name="user_id">
                                <button type="submit" class="btn btn-success">Assain To Project</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   @endif
   <div class="col-md-12">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Journal Name</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assained as $assain)
                <tr>
                    <td>{{ $assain->journal->journal_name }}</td>
                    <td>{{ $assain->user->name }}</td>
                    <td>{{ $assain->user->email }}</td>
                    <td>
                        <form method="POST" action="{{ route('journal.delete', $assain->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete To Project</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection
