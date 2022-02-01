<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Mission;

/**
 * Class MissionService
 * @package App\Services\Mission
 */
class MissionService extends Controller
{
    /**
     * MissionService constructor.
     * @param Mission $mission
     */
    public function __construct()
    {
        //
    }

    public function perepareDataMission($mission){
        return [
            'level' => $mission->level,
            'rank_name' => $mission->rank_name,
            'image' => !empty($mission->image) ? asset($mission->image) : null,
        ];
    }
}
