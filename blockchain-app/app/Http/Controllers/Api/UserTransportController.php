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
            if ($userCharacter->transport){
                $response['message'] = 'Este personaje ya se encuentra en un transporte';
            }
            else if ($userTransport->fleet){
                $response['message'] = 'Este transporte esta en batalla';
            }
            else if (count($userTransport->characters) >= $userTransport->transport->max_characters){
                $response['message'] = 'Limite de personajes superado';
            }
            else{
                $userCharacterService->addTransport($userCharacter->id, $userTransport->id);
                $response['message'] = 'Ok';
                $response['status'] = 200;
            }
        }
        return response()->json($response);
    }

    public function removeCharacterToTransport(Request $request){
        $response = [
            'message' => 'Error',
            'status' => 201
        ];
        $userTransportService = new UserTransportService();
        $userCharacterService = new UserCharacterService();

        $userTransport = $userTransportService->getById($request->user_transport_id);
        $userCharacter = $userCharacterService->getCharacterInTransport($request->user_character_id, $request->user_transport_id);

        if ($userTransport && $userCharacter) {
            if ($userTransport->fleet){
                $response['message'] = 'Este transporte esta en batalla';
            }
            else{
                $userCharacterService->removeTransport($userCharacter->id, $userTransport->id);
                $response['message'] = 'Ok';
                $response['status'] = 200;
            }
        }
        return response()->json($response);
    }
}
