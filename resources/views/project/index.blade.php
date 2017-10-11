@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome {{$user->name}}</div>
                    <div class="panel-body">
                        <div class="row">
                            <h2>My projects</h2>
                            <ul>
                                @if($projects)
                                    @foreach($projects as $project)
                                        <li>
                                            <a href="{{route('project',['id'=>$project->id])}}"></a>
                                            @if($project->description)
                                                <p>{{$project->description}}</p>
                                            @endif
                                        </li>
                                    @endforeach
                                @else
                                    <li><a href="{{route('project.create')}}">Créer un projet</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
