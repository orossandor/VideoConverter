@extends('master')

@section('title', 'Video Converter')

@section('content')
    <h1>Upload a new video</h1>

    @if ( isset($status) && $status == "not-uploaded" )

        @if (count($errors) > 0 )
            <p><strong>Upload unsuccesful:</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="video/upload" enctype="multipart/form-data" method="POST">
            <input type="file" name="video" id="video">
            @csrf
            <button type="submit">Upload</button>
        </form>

        @else
            Succesful upload, video ID: <strong> {{$id}} </strong>
            <form action="/video" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="delete">Delete video</button>
            </form>

            @if (session('deleteMessage'))
                <p class="errorText"> {{session('deleteMessage')}} </p>
            @endif

            <form action="/video" method="GET">
                <select name="quality" id="">
                    <option value="720" {{ session('selectedQuality') == "720" ? 'selected' : '' }} class="option">720p</option>
                    <option value="360" {{ session('selectedQuality') == "360" ? 'selected' : '' }} class="option">360p</option>
                </select>
                <button type="submit">Request link</button>
            </form>

    @endif



    @if ( session('link'))
        <a href="{{ session('link') }}" target="_blank">{{session('link')}}</a>
    @endif


@endsection
