@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">New project</div>
                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{ Form::open(array('url' => route('project.update', $project), 'method'=> 'PUT')) }}

                        {{Form::label('name', 'Project\'s name *')}}
                        {{Form::text('name', $project->name)}}

                        {{Form::label('description', 'Project\'s description (optional)')}}
                        {{Form::textarea('description', $project->description)}}

                        {{Form::submit('Update')}}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
