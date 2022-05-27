@extends('Admin.Partial.Master')

@section('title', 'Crear Usuarios')

@section('home', 'Admin')
@section('theme', 'Crear Usuarios')

@section('content')

    {!! Form::open(['route' => 'admin.users.store', 'files' => true]) !!}

    @include('Admin.User.Partial')

    {!! Form::close() !!}

@endsection
