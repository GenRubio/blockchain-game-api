<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Item;

/**
 * Class ItemService
 * @package App\Services\Item
 */
class ItemService extends Controller
{
    /**
     * ItemService constructor.
     * @param Item $item
     */
    public function __construct()
    {
        //
    }

    public function prepareDataItem($item){
        $objectTypeService = new ObjectTypeService();
        return [
            'objectType' => $objectTypeService->prepareDateObjectType($item->objectType),
            'name' => $item->name,
            'image' => !empty($item->image) ? asset($item->image) : null
        ];
    }
}
