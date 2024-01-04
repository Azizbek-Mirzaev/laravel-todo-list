<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TaskStoreApiRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = Task::orderBy($request->get('sort', 'id'), 'desc')
        ->when($request->exists('priority'), function ($builder) use ($request) {
            $builder->where('priority', $request->get('priority'));
        })->with(["user:id,name"])
        ->get();
        return TaskResource::collection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreApiRequest $request)
    {
        $validated = $request->validated();// Получаем валидированные данные из запроса

        $task = Task::query()->create([  // Создаем новую задачу в базе данных с использованием полученных данных
            'name' => $validated['name'],
            'description' => $validated['description'],
            'deadline' => $validated['deadline'],
            'status' => $validated['status'],
            'priority' => $validated['priority'],
            'user_id' => 1 // Устанавливаем user_id на 1 (это может быть изменено в зависимости от вашей логики)
        ]);

        return TaskResource::make($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
