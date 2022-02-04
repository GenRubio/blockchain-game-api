<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\UserFleet;
use App\Repositories\UserFleet\UserFleetRepository;

/**
 * Class UserFleetService
 * @package App\Services\UserFleet
 */
class UserFleetService extends Controller
{
    private $userFleetRepository;
    /**
     * UserFleetService constructor.
     * @param UserFleet $userfleet
     */
    public function __construct()
    {
        $this->userFleetRepository = new UserFleetRepository();
    }

    public function prepareDataUserFleet($userFleet){
        $missionService = new MissionService();
        $userObjectService = new UserObjectService();
        return [
            'objects' => $userObjectService->getObjectsInUserFleet($userFleet),
            'mission' => $missionService->perepareDataMission($userFleet->mission),
            'date_start_mission' => $userFleet->date_start_mission
        ];
    }
}
