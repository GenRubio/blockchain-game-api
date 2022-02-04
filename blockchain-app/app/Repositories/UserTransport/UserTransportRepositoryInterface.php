<?php

namespace App\Repositories\UserTransport;

/**
 * Interface UserTransportRepositoryInterface
 * @package App\Repositories\UserTransport
 */
interface UserTransportRepositoryInterface
{
    public function create($transportId);
    public function getById($id);
}
