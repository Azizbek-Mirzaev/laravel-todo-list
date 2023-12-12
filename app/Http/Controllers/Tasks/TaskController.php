<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
         $tasks = Task::orderBy($request->get('sort', 'id'), 'desc')
            ->when($request->exists('priority'), function ($builder) use ($request) {
                $builder->where('priority', $request->get('priority'));
            })->with(["user:id,name"])
            ->get();


         return view('tasks.index',
         [
            'task_list' => $tasks
         ]);

    }
    public function done(Request $request, int $id)
    {
        $task = Task::find($id);

        // $task->name = $request->name;
        // $task->description = $request->description;
        // $task->deadline = $request->deadline;
        $task->status = !$task->status;
        //$task->priority = $request->priority ? true : false;

        //$task->user_id = auth()->id();
        //dd($task->name);
        $task->save();

        return redirect()->back();

    }
    public function create()
    {
         $task = Task::get();

            // $task->priority = Task::PRIORITY_LOW
        //  return view('tasks.create',[
        //         'task'=>$task
        //     ]);
        return TaskResource::collection($task);

    }
    public function store(Request $request)
    {   $data = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:400',
            'deadline' => 'required|date',
            'status' => 'nullable|string',
            'priority' => 'required|integer',
        ]);

        $task = new Task();
       //dd($request->all());
        $task->name = $request->name;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->status = $request->boolean('status');
        $task->priority = $request->priority;
        //$task->status = $request->status == "on" ? 1 : 0; итак правельно
       // $task->priority = $request->priority == "on" ? 1 : 0; итак правельно
        $task->user_id = auth()->id();
        $task->save();
        //dd($request->all());
        //dd($request->all());

         return redirect()->back();
    }
    public function update(Request $request, int $id)
    {
        $task = Task::find($id);

        $task->name = $request->name;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->status = $request->status ? true : false;
        $task->priority = $request->priority ? true : false;
        $task->user_id = auth()->id();
        $task->save();


        return redirect()->back()->with('task', $task->refresh());
    }
    public function edit($id)
    {
         $task = Task::find($id);
         if(! $task){
            abort(404);
        }
         return view('tasks.edit',[
            'task'=>$task]);

    }

    public function statusSwitch(int $id) {
        $task = Task::find($id);

        $task->status = !$task->status;

        return redirect()->back()->with('task', $task->refresh());
    }

    public function delete($id)
    {
         $task = Task::find($id);

         $task->delete();

         return redirect()->back();

    }
    public function show($id)
    {
         $task = Task::find($id);

         if(is_null($task)){
            abort(404);
        }
        return view('tasks.show',[
            'task'=>$task]);

    }
    public function status()
    {
         $task = Task::find();

         if(is_null($task))
        {
            abort(404);

            $task = Task::orderBy('deadline', 'asc')
            ->with(["user:id,name,created_at"])
            ->get();
             //$task = Task::orderBy(request('sort', 'status'),request('order','desk'))
            //->with(["user:id,name,created_at"])
            //->get();
            return view('tasks.status',[
                'task'=>$task]);
            }
    }

}
