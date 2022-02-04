<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserCharacterService;
use App\Services\UserTransportService;

class UserTransportController extends Controller
{
    public function getTransports(){
        $transports = [];
        $userTrasnportService = new UserTransportService();

        foreach(getUser()->transports as $transport){
            $transports [] = $userTrasnportService->prepareDataUserTransportWithFleetStatus($transport);
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

    public function getTransportsWithCharacters(){
        $transports = [];
        $userTrasnportService = new UserTransportService();
        $userCharacterService = new UserCharacterService();

        foreach(getUser()->transports as $transport){
            $prepareDataUserCharacters = [];
            $characters = $userCharacterService->getCharactersInTransport($transport->id);
            foreach($characters as $character){
                $prepareDataUserCharacters [] = $userCharacterService->prepareDataUserCharacterWithTransportStatus($character);
            }
            $transports [] = $userTrasnportService->prepareDataUserTransportWithCharacters($transport, $prepareDataUserCharacters);
        }
        return response()->json($transports);
    }
}
