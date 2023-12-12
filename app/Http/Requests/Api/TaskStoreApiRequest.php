<?php

namespace App\Http\Requests\Api;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskStoreApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:250'],
            'description' => ['required', 'string', 'min:5'],
            'deadline' => ['required', 'date'],
            'status' => ['required', 'boolean'],
            'priority' => ['required', 'integer', Rule::in([Task::PRIORITY_LOW, Task::PRIORITY_HIGH, Task::PRIORITY_NORMAL])],
        ];
    }
}
