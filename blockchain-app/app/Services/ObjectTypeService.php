<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\ObjectType;
use App\Repositories\ObjectType\ObjectTypeRepository;

/**
 * Class ObjectTypeService
 * @package App\Services\ObjectType
 */
class ObjectTypeService extends Controller
{
    private $objectTypeRepository;
    /**
     * ObjectTypeService constructor.
     * @param ObjectType $objecttype
     */
    public function __construct()
    {
        $this->objectTypeRepository = new ObjectTypeRepository();
    }

    public function prepareDateObjectType($objectType){
        return [
            'name' => $objectType->name
        ];
    }
}
