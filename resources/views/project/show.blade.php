@extends('layouts.editor')

@section('content')
    <div class="container-fluid editor-container">
        <div id="sidebar">
            Here the folders
        </div>
        <div id="codebox">
            <codebox></codebox>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div id="notifBox">
                    <notifbox :user="{{$userInfo}}" project="{{$project->name}}"></notifbox>
                </div>
            </div>
        </div>
    </div>
@endsection
