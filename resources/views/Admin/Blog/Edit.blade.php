@extends('Admin.Partial.Master')

@section('title', 'Editar Publicaciones')

@section('home', 'Admin')
@section('theme', 'Editar Publicaciones')

@section('content')

    {!! Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}

    @include('Admin.Blog.Partial')

    {!! Form::close() !!}

@endsection
