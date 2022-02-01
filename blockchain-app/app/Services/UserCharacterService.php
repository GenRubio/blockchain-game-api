<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\UserCharacter;

/**
 * Class UserCharacterService
 * @package App\Services\UserCharacter
 */
class UserCharacterService extends Controller
{
    /**
     * UserCharacterService constructor.
     * @param UserCharacter $usercharacter
     */
    public function __construct()
    {
        //
    }

    public function prepareDataUserCharacter($userCharacter){
        $characterService = new CharacterService();
        $userTransportService = new UserTransportService();
        return [
            'userTransport' => $userCharacter->transport ? $userTransportService->prepareDataUserTransport($userCharacter->transport) : [],
            'character' => $characterService->prepareDataCharacter($userCharacter->character),
            'live' => $userCharacter->live,
            'power' => $userCharacter->power,
        ];
    }
}
