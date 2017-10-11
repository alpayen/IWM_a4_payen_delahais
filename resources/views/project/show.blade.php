@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$project->name}} |
                        <a href="{{route('project.edit', $project)}}">Edit</a> |
                        {{ Form::open(array('url' => route('project.destroy', $project), 'method'=>'delete')) }}
                            {{Form::submit('Delete (add confirmation pop up here)')}}
                        {{ Form::close() }}
                    </div>
                    <div class="panel-body">
                       <p>the good stuff will come later</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
