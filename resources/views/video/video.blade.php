@extends('master')

@section('title', 'Video Converter - Video')

@section('content')
    <h1>Video</h1>

    @if ($status == "not-uploaded")
        <p>No video has uploaded yet!</p>
        <a href="/">Back to upload a video</a>
    @elseif ( $status == "uploaded" )
        <p>Video has uploaded, but not converted yet!</p>
        <img src=" {{ url('video/working.gif') }} " alt="converting under process"><br>
        <a href="/">Back</a>
    @elseif ( $status == "converted" )

        <video width="720" controls>
            <source src=" {{ url('video/'.$quality.'/'.$id.'('.$quality.').mp4') }} " type="video/mp4">
                Your browser does not support the video tag.
        </video>
        <br>
        <a href="/">Back</a>
    @endif


@endsection
