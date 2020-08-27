<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function __construct()
    {
        Session::put('status','not-uploaded');
        Session::put('id','undefined');
        Session::put('extension','undefined');
    }

    public function index()
    {
        $status = Session::get('status');
        $id = Session::get('id');
        return view('video.index',['status' => $status, 'id' => $id ]);
    }


}
