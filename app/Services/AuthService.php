<?php

namespace App\Services;

use App\Enum\UserType;
use App\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\Hash;

class AuthService extends Service
{
    public function adminRegister(array $user)
    {
        $user['type'] = UserType::ADMIN;
        $user['password'] = Hash::make($user['password']);
        $userCreated = User::create($user);

        return $userCreated;
    }
}
