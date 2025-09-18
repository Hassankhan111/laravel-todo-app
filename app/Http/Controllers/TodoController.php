<?php

namespace App\Http\Controllers;
use App\Actions\Todo\TodoCreateAction;
use App\Actions\Todo\TodoDeleteAction;
use App\Actions\Todo\TodoShowAction;
use App\Actions\Todo\TodoSingleAction;
use App\Actions\Todo\TodoUpdateAction;
use App\Http\BaseControllera;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TodoController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(TodoShowAction $todoShowAction ,Request $request)
    {
          $data['todos'] = $todoShowAction->execute($request);

          if($data['todos']){
             //call to function in base controller
            return $this->sendResponse($data, 'Todos retrieved successfully.');
          }else
          {
            //call to function in base controller
            return $this->sendError('No Todos found.');
         }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,TodoCreateAction $todoCreateAction)
    {
        //validation
         $validatedoto = $todoCreateAction->execute($request->all());

        if (isset($validatedoto['error'])){
            //call to function in base controller
            return $this->sendError('Validation Erro',$validatedoto['error']);
        }else{
            //call to function in base controller
            return $this->sendResponse($validatedoto,'todo created successfully');
        }
    
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id ,TodoSingleAction $todoSingleAction)
    {
        $data = $todoSingleAction->execute($id);

            if($data){
                 //call to function in base controller
                return $this->sendResponse($data, 'Todo retrieved successfully.');
            }else{
                 //call to function in base controller
                return $this->sendError('Todo not found.');
            }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, TodoUpdateAction $todoUpdateAction)
    {
        $todovaladate = Validator::make(
            $request->all(),
            [
                //'user_id' => 'required|exists:users,user_id',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'status' => 'required|in:pending,completed',
                'due_date' => 'required|date',
            ]);
         if($todovaladate->fails()) {
            //call to function in base controller
            return $this->sendError('Validation Error.', $todovaladate->errors());
          } 

             $data = $todoUpdateAction->execute($id,$request);

            if(!$data) {
            //call to function in base controller
            return $this->sendError('Todo not found.');
            }


            return $this->sendResponse($todovaladate, 'Todo updated successfully.');
        

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id , TodoDeleteAction $todoDeleteAction)
    {
        $data = $todoDeleteAction->execute($id);
        
        if($data){
            //call to function in base controller
            return $this->sendResponse([], 'Todo deleted successfully.');
        }else{
            //call to function in base controller
            return $this->sendError('Todo not found.');
        }
    }
}
