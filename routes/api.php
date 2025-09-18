<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


route::post('signup',[AuthController::class,'Signup']);
route::post('login',[AuthController::class,'login']);
route::post('update/{id}' ,[AuthController::class,'update']);

route::middleware(('auth:sanctum'))->group(function(){
  Route::post('logout',[AuthController::class,'logout']);
  
  Route::apiResource('todos',TodoController::class);

   Route::get('user', function (Request $request) {
        return response()->json([
            'success' => true,
            'data' => $request->user()
        ]);
      });
    
}); 



