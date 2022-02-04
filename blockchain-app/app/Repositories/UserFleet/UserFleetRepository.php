<?php

namespace App\Repositories\UserFleet;

use App\Models\UserFleet;
use App\Repositories\Repository;


/**
 * Class UserFleetRepository
 * @package App\Repositories\UserFleet
 */
class UserFleetRepository extends Repository implements UserFleetRepositoryInterface
{
    /**
     * @var userFleet
     */
    protected $model;

    /**
     * UserFleetRepository constructor.
     */
    public function __construct()
    {
        $this->model = new UserFleet();
        parent::__construct($this->model);
    }
}
