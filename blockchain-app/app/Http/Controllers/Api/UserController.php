<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserCharacterService;
use App\Services\UserFleetService;
use App\Services\UserObjectService;
use App\Services\UserTransportService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getCharacters(){
        $characters = [];
        $userCharacterService = new UserCharacterService();

        foreach(getUser()->characters as $character){
            $characters[] = $userCharacterService->prepareDataUserCharacterWithTransportStatus($character);
        }
        return response()->json($characters);
    }

    public function getCharactersNotInTransport(){
        $characters = [];
        $userCharacterService = new UserCharacterService();

        foreach(getUser()->charactersNotInTransport as $character){
            $characters[] = $userCharacterService->prepareDataUserCharactersNotInTransport($character);
        }
        return response()->json($characters);
    }

    public function getTransports(){
        $transports = [];
        $userTrasnportService = new UserTransportService();

        foreach(getUser()->transports as $transport){
            $transports [] = $userTrasnportService->prepareDataUserTransport($transport);
        }
        return response()->json($transports);
    }

    public function getTransportsNotInFleet(){
        $transports = [];
        $userTrasnportService = new UserTransportService();

        foreach(getUser()->transportsNotInFleet as $transport){
            $transports [] = $userTrasnportService->prepareDataUserTransportNotInFleet($transport);
        }
        return response()->json($transports);
    }

    public function getObjects(){
        $objects = [];
        $userObjectService = new UserObjectService();

        foreach(getUser()->objects as $object){
            $objects [] = $userObjectService->prepareDataUserObject($object);
        }
        return response()->json($objects);
    }

    public function getFleets(){
        $fleets = [];
        $userFleetService = new UserFleetService();

        foreach(getUser()->fleets as $fleet){
            $fleets [] = $userFleetService->prepareDataUserFleet($fleet);
        }
        return response()->json($fleets);
    }
}
