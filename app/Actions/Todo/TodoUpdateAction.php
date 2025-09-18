<?php

namespace App\Actions\Todo;
use App\Models\Todo;
use Illuminate\Support\Facades\Validator;

class TodoUpdateAction
{
    public function execute(string $id, $request)
    {
     
        $data = todo::where('todo_id' ,$id)->update([
            //'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        if($data){

            return Todo::where('todo_id' ,$id)->first();
        }

        return false;
    }
}