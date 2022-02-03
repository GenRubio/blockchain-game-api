<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\User\UserRepository;

/**
 * Class UserService
 * @package App\Services\User
 */
class UserService extends Controller
{
    private $userRepository;
    /**
     * UserService constructor.
     * @param User $user
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function removeCredits($amount){
        $this->userRepository->removeCredits($amount);
    }

    public function prepareDataUser(){
        return [
            'metamask' => getUser()->metamask,
            'credits' => getUser()->credits
        ];
    }
}
