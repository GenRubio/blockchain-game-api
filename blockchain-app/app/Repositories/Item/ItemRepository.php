<?php

namespace App\Repositories\Item;

use App\Models\Item;
use App\Repositories\Repository;


/**
 * Class ItemRepository
 * @package App\Repositories\Item
 */
class ItemRepository extends Repository implements ItemRepositoryInterface
{
    /**
     * @var item
     */
    protected $model;

    /**
     * ItemRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Item();
        parent::__construct($this->model);
    }
}
