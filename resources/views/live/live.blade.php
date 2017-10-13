@extends('layouts.editor')

@section('content')
    <div class="container-fluid live-container" >
        <style>
            {!!  $css !!}
        </style>
        {!!  $html !!}
        <script>
            {!!  $js !!}
        </script>
    </div>
@endsection
