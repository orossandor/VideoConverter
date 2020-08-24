@extends('master')

@section('title', 'Video Converter - Video')

@section('content')
    <h1>Video Status</h1>

    @if ($status == "not-uploaded")
        <p>No video has uploaded yet!</p>
        <a href="/">Back to upload a video</a>
    @elseif ( $status == "uploaded" )
        <p>Video has uploaded, but not converted yet!</p>
        <p>Uploaded video ID: {{$id}} </p>
        <a href="/">Back</a>
    @elseif ( $status == "converted" )
        <p>Video converted!</p>
        <a href="/">Back</a>
    @endif


@endsection
