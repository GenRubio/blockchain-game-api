<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserCharacterService;

class UserCharacterController extends Controller
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
}
