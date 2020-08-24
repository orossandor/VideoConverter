<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    public function index()
    {

        $origname = Session::get('origname');
        $id = Session::get('id');
        $status = Session::get('status');
        $result = false;

        if ( $status == "uploaded" ) $result = $this->checkFiles($id);
        if ( $result )
        {
            Session::put('status','converted');
            $status = Session::get('status');
        }
        return view('video.video', ['origname' => $origname,'id'=>$id,'status'=>$status ]);
    }

    public function checkFiles($id){
        $path = (storage_path('app\\public\\'));
        if ( file_exists( $path.$id.'(360).mp4' ) && file_exists( $path.$id.'(720).mp4' ) ) return true;
        return false;
    }
}
