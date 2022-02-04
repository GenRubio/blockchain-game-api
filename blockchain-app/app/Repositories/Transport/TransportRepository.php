<?php

namespace App\Repositories\Transport;

use App\Models\Transport;
use App\Repositories\Repository;


/**
 * Class TransportRepository
 * @package App\Repositories\Transport
 */
class TransportRepository extends Repository implements TransportRepositoryInterface
{
    /**
     * @var transport
     */
    protected $model;

    /**
     * TransportRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Transport();
        parent::__construct($this->model);
    }
}
