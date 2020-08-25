<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class VideoController extends Controller
{
    public function index()
    {

        $id = Session::get('id');
        $status = Session::get('status');
        $result = false;

        if ( $status == "uploaded" ) $result = $this->checkFiles($id);
        if ( $result )
        {
            Session::put('status','converted');
            $status = Session::get('status');
            Log::info('Video status query, status: '.$status.' , ID: '.$id);
        }
        return view('video.video', ['id'=>$id,'status'=>$status ]);
    }

    public function checkFiles($id){
        $path = (storage_path('app\\public\\'));
        if ( file_exists( $path.$id.'(360).mp4' ) && file_exists( $path.$id.'(720).mp4' ) ) return true;
        return false;
    }
}
