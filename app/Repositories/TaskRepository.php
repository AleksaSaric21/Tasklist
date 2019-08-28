<?php

namespace App\Repositories;

use App\Contracts\TaskRepositoryInterface;
use App\Task;

class TaskRepository implements TaskRepositoryInterface{

    /**
     * @var Task
     */
    private $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getTasksForUser($userId)
    {
       return $this->task->where('user_id',$userId)->orderBy('created_at','asc')->get();
    }

    public function insertTask($data)
    {
        $task = $this->fillTaskObject($this->task, $data);
        return $task->save() ? $task : false;
    }

    public function fillTaskObject($object,$data)
    {
        if (isset($data['user_id'])){
            $object->user_id = $data['user_id'];
        }
        if (isset($data['name'])){
            $object->name = $data['name'];
        }
        return $object;
    }

    public function removeTask($id)
    {
        $task = $this->task->find($id)->delete($id);
    }

    public function getTask($id)
    {
        return $this->task->find($id);
    }
}