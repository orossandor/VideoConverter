@extends('master')

@section('title', 'Video Converter')

@section('content')
    <h1>Upload a new video</h1>

    @if ( isset($status) && $status == "not-uploaded" )

    @if (count($errors) > 0 )
        Upload unsuccesful: <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="video/upload" enctype="multipart/form-data" method="POST">
        <input type="file" name="video" id="video"><br>
        @csrf
        <button type="submit">Upload</button>
    </form>

    @else
        Succesful upload, video ID: {{$id}}
        <form action="video" method="POST">
            @csrf
            <button type="submit">Delete</button>
        </form>

    @endif

    <a href="/video">Check video status</a>

@endsection
