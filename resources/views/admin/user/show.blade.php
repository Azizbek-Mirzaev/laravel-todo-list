@extends('admin.parts.layout')
@section('title', $user->name)
@section('content')
<table class="table table-striped text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>FIO</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
        </tbody>
</table>
<a  class="btn btn-primary" href="{{ route('admin.user.index') }}">Выход</a>

@endsection
