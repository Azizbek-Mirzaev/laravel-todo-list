@extends('admin.parts.layout')
@section('title','Задачи')
@section('content')
<div class="mt-3">
    <form action="{{route('tasks.update',$task->id)}}"
          autocomplete="off"
          method="post">
        @csrf
        <div class="form-group">
            <label for="name">Заголовок задач</label>
            <input type="string"
                   value="{{$task->name}}"
                   class="form-control"
                   name="name"
                   id="name"
                   required="required">

            <div class="form-group">
            <label for="description">Основная часть</label>
            <textarea name="description"
                      type="text"
                      id="description"
                      class="form-control"
                      required="required"
                      rows="5">{{$task->description}}</textarea>{{-- для textarea value ставят тут >{{$task->description}}</textarea> --}}
            </div>
            <div class="form-group">
            <label for="deadline">Дата Оканчания задачи</label>
            <input type="datetime-local"
                   name="deadline"
                   id="deadline"
                   value="{{$task->deadline}}"
                   class="form-control-file"
                   required="required">
            </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="status">Статус</label>
                    <input type="checkbox"
                           @if($task->status) checked @endif
                           id="status"
                           name="status">
                </div>
            </div>
            {{-- <div class="col-4">
                <div class="form-group">
                    <label for="priority">Приоритет</label>
                    <input type="checkbox"
                           @if($task->priority) checked @endif
                           id="priority"
                           name="priority">
                </div>
            </div>
        </div> --}}
        <form action="{{route('tasks.update',$task->id)}}"
            autocomplete="off"
            method="post">
          @csrf
                <div class="col-4">
                    <div class="form-group">
                        <label for="priority">Приоритет</label>
                        <select name="priority" id="priority-id" type="select"  value="{{$task->priority}}">
                            {{-- @if($task->priority) checked @endif --}}

                            <option @if (request()->get('priority') == '3' ) selected @endif value="3">Высокий</option>
                            <option @if (request()->get('priority') == '2' ) selected @endif value="2">Средний</option>
                            <option @if (request()->get('priority') == '1' ) selected @endif value="1">Низкий</option>

                        </select>
                    </div>
                </div>
        </div>
</div>
<button class="btn btn-primary" type="submit">Сохранить</button>
    </form>
    <br> <br>
<a  class="btn btn-secondary" href="{{ route('tasks.index') }}">Назад</a>

@endsection
