<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class VideoConvertJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;
    protected $extension;
    protected $quality;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $extension,$quality)
    {
        $this->id = $id;
        $this->extension = $extension;
        $this->quality = $quality;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $publicPath = (public_path('storage\\'));
        $ffmpegPath = "C:\\ffmpeg\\bin\\ffmpeg";
        $cmd = ($ffmpegPath ." -i ".$publicPath.$this->id.".".$this->extension." -vcodec libx264 -acodec aac -crf 25 -level 3.0 -profile:v baseline -vf scale=-2:".$this->quality." ".$publicPath."\\".$this->quality."\\". $this->id."(".$this->quality.").mp4 ");
        shell_exec($cmd);
    }
}
