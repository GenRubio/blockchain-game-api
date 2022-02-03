<?php

namespace App\Services;

use App\Models\Character;
use App\Http\Controllers\Controller;
use App\Repositories\Character\CharacterRepository;

/**
 * Class CharacterService
 * @package App\Services\Character
 */
class CharacterService extends Controller
{
    /**
     * @var CharacterRepository
     */
    private $characterRepository;

    /**
     * CharacterService constructor.
     * @param Character $character
     */
    public function __construct()
    {
        $this->characterRepository = new CharacterRepository();
    }

    public function getAllCharacters(){
        return $this->characterRepository->getAll();
    }

    public function getAllCharactersProbability(){
        return $this->characterRepository->getProbability();
    }

    public function getCharacterByProbability($characters){
        $weightSum = $characters->sum('probability');
        $weightRand = mt_rand(0, $weightSum);

        foreach ($characters as $character) {
            $weightRand -= $character->probability;
            if ($weightRand <= 0) {
                return $character->fresh();
            }
        }
    }

    public function prepareDataCharacter($character){
        return [
            'name' => $character->name,
            'stars' => $character->stars,
            'image' => !empty($character->image) ? asset($character->image) : null,
        ];
    }
}
