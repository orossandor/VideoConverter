<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class VideoController extends Controller
{
    public function creatlink()
    {
        $id = Session::get('id');
        $quality = $_GET['quality'];

        //Return with $quality for option html tag
        return redirect()->back()->with('link', '/video/'.$quality.'/'.$id)->with('selectedQuality', $quality);
    }


    public function  showvideo(Request $request){
        $pathToRequestedFile = public_path('videos/'.$request->quality.'/'.$request->id.'('.$request->quality.').mp4');

        if(file_exists($pathToRequestedFile)) {
            Session::put('status', $status ='converted');
            Log::info('Video status query, status: '.$status.' , ID: '.$request->id);
            return response()->view('video.video', ['quality' => $request->quality, 'id' => $request->id],200);
        } else {
            $defaultVideoPath = url('videos/working.gif');
            return response()->view('video.working',['defaultVideoPath' => $defaultVideoPath],404);
        }
    }

}
