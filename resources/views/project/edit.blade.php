@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit project</div>
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

                            <div class="emailsInputHolder">
                                @if(session()->has('emails'))
                                    @foreach($project->getUsersEmail() as $email)
                                        @if($email != "")
                                            <div class="inputGroupSingle">
                                                <input class="emailInput" type="email" name="emails[]" value="{{$email}}">
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <div class="inputGroupSingleEmpty" id="emailInputEmpty">
                                <input class="emailInput" type="email" name="emails[]">
                            </div>

                            <span class="addEmailInput">Click on me me to add another collaborator</span>

                        {{Form::submit('Update')}}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
