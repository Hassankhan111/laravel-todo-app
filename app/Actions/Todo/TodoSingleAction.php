<?php

namespace App\Actions\Todo;

use App\Models\Todo;
use Illuminate\Support\Facades\Validator;

class TodoSingleAction
{
    public function execute(string $id)
    {
      
        return $todo = Todo::select('title','description','status','due_date')->where('todo_id' ,$id)->get();

    }
}