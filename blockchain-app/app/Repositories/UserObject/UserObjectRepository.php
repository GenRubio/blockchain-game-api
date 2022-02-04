<?php

namespace App\Repositories\UserObject;

use App\Models\UserObject;
use App\Repositories\Repository;


/**
 * Class UserObjectRepository
 * @package App\Repositories\UserObject
 */
class UserObjectRepository extends Repository implements UserObjectRepositoryInterface
{
    /**
     * @var userObject
     */
    protected $model;

    /**
     * UserObjectRepository constructor.
     */
    public function __construct()
    {
        $this->model = new UserObject();
        parent::__construct($this->model);
    }
}
