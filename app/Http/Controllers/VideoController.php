<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class VideoController extends Controller
{
    public function index()
    {

        $id = Session::get('id');
        $quality = $_GET['quality'];

        return redirect()->back()->with('link',  url('videos/'.$quality.'/'.$id.'('.$quality.').mp4'));

        /*
        $id = Session::get('id');
        $status = Session::get('status');
        $result = false;


        if ( $status == "uploaded" ) $result = $this->checkFiles($id);
        if ( $result )
        {
            Session::put('status', $status ='converted');
            Log::info('Video status query, status: '.$status.' , ID: '.$id);
        }
        return view('video.video', ['id'=>$id,'status'=>$status, 'quality' =>$quality ]);
        */
    }
    /*
    public function checkFiles($id){
        $path = (public_path('storage\\'));
        if ( file_exists( $path."\\360\\".$id.'(360).mp4' ) && file_exists( $path."\\720\\".$id.'(720).mp4' ) ) return true;
        return false;
    }
    */
}
