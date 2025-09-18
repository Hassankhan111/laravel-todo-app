<?php

namespace App\Actions\Todo;

use App\Models\Todo;

class TodoShowAction
{
    public function execute($request)
    
{
    $query = Todo::query();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('title', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
    }

    return $query->get();
}

}


