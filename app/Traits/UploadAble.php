<?php

namespace App\Traits;

use Aws\S3\S3Client;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Trait UploadAble
 * @package App\Traits
 */
trait UploadAble
{
    private $s3Client;
    private $bucket;


    public function uploadOne(UploadedFile $file, $folder = null)
    {

        $path = Storage::disk('s3')->put($folder, $file);

        return Storage::disk('s3')->url($path);

    }

    /**
     * @param null $path
     * @param string $disk
     */
    public function deleteOne($path = null, $disk = 's3')
    {

        $filePath = parse_url($path);
        Storage::disk($disk)->delete($filePath['path']);

    }


//    /**
//     * @param UploadedFile $file
//     * @param null $folder
//     * @param string $disk
//     * @param null $filename
//     * @return false|string
//     */
//    public function uploadOne(UploadedFile $file, $folder = null, $disk = 'public', $filename = null)
//    {
//        $name = !is_null($filename) ? $filename : Str::random(25);
//
//        return $file->storeAs(
//            $folder,
//            $name . "." . $file->getClientOriginalExtension(),
//            $disk
//        );
//    }
//
//    /**
//     * @param null $path
//     * @param string $disk
//     */
//    public function deleteOne($path = null, $disk = 'public')
//    {
//        Storage::disk($disk)->delete($path);
//    }



}
