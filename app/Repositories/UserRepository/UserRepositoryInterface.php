<?php
namespace App\Repositories\UserRepository;

use App\Http\Requests\user\UserLoginRequest;
use App\Http\Requests\user\UserRegisterRequest;

interface UserRepositoryInterface
{
    public function login(UserLoginRequest $userLoginRequest);
    public function register(UserRegisterRequest $userRegisterRequest);
}
