<?php

namespace App\Repositories\Transport;

/**
 * Interface TransportRepositoryInterface
 * @package App\Repositories\Transport
 */
interface TransportRepositoryInterface
{
    public function getAll();
    public function getProbability();
}
