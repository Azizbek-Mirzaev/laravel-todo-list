@extends('admin.parts.layout')
@section('title', 'Просмотр Статуса')
@section('content')
<table class="table table-striped text-center">
    <thead>
    <tr>
            <th>№ id</th>
            <th>Заголовок задач</th>
            <th>Основная часть</th>
            <th></th>
            <th>Дата Оканчания задачи</th>
            <th></th>
            <th>Статус</th>
            <th></th>
            <th>Приоритет</th>
            <th></th>
            <th>Пользователи</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$task->id}} </td>
        <td>{{$task->name}}</td>
        <td>{{$task->description}}<td>
        <td>{{$task->deadline}}<td>
        <td>{{$task->status == 1 ? 'active' : 'not active' }}<td>
        <td>{{$task->priority == 1 ? 'priority' : 'not priority'}}<td>
        <td>{{$task->user->name }}<td>

        </tr>
        </tbody>
</table>
<a  class="btn btn-secondary" href="{{ route('tasks.index') }}">Назад</a>

@endsection