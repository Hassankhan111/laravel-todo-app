<?php

namespace App\Http\Controllers;
use App\Actions\users\UserUpdateAction;
use App\Actions\users\UserCreateAction;
use App\Models\User;
use App\Http\BaseControllera;
use Illuminate\Support\Facades\Validator;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Email;
use Pest\Plugins\Only;

class AuthController extends BaseController
{
    public function Signup(request $request ,UserCreateAction $user)
    {
        //validation
        $validateuser = validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:5',
                'phone' => 'required|min:11|max:14|unique:users,phone',
                'address' => 'required',
            ]
        );

        if ($validateuser->fails()) {
             //call to function in base controller
            return $this->sendError('Validation Error.', $validateuser->errors());
        }
        //create user
            $create = $user->execute($request->all());

        if ($create) {
             //call to function in base controller
            return $this->sendResponse($user, 'User created successfully.');
        }
    }

    //login user 
    public function login(request $request)
    {
        //validation
        $uservalidate = validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|min:5'
            ]
        );
        
        if ($uservalidate->fails()) {
            //call to function in base controller
            return $this->sendError('Validation Error.', $uservalidate->errors());
        }
            //check user
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::User();
            $token = $user->createToken("user_token")->plainTextToken;
             //call to function in base controller
            return $this->sendResponse($token, 'User logged in successfully.');

        } else {
             //call to function in base controller
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    //userupdate
    public function update(Request $request ,$id){
      //validation
      $uservalidate = validator::make($request->all(),
      [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:5',
                'phone' => 'required|min:11|max:14|unique:users,phone',
                'address' => 'required',
            ]);
           if($uservalidate->fails()){
           //call to function in base controller
           return $this->sendError('validation error',$uservalidate->errors());
          }
            $uservalidate = app(UserUpdateAction::class);
          //create user
            $userUpdateAction = $uservalidate->execute($id,$request);

        if (   $userUpdateAction) {
             //call to function in base controller
            return $this->sendResponse(   $userUpdateAction, 'User updated successfully.');
        }
    }

    //user logout
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
       //call to function in base controller 
        return $this->sendResponse([], 'User logged out successfully.');
    }
}
