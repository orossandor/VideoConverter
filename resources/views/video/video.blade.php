@extends('master')

@section('title', 'Video Converter - Video')

@section('content')
    <h1>Video</h1>

        @if ( isset($result) && $result = "false" )
            {{$message}}
        @else
            <video width="720" controls>
                <source src=" {{ url('videos/'.$quality.'/'.$id.'('.$quality.').mp4') }} " type="video/mp4">
                    Your browser does not support the video tag.
            </video>
            <br>
        @endif

@endsection
