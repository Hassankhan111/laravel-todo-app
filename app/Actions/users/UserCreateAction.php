<?php

namespace App\Actions\users;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserCreateAction
{
    public function execute(array $data)
    {
   //create user
       return $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);

  
   }

}