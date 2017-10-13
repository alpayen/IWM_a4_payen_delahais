@extends('layouts.editor')

@section('content')
    <div class="container-fluid editor-container" >
        <div id="editorcontainer">
        <div id="codebox">
            <codebox :user="{{$userInfo}}" project="{{$project->name}}" project_id="{{$project->id}}" type="{{$type}}"></codebox>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div id="notifBox">
                    <notifbox :user="{{$userInfo}}" project="{{$project->name}}"></notifbox>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
