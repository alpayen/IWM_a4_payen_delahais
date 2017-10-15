@extends('template.app2')

@section('content')
    <div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome {{$user->name}}
                        <a href="{{route('project.create')}}">Créer un projet</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <h2 class="text-center">My projects</h2>
                            <ul class="list-group">
                                @if(count($createdProjects ) != 0)
                                    @foreach($createdProjects as $createdProject)
                                        <li class="lien list-group-item col-md-6">
                                            <a class="list-group-item list-group-item-info"
                                               href="{{route('project.live',['id'=>$createdProject->id])}}">{{$createdProject->name}}</a>
                                            @if($createdProject->description)
                                                <p>{{$createdProject->description}}</p>
                                            @endif
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            <h2 class="text-center">Shared with me</h2>
                            <ul>

                                @if(count($projects) != 0)
                                    @foreach($projects as $project)
                                        <li class="lien list-group-item col-md-6">
                                            <a class="list-group-item list-group-item-info"
                                               href="{{route('project.live',['id'=>$project->id])}}">{{$project->name}}</a>
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
@endsection
