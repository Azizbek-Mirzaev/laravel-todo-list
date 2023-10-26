@extends('admin.parts.layout')
@section('title','Пользователи')
@section('content')
 Тут должно быть какая то новость
{{-- @dd($user_list)--}}

<br>
<a href="{{ route('showLoginForm') }}">Выход</a>
@endsection
