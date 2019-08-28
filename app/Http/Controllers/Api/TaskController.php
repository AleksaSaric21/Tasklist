<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Contracts\TaskRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TaskController extends ApiController{

    /**
     * @var TaskRepositoryInterface
     */
    private $task;

    public function __construct(TaskRepositoryInterface $task)
    {
        $this->task = $task;
    }


    public function getTasksForUser($id)
    {


        $tasks = $this->task->getTasksForUser($id);

        if (count($tasks)==0 || $tasks==null){
            return $this->respondNotFound('Not found tasks for the given user id');
        }

        return $tasks;
    }



    public function insertTask(Request $request)
    {
        $data = [
            'user_id' => auth()->user()->id,
            'name' => $request->name,
        ];

        $validator = \Validator::make($data, [
            'name' => 'required|max:250|min:4',
        ]);

        if($validator->fails()) {
            return $this->respondValidationError('The given data is invalid.', $validator->getMessageBag()->toArray());
        }

        $task = $this->task->insertTask($data);

        if ($task==null){
            return $this->respondInternalError('Try again later, there was an error storing data to database');
        }

        return $this->respondCreated("task created", $task);
    }

    public function getTask($id)
    {

        $task = $this->task->getTask($id);

        if (!$task){
            return $this->respondNotFound('Not found tasks for the given task id');
        }

        return $task;
    }

}