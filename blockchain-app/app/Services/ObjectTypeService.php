<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\ObjectType;

/**
 * Class ObjectTypeService
 * @package App\Services\ObjectType
 */
class ObjectTypeService extends Controller
{
    /**
     * ObjectTypeService constructor.
     * @param ObjectType $objecttype
     */
    public function __construct()
    {
        //
    }

    public function prepareDateObjectType($objectType){
        return [
            'name' => $objectType->name
        ];
    }
}
