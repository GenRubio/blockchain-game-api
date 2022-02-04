<?php

namespace App\Repositories\UserTransport;

use App\Models\UserTransport;
use App\Repositories\Repository;


/**
 * Class UserTransportRepository
 * @package App\Repositories\UserTransport
 */
class UserTransportRepository extends Repository implements UserTransportRepositoryInterface
{
    /**
     * @var userTransport
     */
    protected $model;

    /**
     * UserTransportRepository constructor.
     */
    public function __construct()
    {
        $this->model = new UserTransport();
        parent::__construct($this->model);
    }
}
