<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Helpers\HTTPResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\user\UserLoginRequest;
use App\Http\Requests\user\UserRegisterRequest;
use App\Repositories\UserRepository\UserRepositoryClass;

class AuthController extends Controller
{
    use HTTPResponse;
    public $userRepositoryClass;
    public function __construct(UserRepositoryClass $userRepositoryClass)
    {
        $this->userRepositoryClass = $userRepositoryClass;
    }
    public function login(UserLoginRequest $userLoginRequest)
    {
        $user = $this->userRepositoryClass->login($userLoginRequest);
        if ($user)
        {
            $token = $user->createToken('user-login')->plainTextToken;
            return $this->successRequest(['user'=>$user,'token'=>$token],'Login done Successfully');
        }
        return $this->wrongRequest('Wrong Inputs',404);
    }
    public function register(UserRegisterRequest $userRegisterRequest)
    {
        $user = $this->userRepositoryClass->register($userRegisterRequest);
        if ($user)
        {
            $user=User::create($user);
            $token = $user->createToken('user-register')->plainTextToken;
            return $this->successRequest(['user'=>$user,'token'=>$token],'Register done Successfully');
        }
        return $this->wrongRequest('Register error',404);
    }
}
