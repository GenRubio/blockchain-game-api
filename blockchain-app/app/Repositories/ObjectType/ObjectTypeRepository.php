<?php

namespace App\Repositories\ObjectType;

use App\Models\ObjectType;
use App\Repositories\Repository;


/**
 * Class ObjectTypeRepository
 * @package App\Repositories\ObjectType
 */
class ObjectTypeRepository extends Repository implements ObjectTypeRepositoryInterface
{
    /**
     * @var objectType
     */
    protected $model;

    /**
     * ObjectTypeRepository constructor.
     */
    public function __construct()
    {
        $this->model = new ObjectType();
        parent::__construct($this->model);
    }
}
