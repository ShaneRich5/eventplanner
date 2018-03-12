<?php

namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use App\Repositories\User\UserInterface;

class UserRepository extends EloquentRepository implements UserInterface {

    protected $modelClassName = 'App\User';

}