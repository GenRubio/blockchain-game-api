<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserCharacterService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getCharacters(){
        $characters = [];
        $userCharacterService = new UserCharacterService();

        foreach(auth()->user()->characters as $character){
            $characters[] = $userCharacterService->prepareDataUserCharacter($character);
        }
        return response()->json($characters);
    }
}
