@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome {{$user->name}}
                        <a href="{{route('project.create')}}">Créer un projet</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <h2>My projects</h2>
                            <ul>
                                @if(count($createdProjects ) != 0)
                                    @foreach($createdProjects as $createdProject)
                                        <li>
                                            <a href="{{route('project.show',['id'=>$createdProject->id])}}">{{$createdProject->name}}</a>
                                            @if($createdProject->description)
                                                <p>{{$createdProject->description}}</p>
                                            @endif
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            <h2>Shared with me</h2>
                            <ul>

                                @if(count($projects) != 0)
                                    @foreach($projects as $project)
                                        <li>
                                            <a href="{{route('project.show',['id'=>$project->id])}}">{{$project->name}}</a>
                                            @if($project->description)
                                                <p>{{$project->description}}</p>
                                            @endif
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
