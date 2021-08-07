<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImageResizeHelper
{

    public static function uploadPostImageWithSizes($request_file, $storage_folder = 'uploads')
    {

        $date = Carbon::now();
        $monthName = $date->format('FY');
        $folder_to_upload = $storage_folder . '/' . $monthName;

        $original_path = $request_file->store($folder_to_upload, 'public'); //upload full image and get link

        $file_name = pathinfo($request_file->hashName(), PATHINFO_FILENAME); //get name without extension of uploaded file
        $file_extension = pathinfo($request_file->hashName(), PATHINFO_EXTENSION); //get extension of uploaded file

        $thumbnail_name = $file_name . '-thumbnail' . '.' . $file_extension;
        $large_name = $file_name . '-large' . '.' . $file_extension;

        Image::make($request_file)->resize(50, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save('storage/' . $folder_to_upload . '/' . $thumbnail_name); //create thumbnail

        Image::make($request_file)->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save('storage/' . $folder_to_upload . '/' . $large_name); //create large

        return $original_path;
    }

    public static function getResizedImage($path, $size = 'full')
    {
        $file_dir = pathinfo($path, PATHINFO_DIRNAME);
        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $file_extension = pathinfo($path, PATHINFO_EXTENSION);

        $thumbnail_path = $file_dir . '/' . $file_name . '-thumbnail' . '.' . $file_extension;
        $large_path =  $file_dir . '/' . $file_name . '-large' . '.' . $file_extension;

        switch ($size) {
            case 'full':
                return Storage::url($path);
                break;

            case 'large':
                return Storage::url($large_path);
                break;

            case 'thumbnail':
                return Storage::url($thumbnail_path);
                break;
        }
    }
}
