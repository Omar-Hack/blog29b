@extends('Admin.Partial.Master')

@section('title', 'Create Etiquetas')

@section('home', 'Admin')
@section('theme', 'Create Etiquetas')

@section('content')

    {!! Form::open(['route' => 'admin.tags.store']) !!}

        @include('Admin.Tag.Partial')

    {!! Form::close() !!}

@endsection
