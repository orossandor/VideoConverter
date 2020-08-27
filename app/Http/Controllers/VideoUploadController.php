<?php

namespace App\Http\Controllers;

use App\Jobs\VideoConvertJob;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class VideoUploadController extends Controller
{

    public function index(){
        return redirect('/');
    }

    public function upload(Request $request)
    {

        $id = Session::get('id');
        $status = Session::get('status');
        $result = "Upload failed!";

        if ( $status == 'not-uploaded' ){
            //Validate
            $this->validate( $request, [
                'video' => 'required|mimes:mpeg,mpg,mpe,qt,mov,avi,movie,3gp|max:40960'
            ]);

            //Session
            Session::put('extension', $extension = $request->video->guessExtension());
            Session::put('id', $id = Str::random(11));

            //Upload
            try{
                $request->video->move('videos/', $id.'.'.$extension);
                $result = "Upload succesful!";
            } catch(Exception $ex){
                return redirect()->back()->with('messageUploadFail', $result);
            }

            //Check&Start job
            if ( file_exists(('videos/' . $id.'.'.$extension)) ){
                Session::put('status','uploaded');
                $this->startJobs($id,$extension);
                Log::info('Video uploaded, new ID: '.$id);
            }

        }

        return redirect()->back()->with('messageUploadSucces', $result);
    }

    public function startJobs($id,$extension)
    {
        $job360p = (new VideoConvertJob($id,$extension, "360"))->delay(Carbon::now()->addSeconds(3));
        dispatch($job360p);

        $job720p = (new VideoConvertJob($id,$extension, "720"))->delay(Carbon::now()->addSeconds(3));
        dispatch($job720p);
    }
}
