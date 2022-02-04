<?php

namespace App\Repositories\Character;

use App\Models\Character;
use App\Repositories\Repository;


/**
 * Class CharacterRepository
 * @package App\Repositories\Character
 */
class CharacterRepository extends Repository implements CharacterRepositoryInterface
{
    /**
     * @var character
     */
    protected $model;

    /**
     * CharacterRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Character();
        parent::__construct($this->model);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getProbability()
    {
        return $this->model->select('id', 'probability')->get();
    }
}
