<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use App\Repositories\Mission\MissionRepository;

/**
 * Class MissionService
 * @package App\Services\Mission
 */
class MissionService extends Controller
{
    private $missionRepository;
    /**
     * MissionService constructor.
     * @param Mission $mission
     */
    public function __construct()
    {
        $this->missionRepository = new MissionRepository();
    }

    public function perepareDataMission($mission){
        return [
            'level' => $mission->level,
            'rank_name' => $mission->rank_name,
            'image' => !empty($mission->image) ? asset($mission->image) : null,
        ];
    }
}
