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
                        <input type="test" class="form-control" placeholder="Email" name="search">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success">Search</button>
                </form>
            </div>
          </div>

    </div>
   @if (isset($searchs))
   <div class="col-md-12">
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
                        <td>---</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   @endif
</div>

@endsection
