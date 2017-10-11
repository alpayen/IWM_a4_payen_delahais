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

                        {{ Form::open(array('url' => route('project.store'))) }}

                        {{Form::label('name', 'Project\'s name *')}}
                        {{Form::text('name')}}

                        {{Form::label('description', 'Project\'s description (optional)')}}
                        {{Form::textarea('description')}}

                        <br>
                        <div class="emailsInputHolder">
                            @if(session()->has('emails'))
                                @foreach(session()->pull('emails')[0] as $email)
                                    @if($email != "")
                                        <div class="inputGroupSingle">
                                            <input class="emailInput" type="email" name="emails[]" value="{{$email}}">
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            <div class="inputGroupSingleEmpty" id="emailInputEmpty">
                                <input class="emailInput" type="email" name="emails[]">
                            </div>
                        </div>


                        <span class="addEmailInput">Click on me me to add another collaborator</span>

                        {{Form::submit('Create')}}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
