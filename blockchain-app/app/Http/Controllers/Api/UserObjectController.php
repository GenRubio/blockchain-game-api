<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\UserObjectService;
use App\Http\Controllers\Controller;

class UserObjectController extends Controller
{
    public function getObjects(){
        $objects = [];
        $userObjectService = new UserObjectService();

        foreach(getUser()->objects as $object){
            $objects [] = $userObjectService->prepareDataUserObject($object);
        }
        return response()->json($objects);
    }
}
