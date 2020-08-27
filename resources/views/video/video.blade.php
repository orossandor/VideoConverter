@extends('master')

@section('title', 'Video Converter - Video')

@section('content')

        <!-- Authentication fail -->
        @if ( isset($result) && $result = "false" )
           <strong class="errorText">{{$message}}</strong>
        @else
        <!-- Video -->
            <h1>Video: {{$id}} in {{$quality}}p</h1>
            <video width="720" controls>
                <source src=" {{ url('videos/'.$quality.'/'.$id.'('.$quality.').mp4') }} " type="video/mp4">
                    Your browser does not support the video tag.
            </video>
            <br>
        @endif

@endsection
