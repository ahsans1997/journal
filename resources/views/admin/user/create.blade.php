@extends('layouts.backend')

@section('content')

<div class="row">
    <div class="col-md-7 m-auto">
        <div class="card border-primary mb-3" style="">
            <div class="card-header">Header</div>
            <div class="card-body text-primary">
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Full Name</label>
                      <input type="text" class="form-control" placeholder="Full Name" name="name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" placeholder="Enter email" name="email">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" placeholder="Password" name="password">
                        @error('Password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

