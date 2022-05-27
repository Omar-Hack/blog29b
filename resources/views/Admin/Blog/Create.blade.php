@extends('Admin.Partial.Master')

@section('title', 'Crear Publicaciones')

@section('home', 'Admin')
@section('theme', 'Crear Publicaciones')


@section('content')

    {!! Form::open(['route' => 'admin.posts.store', 'files' => true]) !!}

    @include('Admin.Blog.Partial')

    {!! Form::close() !!}

@endsection
