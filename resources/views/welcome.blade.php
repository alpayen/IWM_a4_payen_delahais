@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>
                    <div class="panel-body">
                        <h1>
                            Welcome to this experiment.
                        </h1>
                        <p>
                            You should <a href="{{route('login')}}">login</a> or <a href="{{route('register')}}">register</a>
                            to start your journey
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
