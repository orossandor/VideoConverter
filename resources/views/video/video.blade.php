@extends('master')

@section('title', 'Video Converter - Video')

@section('content')
    <h1>Video Status</h1>

    @if ($status == "not-uploaded")
        <p>No video has uploaded yet!</p>
        <a href="/">Back to upload a video</a>
    @else

    @endif


@endsection
