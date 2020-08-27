@extends('master')

@section('title', 'Video Converter')

@section('content')
    <h1>Upload a new video</h1>

    <!-- ---------- No uploaded video - uploading ---------- -->
    @if ( isset($status) && $status == "not-uploaded" )

        <!-- Error with uploading -->
        @if (count($errors) > 0 )
            <p><strong>Upload unsuccesful:</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <!-- Delete succeful -->
        @if (session('deleteMessageSucces'))
                <p class="confirmText"> {{session('deleteMessageSucces')}} </p>
        @endif

        <!-- Upload  -->
        <form action="video/upload" enctype="multipart/form-data" method="POST">
            <input type="file" name="video" id="video">
            @csrf
            <button type="submit">Upload</button>
        </form>


    <!-- ---------- Uploaded video - request link ---------- -->
    @else
            <!-- Uploading result -->
            @if (session('messageUploadSucces'))
                <p class="confirmText"> {{session('messageUploadSucces')}} </p>
            @endif

            @if (session('messageUploadFail'))
                <p class="errorText"> {{session('messageUploadFail')}} </p>
            @endif

            <strong>Video ID: {{$id}} </strong>

            <!-- Error with deleting -->
            @if (session('deleteMessageFail'))
                <p class="errorText"> {{session('deleteMessageFail')}} </p>
            @endif

            <!-- Delete -->
            <form action="/video" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="delete">Delete video</button>
            </form>



            <!-- Link request -->
            <form action="/video" method="GET">
                <select name="quality" id="">
                    <option value="720" {{ session('selectedQuality') == "720" ? 'selected' : '' }} class="option">720p</option>
                    <option value="360" {{ session('selectedQuality') == "360" ? 'selected' : '' }} class="option">360p</option>
                </select>
                <button type="submit">Request link</button>
            </form>

    @endif


    <!-- ---------- Link for converted videos ---------- -->
    @if ( session('link'))
        <a href="{{ session('link') }}" target="_blank" id="link">{{session('link')}}</a> <button id="copyButton">Copy</button>
    @endif


@endsection
