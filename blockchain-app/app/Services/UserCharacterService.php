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

    public function getById($id){
        return $this->userCharacterRepository->getById($id);
    }

    public function addTransport($characterId, $transportId){
        $this->userCharacterRepository->addTransport($characterId, $transportId);
    }

    public function removeTransport($characterId, $transportId){
        $this->userCharacterRepository->removeTransport($characterId, $transportId);
    }

    public function getCharacterInTransport($characterId, $transportId){
        return $this->userCharacterRepository->getCharacterInTransport($characterId, $transportId);
    }

    public function create($characterId){
        return $this->userCharacterRepository->create($characterId);
    }

    public function getCharactersInTransport($transportId){
        return $this->userCharacterRepository->charactersInTransport($transportId);
    }

    //No esta siendo utilizado por el momento
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

    public function prepareDataUserCharacterWithTransportStatus($userCharacter){
        $characterService = new CharacterService();
        return [
            'key' => $userCharacter->id,
            'inTransport' => $userCharacter->transport ? true : false,
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
