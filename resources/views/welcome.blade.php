@extends('template.app')

@section('content')
    <div class="container">
        <h1 class="text-center">
            Bienvenue Sur ProjectDev
        </h1>
        <h2 class="text-center">< New Project ></h2>
        <div class="row">
                <div class="col-md-6 panel-body text-center">
                        <h2>Commence le Projet</h2>
                        <p>
                            You should <a class="lead" href="{{route('register')}}">register</a>
                            to start your journey
                        </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore</p>
                </div>

                <div class="col-md-6 panel-body text-center">
                    <h2>Revient sur ton Projet</h2>
                    <p>You should <a class="lead" href="{{route('login')}}">login</a> to start your journey</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore</p>
                </div>
        </div>
        <h2 class="text-center">< /End Project ></h2>
    </div>

@endsection
