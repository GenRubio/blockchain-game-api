<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\UserTransport;
use App\Repositories\UserTransport\UserTransportRepository;

/**
 * Class UserTransportService
 * @package App\Services\UserTransport
 */
class UserTransportService extends Controller
{
    private $userTransportRepository;
    /**
     * UserTransportService constructor.
     * @param UserTransport $usertransport
     */
    public function __construct()
    {
        $this->userTransportRepository = new UserTransportRepository();
    }

    //Not in actual use
    public function prepareDataUserTransport($userTransport){
        $transportService = new TransportService();
        $userFleetService = new UserFleetService();
        return [
            'userFleet' => $userTransport->fleet ? $userFleetService->prepareDataUserFleet($userTransport->fleet) : [],
            'transport' => $transportService->prepareDataTransport($userTransport->transport),
            'live' => $userTransport->live
        ];
    }

    public function prepareDataUserTransportWithFleetStatus($userTransport){
        $transportService = new TransportService();
        return [
            'key' => $userTransport->id,
            'inFleet' => $userTransport->fleet ? true : false,
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
