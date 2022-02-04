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
}
