<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\UserCharacter;
use App\Repositories\UserCharacter\UserCharacterRepository;

/**
 * Class UserCharacterService
 * @package App\Services\UserCharacter
 */
class UserCharacterService extends Controller
{
    private $userCharacterRepository;
    /**
     * UserCharacterService constructor.
     * @param UserCharacter $usercharacter
     */
    public function __construct()
    {
        $this->userCharacterRepository = new UserCharacterRepository();
    }

    public function create($characterId){
        return $this->userCharacterRepository->create($characterId);
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

    public function prepareDataUserCharactersNotInTransport($userCharacter){
        $characterService = new CharacterService();
        return [
            'key' => $userCharacter->id,
            'character' => $characterService->prepareDataCharacter($userCharacter->character),
            'live' => $userCharacter->live,
            'power' => $userCharacter->power,
        ];
    }

    public function prepareDataUserBuyCharacter($prepareDataUserCharacter){
        $userService = new UserService();
        return [
            'user' => $userService->prepareDataUser(),
            'userCharacter' => $prepareDataUserCharacter
        ];
    }
}
