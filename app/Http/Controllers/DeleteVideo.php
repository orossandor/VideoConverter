<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class DeleteVideo extends Controller
{
    public function delete()
    {
        $id = Session::get('id');
        $extension = Session::get('extension');

        $video      = (public_path('videos\\'.$id.'.'.$extension));
        $video360   = (public_path('videos\\360\\'.$id.'(360).mp4'));
        $video720   = (public_path('videos\\720\\'.$id.'(720).mp4'));

        try{
            if (file_exists($video    )) unlink($video);
            if (file_exists($video360 )) unlink($video360);
            if (file_exists($video720 )) unlink($video720);
        } catch(Exception $ex){
            return redirect()->back()->with('deleteMessage', 'File delete was not succesful! Try it later!');
        }

        Session::put('origname','undefined');
        Session::put('extension','undefined');
        Session::put('id','undefined');
        Session::put('status','not-uploaded');

        Log::info('Video deleted, ID: '.$id);

        return redirect('/');

    }
}
