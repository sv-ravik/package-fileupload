<?php
namespace Xpert\upload\Http\Controllers;
use ImageResize;

class FileUpload
{
    public function upload(object $request,string $location,string $file_field_name)
    {
        $request->validate([
            $file_field_name => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file = $request->file($file_field_name);  
        $destinationPath = $location;
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->move($destinationPath, $fileName);
    }

    public function uploadResize(object $request,string $locationOriginal,string $locationThumb,string $file_field_name)
    {
        $request->validate([
            $file_field_name => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
        $image                   =       $request->file($file_field_name);
        $fileName                =       time().'.'.$image->extension();
        $destinationPath         =       public_path($locationThumb);
        $img                     =       ImageResize::make($image->path());

        // --------- [ Resize Image ] ---------------

        $img->resize(150, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$fileName);

        // ----------- [ Uploads Image in Original Form ] ----------
        
        $destinationPath        =        public_path($locationOriginal);
        
        // store into database table
        // Image::create(['img' => $input['imagename'], 'thumbnail_img' => $input['imagename']]);
        return $image->move($destinationPath,$fileName);

    }
}