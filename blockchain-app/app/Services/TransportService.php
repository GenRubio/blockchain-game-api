<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use App\Repositories\Transport\TransportRepository;

/**
 * Class TransportService
 * @package App\Services\Transport
 */
class TransportService extends Controller
{
    private $transportRepository;
    /**
     * TransportService constructor.
     * @param Transport $transport
     */
    public function __construct()
    {
        $this->transportRepository = new TransportRepository();
    }

    public function prepareDataTransport($transport){
        return [
            'name' => $transport->name,
            'stars' => $transport->stars,
            'image' => !empty($transport->image) ? asset($transport->image) : null,
        ];
    }
}
