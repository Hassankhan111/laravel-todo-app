<?php

namespace App\Actions\users;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserShowAction
{
    public function execute( string $id)
    {
    $user = User::All();
    return $user;
  
   }

}