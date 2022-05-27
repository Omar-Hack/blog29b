@extends('Admin.Partial.Master')

@section('title', 'Editar Etiquetas')

@section('home', 'Admin')
@section('theme', 'Editar Etiquetas')

@section('content')

    {!! Form::model($tag, ['route' => ['admin.tags.update', $tag->id], 'method' => 'PUT']) !!}

        @include('Admin.Tag.Partial')

    {!! Form::close() !!}

@endsection


