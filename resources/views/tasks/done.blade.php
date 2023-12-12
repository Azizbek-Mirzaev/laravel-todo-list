@extends('admin.parts.layout')
@section('title','Выполнено')
@section('content')
<div class="mt-3">


        <table class="table table-striped text-center">
    <thead>
        <tr>
            <th>№ id</th>
            <th>Заголовок задач</th>
            <th>Основная часть</th>
            <th>Дата Оканчания задачи</th>
            <th>Статус</th>
            <th>Приоритет</th>
            <th>Пользователи</th>
            <th>
                <form action="{{ route('tasks.update',$task->id) }}"
                autocomplete="off"
                method="post">
                @csrf
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

        </tr>
    </thead>
    <tbody>
    @foreach ($tasks as $task )
    <tr>
        <td>{{ $task->id }}</td>
        <td>{{ $task->name }}</td>
        <td>{{ $task->description }}</td>
        <td>{{ $task->deadline }}</td>
        <td>{{ $task->status == 1 ? 'Выполнено' : 'Не выполнено' }}</td>{{--ТернарнаяОперацияЕслиЗнач = 1 то->activeИначе not active --}}
        <td>{{ $task->priority == 1 ? 'priority' : 'not priority'  }}</td>
        <td>{{ $task->user->name }}</td>{{-- == $user->name  == $id ?   $user->name : 'underfind user'   --}}
        <td><a class="btn btn-success" href="{{ route('tasks.edit', $task->id) }}">Изменить</a><br>
            <a class="btn btn-warning" href="{{ route('tasks.show',$task->id) }}">Посмотреть</a><br>
            <a class="btn btn-danger" href="{{ route('tasks.delete',$task->id) }}">Удалить</a></td>
        <td>
            <form action={{ route('tasks.update', $task->id) }}
            autocomplete="off"
            method="post">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="status">Статус</label>
                        <input type="checkbox"
                               id="status"
                               name="status" >
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Выполнено</button>
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
