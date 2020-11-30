# package-fileupload
A package for convenient way to upload files to the different storages

[![Latest Version](https://img.shields.io/github/release/ravikoriya/package-fileupload?style=flat-square)](https://github.com/ravikoriya/package-fileupload/releases)
[![Issues](https://img.shields.io/github/issues/ravikoriya/package-fileupload?style=flat-square)](https://github.com/ravikoriya/package-fileupload/issues)
[![Stars](https://img.shields.io/github/stars/ravikoriya/package-fileupload?style=flat-square)](https://github.com/ravikoriya/package-fileupload/stargazers)
[![Total Downloads](https://img.shields.io/packagist/dt/guzzlehttp/guzzle.svg?style=flat-square)](https://packagist.org/packages/guzzlehttp/guzzle)

## Installation
1. Run the command below to add this package:  
```
composer require xpert/upload
```

2. Open your `config/app.php` and add the following to the providers array:
```php
Xpert\upload\UploadServiceProvider::class
```

3. Open your `config/app.php` and add the following to the aliases array:
```php
'FileUpload' => Xpert\upload\Facade\FileuploadFacade::class
```

4. Run the command below to publish the package:  
```
php artisan vendor:publish
```

## Configuration

Go to the file
```
config/file_uploads.php
```
There you have an ability to set:
1. default storage to upload file (default is: local)
2. default image quality (default is: 100)
3. default folder to put your uploads (default is: public/user-uploads)

## Usage Controller
#### To upload file:
```php
public function upload(Request $request)
{   
    // This will upload your file to the upload package composer
    FileUpload::upload($request,'uploads/images','img');

}
```

