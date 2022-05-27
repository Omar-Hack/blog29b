@extends('Public.Partial.Master')

@section('title', '' . $post->title)

@section('home', 'Inicio')
@section('theme', 'Publicaciones')
@section('subtopic', '' . $post->title)
@section('description', '' . $post->description)
@section('image', 'https://casadelaculturadecordoba.com' . $post->image)
@section('type', '' . $post->type)

@section('content')
<div class="container">
    <div class="row">

        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-2 col-xxl-2">
            @include('Public.Partial.Left')
        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-8">

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-11 col-xxl-10">
                    <div class="post_card">
                        <div class="blog_card_content_center">
                            <div class="col-12">
                                <div class="blog_card_content_c_title">
                                    {{ $post->title }}
                                </div>
                                <div class="post_card_content_o_date">
                                    <i class="far fa-clock"></i>&nbsp;
                                    {{ $post->created_at->toFormattedDateString() }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <img class="blog_card_content_c_l_img" src="{{ asset($post->image) }}" alt="">
                                </div>
                            </div>
                            <div class="post_card_content_c_text j-mt-5">
                                {{ $post->description }}
                            </div>
                            <div class="col-12 j-mt-5">
                                <div class="modal">
                                    <input type="radio" name="modal" id="R-category">
                                        <label class="modal_label" for="R-category">
                                        <i class="fas fa-tags fa-sm"></i>&nbsp;&nbsp;Categoría
                                    </label>
                                    <div class="modal_card">
                                        <a href="{{ route('public.category.show', $category) }}" class="blog_card_content_options">
                                            @if ($category->icon)
                                            &nbsp;&nbsp;{!! htmlspecialchars_decode($category->icon) !!}&nbsp;&nbsp;
                                            @else
                                            &nbsp;&nbsp;<i class="fas fa-bookmark"></i>&nbsp;&nbsp;
                                            @endif
                                            {{ $category->title }}
                                        </a>
                                    </div>

                                    <input type="radio" name="modal" id="R-tags">
                                    <label class="modal_label" for="R-tags">
                                        <i class="fas fa-bookmark fa-sm"></i>&nbsp;&nbsp;Temas
                                    </label>
                                    <div class="modal_card">
                                        @foreach ($tags as $tag)
                                        <a href="{{ route('public.topic.show', $tag) }}" class="blog_card_content_options">
                                            @if ($tag->icon)
                                            &nbsp;&nbsp;{!! htmlspecialchars_decode($tag->icon) !!}&nbsp;&nbsp;
                                            @else
                                            &nbsp;&nbsp;<i class="fas fa-bookmark"></i>&nbsp;&nbsp;
                                            @endif
                                            {{ $tag->title }}
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="post_card_content_c_l">
                                    <div class="post_card_content_c_text j-mt-5">
                                        {{ $post->content }}
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                @foreach ($images as $image)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-6 col-xxl-4">
                                    <div class="row">
                                        <div class="post_card_content_img">
                                            <img src="{{ asset($image->url) }}" alt="">
                                        </div>
                                    </div>
                                    <label for="{{ $image->id }}" class="post-open-image">
                                        <i class="fas fa-eye fa-lg"></i>
                                    </label>
                                    <input type="checkbox" id="{{ $image->id }}" class="post-open-image-hidden">

                                    <div class="post-modal-image">
                                        <label for="{{ $image->id }}" class="post-open-image">
                                            <i class="fas fa-times-circle fa-lg"></i>
                                        </label>
                                        <img src="{{ asset($image->url) }}" alt="" />
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="footer-line-m"></div>

                        <div class="post_card_content_options">
                            <div class="modal">
                                <input type="radio" name="modal" id="R-comment">
                                <label class="modal_label" for="R-comment">
                                    <i class="far fa-comments fa-lg"></i>&nbsp;&nbsp;comentario
                                </label>
                                <div class="modal_card">

                                    @isset(auth()->user()->id)
                                    {!! Form::open(['route' => ['public.comment.store', ['post' => $post->id]]]) !!}

                                    <div class="row">
                                        <div class="col-2 text-a-c">
                                            <img class="blog_content_comment_img" src="{{ asset(Auth::user()->image) }}" alt="">
                                            <div class="blog_content_comment_img_date">
                                                {{ Auth::user()->name }}
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="table_card_form_group">
                                                @if ($errors->has('content'))
                                                <div class="post_card_content_c_title">
                                                    <i class="fas fa-exclamation-circle"></i>
                                                    {{ $errors->first('content') }}
                                                </div>
                                                @endif
                                                {{ Form::textarea('content', null, ['class' => 'blog_content_comment_input', 'placeholder' => 'Comentar ...']) }}

                                            </div>
                                            <button class="post_card_content_o_title">
                                                &nbsp;<i class="fas fa-arrow-alt-circle-right"></i>&nbsp;&nbsp;Publicar&nbsp;
                                            </button>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                    @else
                                    <div class="blog_card_content_c_title">inicia sesión para comentar
                                        <a href="{{ route('public.login.index') }}" class="post_card_content_o_title">
                                            &nbsp;&nbsp;Iniciar&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;&nbsp;
                                        </a>
                                    </div>
                                    @endif
                                </div>

                                <input id="R-share" name="modal" type="radio">
                                <label class="modal_label" for="R-share">
                                    <i class="far fa-share-square fa-lg"></i>&nbsp;&nbsp;Compartir
                                </label>
                                <div class="modal_card">
                                    <a href="https://www.facebook.com/sharer.php?u={{ request()->fullUrl() }}" target="_blank" rel="noopener" class="blog_card_content_options">
                                        <i class="fab fa-facebook fa-lg"></i>&nbsp;&nbsp;Facebook

                                        @section('title', '' . $post->title)
                                        @section('description', '' . $post->description)
                                        @section('image', 'https://casadelaculturadecordoba.com' . $post->image)
                                    </a>

                                    <a href="https://twitter.com/intent/tweet?&text={{ $post->title }}&url={{ request()->fullUrl() }}&via={{ config('app.name') }}&hashtags=Omar-Lask" target="_blank" rel="noopener" class="blog_card_content_options">
                                        <i class="fab fa-twitter fa-lg"></i>&nbsp;&nbsp;Twitter
                                    </a>

                                    <a href="https://api.whatsapp.com/send?&text={{ $post->title }}%20{{ request()->fullUrl() }}" target="_blank" rel="noopener" class="blog_card_content_options">
                                        <i class="fab fa-whatsapp fa-lg"></i>&nbsp;&nbsp;Whatsapp
                                    </a>
                                </div>

                                <input type="radio" name="modal" id="R-like">
                                <label class="modal_label" for="R-like">
                                    <i class="far fa-heart fa-lg"></i>&nbsp;&nbsp;Me gusta
                                </label>
                                <div class="modal_card">
                                    <a href="#" class="blog_card_content_options">
                                        <i class="far fa-heart fa-sx"></i>&nbsp;&nbsp;500 Me gusta
                                    </a>
                                </div>
                            </div>
                        </div>
                        @include('Public.Comment')
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-2 col-xxl-2">
            @include('Public.Partial.Right')
        </div>
    </div>
</div>
@include('Public.Partial.Footer')
@endsection

