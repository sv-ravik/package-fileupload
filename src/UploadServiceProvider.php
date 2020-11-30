<?php
namespace Xpert\upload;
use Illuminate\Support\ServiceProvider;
use Xpert\upload\Http\Controllers\FileUpload;

class UploadServiceProvider extends ServiceProvider
{
    public function boot()
    {
        
    }
    public function register()
    {
        $this->app->bind('fileupload',function(){
            return new FileUpload;
        });
    }
}