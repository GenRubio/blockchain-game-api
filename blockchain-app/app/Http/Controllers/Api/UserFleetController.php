<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\UserFleetService;
use App\Http\Controllers\Controller;

class UserFleetController extends Controller
{
    public function getFleets(){
        $fleets = [];
        $userFleetService = new UserFleetService();

        foreach(getUser()->fleets as $fleet){
            $fleets [] = $userFleetService->prepareDataUserFleet($fleet);
        }
        return response()->json($fleets);
    }
}
