<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\AuthorizedApiAgent;
use App\Repositories\AuthorizedApiAgent\AuthorizedApiAgentRepository;

/**
 * Class AuthorizedApiAgentService
 * @package App\Services\AuthorizedApiAgent
 */
class AuthorizedApiAgentService extends Controller
{
    private $authorizedApiAgentRepository;
    /**
     * AuthorizedApiAgentService constructor.
     * @param AuthorizedApiAgent $authorizedapiagent
     */
    public function __construct()
    {
        $this->authorizedApiAgentRepository = new AuthorizedApiAgentRepository();
    }

    public function getAllAuthorizedAgent(){
        return $this->authorizedApiAgentRepository->allAuthorizedAgent();
    }
}
