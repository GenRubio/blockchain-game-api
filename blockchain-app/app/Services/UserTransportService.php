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

    public function create($transportId){
        return $this->userTransportRepository->create($transportId);
    }

    public function getById($id){
        return $this->userTransportRepository->getById($id);
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

    public function prepareDataUserTransportWithCharacters($userTransport, $characters){
        $transportService = new TransportService();
        return [
            'key' => $userTransport->id,
            'inFleet' => $userTransport->fleet ? true : false,
            'characters' => $characters,
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

    public function prepareDataUserBuyTransport($prepareDataUserTrasnport){
        $userService = new UserService();
        return [
            'user' => $userService->prepareDataUser(),
            'userTransport' => $prepareDataUserTrasnport
        ];
    }
}
