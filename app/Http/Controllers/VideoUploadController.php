<?php

namespace App\Http\Controllers;

use App\Jobs\VideoConvertJob;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class VideoUploadController extends Controller
{

    public function index(){
        return redirect('/');
    }

    public function upload(Request $request)
    {

        $id = Session::get('id');
        $status = Session::get('status');

        if ( $status == 'not-uploaded' ){
            Session::put('origname', $request->video->getClientOriginalName());
            Session::put('extension', $extension = $request->video->guessExtension());
            Session::put('id', $id = Str::random(11)) ;
            $request->video->storeAs('public', $id.'.'.$extension);
            if ( file_exists( (storage_path('app\\public\\'.$id.'.'.$extension)) ) ) Session::put('status','uploaded');
            $this->startJobs($id,$extension);
        }

        return redirect('/');
    }

    public function startJobs($id,$extension)
    {
        $job360p = (new VideoConvertJob($id,$extension, "360"))->delay(Carbon::now()->addSeconds(3));
        dispatch($job360p);

        $job720p = (new VideoConvertJob($id,$extension, "720"))->delay(Carbon::now()->addSeconds(3));
        dispatch($job720p);
    }
}
