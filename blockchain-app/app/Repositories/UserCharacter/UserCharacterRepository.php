<?php

namespace App\Repositories\UserCharacter;

use App\Models\UserCharacter;
use App\Repositories\Repository;


/**
 * Class UserCharacterRepository
 * @package App\Repositories\UserCharacter
 */
class UserCharacterRepository extends Repository implements UserCharacterRepositoryInterface
{
    /**
     * @var userCharacter
     */
    protected $model;

    /**
     * UserCharacterRepository constructor.
     */
    public function __construct()
    {
        $this->model = new UserCharacter();
        parent::__construct($this->model);
    }

    public function create($characterId)
    {
        return $this->model->create([
            'user_id' => getUser()->id,
            'character_id' => $characterId
        ]);
    }

    public function charactersInTransport($transportId)
    {
        return $this->model->where('user_transport_id', $transportId)
            ->where('user_id', getUser()->id)
            ->get();
    }
}
