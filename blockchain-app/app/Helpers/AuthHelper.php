<?php

namespace App\Helpers;

class AuthHelper
{
    public static function getUser()
    {
        return auth()->user();
    }
}
