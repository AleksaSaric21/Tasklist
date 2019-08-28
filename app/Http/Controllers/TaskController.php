<?php

namespace App\Http\Controllers;

use App\Contracts\TaskRepositoryInterface;
use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * @var TaskRepositoryInterface
     */
    private $tasks;

    public function __construct(TaskRepositoryInterface $task)
    {

        $this->middleware('auth');
        $this->tasks = $task;
    }
    public function index()
    {
        $tasks = $this->tasks->getTasksForUser(auth()->user()->id);
        return view('tasks.index',compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
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

        $this->tasks->insertTask($data);


        return redirect('/tasks');
    }

    public function show()
    {
        
    }

    public function destroy(Task $task)
    {

        $this->authorize('destory', $task);

        $this->tasks->removeTask($task->id);

        return redirect('/tasks');
    }
}
