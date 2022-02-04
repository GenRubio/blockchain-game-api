<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserCharacterService;
use App\Services\UserTransportService;

class UserTransportController extends Controller
{
    public function getTransports()
    {
        $transports = [];
        $userTransportService = new UserTransportService();

        foreach (getUser()->transports as $transport) {
            $transports[] = $userTransportService->prepareDataUserTransportWithFleetStatus($transport);
        }
        return response()->json($transports);
    }

    public function getTransportsNotInFleet()
    {
        $transports = [];
        $userTransportService = new UserTransportService();

        foreach (getUser()->transportsNotInFleet as $transport) {
            $transports[] = $userTransportService->prepareDataUserTransportNotInFleet($transport);
        }
        return response()->json($transports);
    }

    public function getTransportsWithCharacters()
    {
        $transports = [];
        $userTransportService = new UserTransportService();
        $userCharacterService = new UserCharacterService();

        foreach (getUser()->transports as $transport) {
            $prepareDataUserCharacters = [];
            $characters = $userCharacterService->getCharactersInTransport($transport->id);
            foreach ($characters as $character) {
                $prepareDataUserCharacters[] = $userCharacterService->prepareDataUserCharacterWithTransportStatus($character);
            }
            $transports[] = $userTransportService->prepareDataUserTransportWithCharacters($transport, $prepareDataUserCharacters);
        }
        return response()->json($transports);
    }

    public function addCharacterToTransport(Request $request)
    {
        $response = [
            'message' => 'Error',
            'status' => 201
        ];
        $userTransportService = new UserTransportService();
        $userCharacterService = new UserCharacterService();
        $userTransport = $userTransportService->getById($request->user_transport_id);
        $userCharacter = $userCharacterService->getById($request->user_character_id);

        if ($userTransport && $userCharacter) {
            if (count($userTransport->characters) < $userTransport->transport->max_characters){
                $userCharacterService->addTransport($userCharacter->id, $userTransport->id);
                $response['message'] = 'Ok';
                $response['status'] = 200;
            }
            else{
                $response['message'] = 'Limite de characters superado';
            }
        }
        return response()->json($response);
    }
}
