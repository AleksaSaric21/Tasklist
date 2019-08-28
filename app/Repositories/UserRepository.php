<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

}