@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome {{$test}}</div>
                    <div class="panel-body">
                        <p>hello {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
