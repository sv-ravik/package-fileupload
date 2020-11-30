<?php
namespace Xpert\upload\Facade;

use Illuminate\Support\Facades\Facade;

class FileuploadFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'fileupload';
    }
}