@extends('layouts.editor')

@section('content')
    <div class="container-fluid">

    </div>
    <div class="container">
        <div class="row">
            <div id="notifBox">
                <notifbox :user="{{$userInfo}}" project="{{$project->name}}"></notifbox>
            </div>
        </div>
    </div>

@endsection
