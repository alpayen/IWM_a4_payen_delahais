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
                            {{Form::text('name', Null,  array('class' => 'form-control'))}}

                            {{Form::label('description', 'Project\'s description (optional)')}}
                            {{Form::textarea('description' , Null , array('class' => 'form-control'))}}

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
                            <span class="addEmailInput">Click on me me to add another collaborator</span>
                            <div class="inputGroupSingleEmpty" id="emailInputEmpty">
                                <input class="form-control" type="email" name="emails[]">
                            </div>
                        </div>
                            {{Form::submit('Create', array('class' => 'btn btn-primary'))}}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
