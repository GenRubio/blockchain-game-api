<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\UserObject;

/**
 * Class UserObjectService
 * @package App\Services\UserObject
 */
class UserObjectService extends Controller
{
    /**
     * UserObjectService constructor.
     * @param UserObject $userobject
     */
    public function __construct()
    {
        //
    }

    public function getObjectsInUserFleet($userFleet){
        $objects = [];
        foreach($userFleet->objects as $userObject){
            $objects [] = $this->prepareDataUserObject($userObject);
        }
        return $objects;
    }

    public function prepareDataUserObject($userObject){
        $itemService = new ItemService();
        return [
            'object' => $itemService->prepareDataItem($userObject->object)
        ];
    }
}
