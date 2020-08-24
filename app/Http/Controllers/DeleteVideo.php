<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DeleteVideo extends Controller
{
    public function delete(){
        $id = Session::get('id');
        $extension = Session::get('extension');
        $video = (storage_path('app\\public\\'.$id.'.'.$extension));
        if ( file_exists( $video ) ){
            unlink($video);
            Session::put('origname','undefined');
            Session::put('extension','undefined');
            Session::put('id','undefined');
            Session::put('status','not-uploaded');
        }

        return redirect('/');
    }
}
