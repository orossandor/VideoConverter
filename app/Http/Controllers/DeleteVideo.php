<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class DeleteVideo extends Controller
{
    public function delete()
    {
        $id = Session::get('id');
        $extension = Session::get('extension');

        $video      = (public_path('storage\\'.$id.'.'.$extension));
        $video360   = (public_path('storage\\360\\'.$id.'(360).mp4'));
        $video720   = (public_path('storage\\720\\'.$id.'(720).mp4'));

        if ( file_exists( $video ) )    unlink($video);
        if ( file_exists( $video360 ) ) unlink($video360);
        if ( file_exists( $video720 ) ) unlink($video720);

        Session::put('origname','undefined');
        Session::put('extension','undefined');
        Session::put('id','undefined');
        Session::put('status','not-uploaded');

        Log::info('Video deleted, ID: '.$id);

        return redirect('/');
    }
}
