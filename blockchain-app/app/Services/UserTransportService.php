<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\UserTransport;

/**
 * Class UserTransportService
 * @package App\Services\UserTransport
 */
class UserTransportService extends Controller
{
    /**
     * UserTransportService constructor.
     * @param UserTransport $usertransport
     */
    public function __construct()
    {
        //
    }

    public function prepareDataUserTransport($userTransport){
        $transportService = new TransportService();
        $userFleetService = new UserFleetService();
        return [
            'userFleet' => $userTransport->fleet ? $userFleetService->prepareDataUserFleet($userTransport->fleet) : [],
            'transport' => $transportService->prepareDataTransport($userTransport->transport),
            'live' => $userTransport->live
        ];
    }

    public function prepareDataUserTransportNotInFleet($userTransport){
        $transportService = new TransportService();
        return [
            'key' => $userTransport->id,
            'transport' => $transportService->prepareDataTransport($userTransport->transport),
            'live' => $userTransport->live
        ];
    }
}
