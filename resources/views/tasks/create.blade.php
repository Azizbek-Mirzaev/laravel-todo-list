@extends('admin.parts.layout')
@section('title','Задачи')
@section('content')

@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-default-danger">{{$error}}</div>
@endforeach
@endif


<div class="mt-3">
    <form action="{{route('tasks.store')}}"
          autocomplete="off"
          method="post">
        @csrf
        <div class="form-group">
            <label for="name">Заголовок задач</label>
            <input type="string"
                   class="form-control"
                   placeholder="Введите задачу"
                   name="name"
                   id="name">

            <div class="form-group">
            <label for="description">Основная часть</label>
            <textarea name="description"
                      id="description"
                      class="form-control"
                      placeholder="Введите текст"
                      rows="5"></textarea>
            </div>
            <div class="form-group">
            <label for="deadline">Дата Оканчания задачи</label>
            <input type="datetime-local"
                   name="deadline"
                   id="deadline"
                   class="form-control-file">
            </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="status">Статус</label>
                    <input type="checkbox"
                           id="status"
                           name="status" >
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="priority">Приоритет</label>
                    <select name="priority" id="priority-id" type="select" >
                        <option value="3">Высокий</option>
                        <option value="2">Средний</option>
                        <option value="1">Низкий</option>
                    </select>
                </div>
            </div>
        </div>

</div>
<button class="btn btn-primary" type="submit" >Сохранить</button>
    </form>
    <br> <br>
<a  class="btn btn-secondary" href="{{ route('tasks.index') }}">Назад</a>

@endsection
