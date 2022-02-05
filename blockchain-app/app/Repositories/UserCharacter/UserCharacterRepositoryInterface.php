<?php

namespace App\Repositories\UserCharacter;

/**
 * Interface UserCharacterRepositoryInterface
 * @package App\Repositories\UserCharacter
 */
interface UserCharacterRepositoryInterface
{
    public function create($characterId);
    public function charactersInTransport($transportId);
    public function getById($id);
    public function addTransport($characterId, $transportId);
    public function getCharacterInTransport($characterId, $transportId);
}
