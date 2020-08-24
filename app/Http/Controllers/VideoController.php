<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    public function index()
    {

        $origname = Session::get('origname');
        $id = Session::get('id');
        $status = Session::get('status');

        return view('video.video', ['origname' => $origname,'id'=>$id,'status'=>$status ]);
    }
}
