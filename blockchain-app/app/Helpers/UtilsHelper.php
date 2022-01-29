<?php

namespace App\Helpers;

class UtilsHelper
{
    public static function saveFile($file, $path, $filename, $disk): void
    {
        $file->storeAs($path, $filename, $disk);
    }

    public static function generateRandomToken()
    {
        return md5(rand(1, 10) . microtime());
    }
}
