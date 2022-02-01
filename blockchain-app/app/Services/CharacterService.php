<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Character;

/**
 * Class CharacterService
 * @package App\Services\Character
 */
class CharacterService extends Controller
{
    /**
     * CharacterService constructor.
     * @param Character $character
     */
    public function __construct()
    {
        //
    }

    public function prepareDataCharacter($character){
        return [
            'name' => $character->name,
            'stars' => $character->stars,
            'image' => $character->image,
        ];
    }
}
