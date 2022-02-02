<?php
use App\Helpers\AuthHelper;
use App\Helpers\UtilsHelper;
use Tymon\JWTAuth\Http\Parser\AuthHeaders;

/**
 * UtilsHelper
 */

if (!function_exists('saveFile')) {
    function saveFile($file, $path, $filename, $disk)
    {
        UtilsHelper::saveFile($file, $path, $filename, $disk);
    }
}

/**
 * AuthHelper
 */

if (!function_exists('getUser')) {
    function getUser()
    {
        return AuthHelper::getUser();
    }
}