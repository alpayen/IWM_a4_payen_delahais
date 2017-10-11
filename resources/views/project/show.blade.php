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
                        <div id="codingbox">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in elementum quam.
                            Integer commodo, lectus id imperdiet vestibulum, magna nisi suscipit ligula, sit
                            amet scelerisque tellus mauris ut sapien. Etiam congue elit nisi, eu sollicitudin
                            justo ultricies ut. Quisque sed orci elit. Morbi id consectetur neque. Nam hendrerit
                            pharetra felis, vel faucibus neque. Ut id sem sagittis, congue urna vitae, dignissim
                            lorem. Nullam feugiat ante vitae erat pretium ultricies. In at volutpat ex. Fusce vitae
                            hendrerit dui. Nam sodales elementum lorem, vel malesuada augue auctor in. Integer non
                            turpis maximus, laoreet felis vitae, congue turpis. Morbi aliquam risus a ullamcorper
                            maximus. Sed fringilla sagittis leo, et facilisis lectus aliquam id. Aenean consequat
                            elit in tortor ultrices, vel accumsan diam viverra. Fusce ut neque sed dui semper pulvinar.

                        </div>
                        <div id="notifBox">
                            <notifbox :user="{{$userInfo}}" project="{{$project->name}}"></notifbox>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
