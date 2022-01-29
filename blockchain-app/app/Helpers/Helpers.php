<?php
use App\Helpers\UtilsHelper;
/**
 * UtilsHelper
 */

if (!function_exists('saveFile')) {
    function saveFile($file, $path, $filename, $disk)
    {
        UtilsHelper::saveFile($file, $path, $filename, $disk);
    }
}