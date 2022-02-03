<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Repository;


/**
 * Class UserRepository
 * @package App\Repositories\User
 */
class UserRepository extends Repository implements UserRepositoryInterface
{
    /**
     * @var user
     */
    protected $model;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->model = new User();
        parent::__construct($this->model);
    }

    public function removeCredits($amount){
        getUser()->credits -= $amount;
        $this->model->where('id', getUser()->id)->update([
            'credits' => getUser()->credits
        ]);
    }
}
