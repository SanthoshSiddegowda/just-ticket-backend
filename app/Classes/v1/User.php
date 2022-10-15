<?php

namespace App\Classes\v1;

use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User
{
    public function __construct()
    {
    }

    public function createUser($user): object
    {
        $userDetails = $this->getUserDetailsByMobileNo($user['mobile_no']);
        if (empty($userDetails)) {
            $userDetails = UserModel::create([
                'uuid' => Str::orderedUuid(),
                'mobile_no' => $user['mobile_no'],
                'password' => Hash::make(mt_rand(0000, 9999)),
            ]);
        }

        return $userDetails;
    }

    private function getUserDetailsByMobileNo($mobileNo): ?object
    {
        return UserModel::where('mobile_no', $mobileNo)->first();
    }
}
