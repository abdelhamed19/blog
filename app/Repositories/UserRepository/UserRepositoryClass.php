<?php

namespace App\Repositories\UserRepository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\user\UserLoginRequest;
use App\Http\Requests\user\UserRegisterRequest;

class UserRepositoryClass implements UserRepositoryInterface
{
    public function login(UserLoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            return $user;
        }
        return;
    }
    public function register(UserRegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email',$data['email'])->first();
        if (!$user)
        {
            return $data;
        }

        return;
    }
}
