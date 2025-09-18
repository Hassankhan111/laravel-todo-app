<?php
  

namespace App\Actions\Todo;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

    class TodoCreateAction
    {
        public function execute(array $data)
        {
           return Todo::create([
            'user_id' => auth()->user()->user_id,
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => $data['status'],
            'due_date' => $data['due_date'],
            
           ]);
    
        }
    }

  
