@extends('Public.Partial.Master')

@section('title', 'Categoría')

@section('home', 'Inicio')
@section('theme', 'Categoría')
@section('description', 'Categorías de nuestra pagina')
@section('image', 'https://casadelaculturadecordoba.com/img/logo.png')
@section('type', 'null')


@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-2 col-xxl-2">
                @include('Public.Partial.Left')
            </div>

            <div class="col-0"></div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">

                <div class="row">

                    @foreach ($categories as $category)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-4 col-xxl-3">
                            <div class="post_card">
                                <div class="post_card_content_left">
                                    <a href="{{ route('public.category.show', $category) }}">
                                        <div class="post_card_content_l_subtitle">
                                            @if ($category->icon)
                                                &nbsp;&nbsp;{!! htmlspecialchars_decode($category->icon) !!}&nbsp;&nbsp;
                                            @else
                                                &nbsp;&nbsp;<i class="fas fa-tags"></i>&nbsp;&nbsp;
                                            @endif
                                            {{ $category->title }}
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="j_mt_1"></div>
                        </div>
                    @endforeach
                </div>
                <div class="row j-mt-10 j-mb-10">
                    {{ $categories->links('vendor.pagination.default') }}
                </div>
            </div>

            <div class="col-0"></div>
        </div>
    </div>
@endsection
