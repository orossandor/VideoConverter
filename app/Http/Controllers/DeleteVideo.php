<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DeleteVideo extends Controller
{
    public function delete()
    {
        $id = Session::get('id');
        $extension = Session::get('extension');

        $video      = (storage_path('app\\public\\'.$id.'.'.$extension));
        $video360   = (storage_path('app\\public\\'.$id.'(360).mp4'));
        $video720   = (storage_path('app\\public\\'.$id.'(720).mp4'));

        if ( file_exists( $video ) )    unlink($video);
        if ( file_exists( $video360 ) ) unlink($video360);
        if ( file_exists( $video720 ) ) unlink($video720);

        Session::put('origname','undefined');
        Session::put('extension','undefined');
        Session::put('id','undefined');
        Session::put('status','not-uploaded');

        return redirect('/');
    }
}
