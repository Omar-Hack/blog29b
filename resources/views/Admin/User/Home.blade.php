@extends('Admin.Partial.Master')

@section('title', 'Listar Usuarios')

@section('home', 'Admin')
@section('theme', 'Listar Usuarios')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-2 col-xxl-2">
                @include('Admin.Partial.Left')
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-8 col-xxl-10">

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-11 col-xxl-10">
                        <div class="post_card">
                            <div>

                                <div class="table_card table_card_movil">
                                    <table class="table table_card_content">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <i class="fas fa-sort-numeric-down"></i>&nbsp;Registro
                                                </th>
                                                <th>
                                                    <i class="fas fa-toggle-on"></i>&nbsp;Estado
                                                </th>
                                                <th>
                                                    <i class="fas fa-paragraph"></i>&nbsp;Nombre
                                                </th>
                                                <th>
                                                    <i class="far fa-clock"></i>&nbsp;Creado
                                                </th>
                                                <th>
                                                    <i class="fas fa-cogs"></i>&nbsp;Permisos
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>

                                    <table class="table">
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td data-title="Número">{{ $user->id }}</td>
                                                    <td data-title="Estado">
                                                        @if ($user->status == '1')
                                                            <i class="far fa-laugh-beam fa-lg"></i>&nbsp;&nbsp;Activo
                                                        @else
                                                            <i class="fas fa-grimace fa-lg"></i>&nbsp;&nbsp;Suspendido
                                                        @endif
                                                    </td>
                                                    <td data-title="Titulo">{{ $user->name }}</td>
                                                    <td data-title="Creado">{{ $user->updated_at }}</td>

                                                    <td data-title="Acciones">
                                                        <div class="row">

                                                            @can('admin.users.edit')
                                                                <a class="paginate" aria-label="Editar"
                                                                    href="{{ route('admin.users.edit', $user->id) }}">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            @endcan

                                                            @can('admin.users.destroy')
                                                                <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="paginate" aria-label="Eliminar">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </button>
                                                                </form>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row j-mt-10 j-mb-10">
                    {{ $users->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
    </div>
@endsection
