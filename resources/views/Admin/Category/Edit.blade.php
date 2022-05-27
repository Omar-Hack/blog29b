@extends('Admin.Partial.Master')

@section('title', 'Editar Categoría')

@section('home', 'Admin')
@section('theme', 'Editar Categoría')

@section('content')

    {!! Form::model($category, ['route' => ['admin.categories.update', $category->id], 'method' => 'PUT']) !!}

    @include('Admin.Category.Partial')

    {!! Form::close() !!}

@endsection
