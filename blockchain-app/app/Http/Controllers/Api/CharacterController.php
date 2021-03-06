<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Services\CharacterService;
use App\Services\UserCharacterService;
use App\Services\UserService;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function buyCharacter()
    {
        $response = [
            'message' => 'Error',
            'status' => 201,
        ];

        if (getUser()->credits >= 100) {
            $characterService = new CharacterService();
            $userCharacterService = new UserCharacterService();
            $userService = new UserService();

            $characters = $characterService->getAllCharactersProbability();
            $character = $characterService->getCharacterByProbability($characters);

            $userCharacter = $userCharacterService->create($character->id);
            $prepareDataUserCharacter = $userCharacterService->prepareDataUserCharacterWithTransportStatus($userCharacter);
            $userService->removeCredits(100);

            $response['message'] = $userCharacterService->prepareDataUserBuyCharacter($prepareDataUserCharacter);
            $response['status'] = 200;
         
        } else {
            $response['message'] = "Creditos insuficientes";
        }

        return response()->json($response);
    }
}
