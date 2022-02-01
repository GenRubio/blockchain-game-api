<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Transport;

/**
 * Class TransportService
 * @package App\Services\Transport
 */
class TransportService extends Controller
{
    /**
     * TransportService constructor.
     * @param Transport $transport
     */
    public function __construct()
    {
        //
    }

    public function prepareDataTransport($transport){
        return [
            'name' => $transport->name,
            'stars' => $transport->stars,
            'image' => !empty($transport->image) ? asset($transport->image) : null,
        ];
    }
}
