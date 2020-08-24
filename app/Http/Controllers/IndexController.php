<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function __construct()
    {
        Session::put('origname','undefined');
        Session::put('extension','undefined');
        Session::put('id','undefined');
        Session::put('status','not-uploaded');
    }

    public function index()
    {
        $status = Session::get('status');
        return view('video.index',['status' => $status ]);
    }


}
