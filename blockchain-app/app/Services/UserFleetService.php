<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\UserFleet;

/**
 * Class UserFleetService
 * @package App\Services\UserFleet
 */
class UserFleetService extends Controller
{
    /**
     * UserFleetService constructor.
     * @param UserFleet $userfleet
     */
    public function __construct()
    {
        //
    }

    public function prepareDataUserFleet($userFleet){
        $missionService = new MissionService();
        return [
            'mission' => $missionService->perepareDataMission($userFleet->mission),
            'date_start_mission' => $userFleet->date_start_mission
        ];
    }
}
