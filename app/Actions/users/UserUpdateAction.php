<?php

namespace App\Actions\users;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserUpdateAction
{
    public function execute(string $id, $request)
    {
     
        $user = User::where('user_id' ,$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        if($user){

            return User::where('user_id' ,$id)->first();
        }

        return false;
    }
}