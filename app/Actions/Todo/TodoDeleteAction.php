<?php

namespace App\Actions\Todo;
use App\Models\Todo;
use Illuminate\Support\Facades\Validator;

class TodoDeleteAction
{
    public function execute( string $id)
    {
    $delete = Todo::where('todo_id' , $id)->delete();
   
   return $delete > 0;
  
   }

}