<?php

namespace App\Repositories\Mission;

use App\Models\Mission;
use App\Repositories\Repository;


/**
 * Class MissionRepository
 * @package App\Repositories\Mission
 */
class MissionRepository extends Repository implements MissionRepositoryInterface
{
    /**
     * @var mission
     */
    protected $model;

    /**
     * MissionRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Mission();
        parent::__construct($this->model);
    }
}
