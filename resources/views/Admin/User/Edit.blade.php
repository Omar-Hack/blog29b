@extends('Admin.Partial.Master')

@section('title', 'Editar Usuarios')

@section('home', 'Admin')
@section('theme', 'Editar Usuarios')

@section('content')

    {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}

    @include('Admin.User.Partial')

    {!! Form::close() !!}

@endsection
