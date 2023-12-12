@extends('admin.parts.layout')
@section('title','Задачи')
@section('content')
<div class="mt-3">
    <a href="{{route('tasks.create')}}" class="btn btn-primary">Создать</a>

        <table class="table table-striped text-center">
    <thead>
        <tr>
            <th>№ id</th>
            <th>Заголовок задач</th>
            <th>Основная часть</th>
            <th>Дата Оканчания задачи</th>
            <th>Статус</th>
            <th><form action="{{ route('tasks.index') }}"
                method="get">
               <label for="priority-id">Приоритет</label>
               <select name="priority" id="priority-id">
                   <option @if (request()->get('priority') == '3' ) selected @endif value="3">Высокий</option>{{-- тут get идет по priority где --}}
                   <option @if (request()->get('priority') == '2' ) selected @endif value="2">Средний</option>
                   <option @if (request()->get('priority') == '1' ) selected @endif value="1">Низкий</option>
               </select>
               <button type="submit">ОК</button>
           </form></th>
           <th>Пользователи</th>
            <th>
                <form action="{{ route('tasks.index') }}"
                     method="get">
                    <label for="sort-id">Сортировка</label>
                    <select name="sort" id="sort-id">
                        <option @if (request()->get('sort') == 'id' ) selected @endif value="id">ID</option>
                        <option @if (request()->get('sort') == 'priority' ) selected @endif value="priority">Приоритет</option>
                        <option @if (request()->get('sort') == 'status') selected @endif value="status">Статус</option>
                        <option @if (request()->get('sort') == 'deadline') selected @endif value="deadline">По дате</option>
                    </select>
                    <button type="submit">Sort</button>
                </form>
            </th>
            <th>Редактирования по Статусу</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($task_list as $task )
    <tr style= "background-color: green @if($task->status)  @elseif ($task->status)  background-color: red @else background-color: black @endif">
        <td>{{ $task->id }}</td>
        <td>{{ $task->name }}</td>
        <td>{{ $task->description }}</td>
        <td>{{ $task->deadline }}</td>
        <td>{{ $task->status == 1 ? 'Выполнено' : 'Не выполнено' }}</td>{{--ТернарнаяОперацияЕслиЗнач = 1 то->activeИначе not active --}}
        <td>
            {{      match ($task->priority)
                {   1 => 'Низкий',
                    2 => 'Средний',
                    3 => 'Высокий',
                    default => 'N/A'
                }

            }}
        </td>

        <td>{{ $task->user->name }}</td>{{-- == $user->name  == $id ?   $user->name : 'underfind user'   --}}
        <td><a class="btn btn-success" href="{{ route('tasks.edit', $task->id) }}">Изменить</a><br>
            <a class="btn btn-warning" href="{{ route('tasks.show',$task->id) }}">Посмотреть</a><br>
            <a class="btn btn-danger" href="{{ route('tasks.delete',$task->id) }}">Удалить</a></td>
        <td>
<div class="mt-4">
            <form action={{ route('tasks.done', $task->id) }}
            autocomplete="off"
            method="post">
            @csrf

                <button class="btn @if($task->status) btn-success
                 @else btn-danger @endif"
                 type="submit">@if($task->status)
                 On @else Off @endif</button>

            </div>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>

    </table>
</div>
<br> <br>
<a  class="btn btn-secondary" href="{{ route('admin') }}">Назад</a>
@endsection


