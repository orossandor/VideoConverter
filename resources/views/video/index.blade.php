@extends('master')

@section('title', 'Video Converter')

@section('content')
    <h1>Upload a new video</h1>

    @if ( $status == "not-uploaded" )
    <form action="video/upload" enctype="multipart/form-data" method="POST">
        <input type="file" name="video" id="video"><br>
        @csrf
        <button type="submit">Upload</button>
    </form>

    @else



    @endif

    <a href="/video">Check video status</a>

@endsection
