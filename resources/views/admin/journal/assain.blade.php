@extends('layouts.backend')

@section('content')

<div class="row">
    <div class="col-md-8 m-auto">
        <div class="card border-success mb-3" style="border : 1px solid">
            <div class="card-header">Search</div>
            <div class="card-body text-success">
                <form method="GET" action="{{ route('journal.add') }}">
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Seach By Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" placeholder="Email" name="filter[email]">
                      </div>
                    </div>
                    <button class="btn btn-success">Search</button>
                </form>
            </div>
          </div>

    </div>
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
