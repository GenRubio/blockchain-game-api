<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserCharacterService;
use App\Services\UserFleetService;
use App\Services\UserObjectService;
use App\Services\UserService;
use App\Services\UserTransportService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser(){
        $userService = new UserService();

        return response()->json([
            'user' => $userService->prepareDataUser()
        ], 200);
    }
}
