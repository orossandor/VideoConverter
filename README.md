# <p align="center">Video converter </p>


## About the project

Basically this project were made to upload, convert a video and creat an uniq link for it, with api key authentication.  
User can upload almost any type of video, and the application will convert it to the selected quality (360p / 720p) in mp4 format. 

## Technologies

- [Laravel 7.25.0](https://laravel.com/)
- [MySQL](https://www.mysql.com/)
- [FFmpeg](https://ffmpeg.org/)
- [Postman (for Authentication testing)](https://www.postman.com/)


## Launch

- To launch the project offline, a local server and MySql service is necessary
- To convert the videos, queue worker must be started manually ("php artisan queue:work")
- The conversion is made by FFmpeg, which location must be set corretly at: App\Http\Jobs\VideoConvertJob.php $ffmpegPath variable at line 39! 
- To open the video, there is authentication:
    - Ip address: limited to 127.0.0.1
    - Api key: Head information must contain: APP_KEY= --the secret api key--
    - Set these parameters at App\Http\Middleware\APIkey.php $secretKey and $acceptableIPs[]
    - You can disable authentication with variable $EnableAuthentication

## Usage

- Start the project as described at Launch
- Select a file which complies with the requiements (Error handling -> Upload)
- Press "Upload" and wait until "Upload succesful!" message
- Select the quality (360p / 720p)
- Press "Request link"
- You can open the video by clicking on the link appears under the button, or copy it

## Error handling

 - Upload:
    - "Upload failed!" message: General error while uploading
    - "The video field is required." message: No file was selected
    - The video must be a file of type: mpeg, mpg, mpe, qt, mov, avi, movie, 3gp, mkv, mp4
    - Size: maximum 40960 kb

- Delete: 
    - "File delete was not succesful! Try it later!" : Video was used by the converter. 


