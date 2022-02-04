<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\TransportService;
use App\Http\Controllers\Controller;
use App\Services\UserTransportService;

class TransportController extends Controller
{
    public function buyTransport()
    {
        $response = [
            'message' => 'Error',
            'status' => 201,
        ];

        if (getUser()->credits >= 100) {
            $transportService = new TransportService();
            $userTransportService = new UserTransportService();
            $userService = new UserService();

            $transports = $transportService->getAllTransportsProbability();
            $transport = $transportService->getTransportByProbability($transports);

            $userTransport = $userTransportService->create($transport->id);
            $prepareDataUserCharacter = $userTransportService->prepareDataUserTransportWithFleetStatus($userTransport);
            $userService->removeCredits(100);

            $response['message'] = $userTransportService->prepareDataUserBuyTransport($prepareDataUserCharacter);
            $response['status'] = 200;
         
        } else {
            $response['message'] = "Creditos insuficientes";
        }

        return response()->json($response);
    }
}
