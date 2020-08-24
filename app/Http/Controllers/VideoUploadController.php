<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class VideoUploadController extends Controller
{
    public function upload(Request $request){

        $origname = Session::get('origname');
        $id = Session::get('id');
        $status = Session::get('status');

        if ( $status == 'not-uploaded' ){
            $origname = $request->video->getClientOriginalName();
            Session::put('extension', $extension = $request->video->guessExtension());
            Session::put('id', $id = Str::random(11)) ;
            $request->video->storeAs('public', $id.'.'.$extension);
            if ( file_exists( (storage_path('app\\public\\'.$id.'.'.$extension)) ) ) Session::put('status','uploaded');
        }

        return redirect('/');
    }
}
