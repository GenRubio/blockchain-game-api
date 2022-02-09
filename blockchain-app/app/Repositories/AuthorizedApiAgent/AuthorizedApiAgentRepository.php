<?php

namespace App\Repositories\AuthorizedApiAgent;

use App\Models\AuthorizedApiAgent;
use App\Repositories\Repository;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class AuthorizedApiAgentRepository
 * @package App\Repositories\AuthorizedApiAgent
 */
class AuthorizedApiAgentRepository extends Repository implements AuthorizedApiAgentRepositoryInterface
{
    /**
     * @var authorizedApiAgent
     */
    protected $model;

    /**
     * AuthorizedApiAgentRepository constructor.
     */
    public function __construct()
    {
        $this->model = new AuthorizedApiAgent();
        parent::__construct($this->model);
        $this->defaultTtl = env('CACHE_DEFAULT_TTL', 7200);
    }

    public function allAuthorizedAgent(){
        return cache()->remember('authorizedApiAgent.allAuthorizedAgent' . '.' . LaravelLocalization::getCurrentLocale(), $this->defaultTtl, function (){
            return $this->model->active()->pluck('agent')->toArray();
        });
    }
}
