@extends('Admin.Partial.Master')

@section('title', 'Crear Categoría')

@section('home', 'Admin')
@section('theme', 'Crear Categoría')

@section('content')

    {!! Form::open(['route' => 'admin.categories.store']) !!}

    @include('Admin.Category.Partial')

    {!! Form::close() !!}

@endsection
