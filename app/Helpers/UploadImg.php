<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use Storage;
use App\Models\Media;
class UploadImg{
    /*upload một ảnh*/
    public static function UploadImg($param, $folder) {
        list($extension, $content) = explode(';', $param);
        $tmpExtension = explode('/', $extension);
        preg_match('/.([0-9]+) /', microtime(), $m);
        $fileName = sprintf('img%s%s.%s', date('YmdHis'), $m[1], $tmpExtension[1]);
        $content = explode(',', $content)[1];
        $storage = Storage::disk('public');

        $checkDirectory = $storage->exists($folder);

        if (!$checkDirectory) {
            $storage->makeDirectory($folder);
        }

        $storage->put($folder . '/' . $fileName, base64_decode($content), 'public');

        return $folder . '/'. $fileName;
    }

    /*upload list ảnh*/
    public static function UploadImgMedia($param, $folder) {
        foreach($param as $img){
            list($extension, $content) = explode(';', $img);
            $tmpExtension = explode('/', $extension);
            preg_match('/.([0-9]+) /', microtime(), $m);
            $fileName = sprintf('img%s%s.%s', date('YmdHis'), $m[1], $tmpExtension[1]);
            $content = explode(',', $content)[1];
            $storage = Storage::disk('public');

            $checkDirectory = $storage->exists($folder);

            if (!$checkDirectory) {
                $storage->makeDirectory($folder);
            }

            $storage->put($folder . '/' . $fileName, base64_decode($content), 'public');

            $url =  $folder . '/' . $fileName;

            $media = new Media;
            $media -> link =  $url;
            $media -> save();
            $arr_image_gallery[] = $media -> id;

        }
        return $arr_image_gallery;
    }
}
