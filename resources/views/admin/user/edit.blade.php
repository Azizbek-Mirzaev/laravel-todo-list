@extends('admin.parts.layout')
@section('title','Изменить пользователя')
@section('content')
<form action="{{route('admin.user.update',$user->id)}}" 
      method="post" 
      autocomplete="off"> 
    @csrf
<div class="class form-group">
    <label for="name">FIO</label>
    <input type="text" 
           id="name" 
           name="name" 
           value="{{$user->name}}"
           class="form-control">
</div>
<div class="class form-group">
    <label for="email">Email</label>
    <input type="text" 
           id="email" 
           name="email" 
           value="{{$user->email}}"
           class="form-control">
</div>
<div class="class form-group">
    <label for="password">Password</label>
    <input type="text" 
           id="password" 
           name="password" 
           placeholder="Enter password"
           class="form-control">
</div>
<button class="btn btn-primary" type="submit">Сохранить</button>

<br><br>
<a class="btn btn-primary" href="{{route('admin.user.index')}}">Назад</a>
</form>


@endsection