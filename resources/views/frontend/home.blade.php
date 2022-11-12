@extends('layouts.frontend')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="search" style="margin-bottom: 60px;">
                <form action="" method="get">
                    <input type="text" class="form-control mb-2" name="search">
                    <button class="btn btn-info"><i class="fa fa-search"></i> Search</button>
                </form>
            </div>
            <h3><u><b>Journal List</b></u></h3>
            @if (isset($search_journals))
                @foreach ($search_journals as $journal)
                <div class="journal mb-2" style="border: 1px solid gray; border-radius: 4px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('uploads/journals') }}/{{ $journal->journal_image }}" alt=""
                                    class="img-fluid"
                                    style="width: 145px; margin-top: 5px; border: 2px solid gray; padding: 2px;">
                            </div>
                            <div class="col-md-9">
                                <h5>{{ $journal->journal_name }}</h5>
                                <span>submitted By : {{ $journal->user->name }} |</span><span> Department :
                                    {{ $journal->department->department_name }}</span>
                                <p>{{ $journal->journal_description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                @foreach ($journals as $journal)
                <div class="journal mb-2" style="border: 1px solid gray; border-radius: 4px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('uploads/journals') }}/{{ $journal->journal_image }}" alt=""
                                    class="img-fluid"
                                    style="width: 145px; margin-top: 5px; border: 2px solid gray; padding: 2px;">
                            </div>
                            <div class="col-md-9">
                                <h5>{{ $journal->journal_name }}</h5>
                                <span>submitted By : {{ $journal->user->name }} |</span><span> Department :
                                    {{ $journal->department->department_name }}</span>
                                <p>{{ $journal->journal_description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        <div class="col-md-3">Ahsan</div>
    </div>
</div>

@endsection
