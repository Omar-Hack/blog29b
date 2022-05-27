@extends('Public.Partial.Master')

@section('title', 'Publicaciones')

@section('home', 'Inicio')
@section('theme', 'Publicaciones')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-2 col-xxl-2">
            @include('Public.Partial.Left')
        </div>

        <div class="col-0"></div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-9">

            <div class="row">
                @foreach ($posts as $post)
                <div class="col-12 col-sm-12 col-md-6 col-lg-11 col-xl-10 col-xxl-8">
                    <div class="post_card">
                        <a href="{{ route('public.blog.show', $post) }}">
                            <div class="post_card_content_center">
                                <div class="row">
                                    <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                        <img class="post_card_content_c_l_img" src="{{ asset($post->image) }}" alt="">
                                        <div class="post_card_content_o_date">
                                            <i class="far fa-clock"></i>&nbsp;
                                            {{ $post->created_at->toFormattedDateString() }}
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-6 col-lg-8 col-xl-8 col-xxl-8">
                                        <div class="post_card_content_c_l">
                                            <div class="post_card_content_c_title">
                                                {{ $post->title }}
                                            </div>
                                            <div class="post_card_content_c_text j-mt-5">
                                                {{ $post->description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="footer-line-m"></div>

                        <div class="post_card_content_options">

                            <div class="modal">
                                <input id="R-comment{{ $post->id }}" type="radio" name="modal">
                                <label class="modal_label" for="R-comment{{ $post->id }}">
                                    @if ($post->comments->count() == '0')
                                    <i class="far fa-comments fa-lg"></i>&nbsp;&nbsp; Sin Comentarios
                                    @else
                                    <i class="far fa-comments fa-lg"></i>&nbsp;&nbsp;{{ $post->comments->count() }}
                                    Comentarios
                                    @endif
                                </label>

                                <input id="R-share{{ $post->id }}" name="modal" type="radio">
                                <label class="modal_label" for="R-share{{ $post->id }}">
                                    <i class="far fa-share-square fa-lg"></i>&nbsp;&nbsp;Compartir
                                </label>
                                <div class="modal_card">
                                    <a href="https://www.facebook.com/sharer.php?u={{ request()->fullUrl() }}/{{ $post->slug }}" target="_blank" rel="noopener" class="blog_card_content_options">
                                        <i class="fab fa-facebook fa-lg"></i>&nbsp;&nbsp;Facebook

                                        @section('title', '' . $post->title)
                                        @section('description', '' . $post->description)
                                        @section('image', 'https://casadelaculturadecordoba.com' . $post->image)

                                    </a>

                                    <a href="https://twitter.com/intent/tweet?&text={{ $post->title }}&url={{ request()->fullUrl() }}/{{ $post->slug }}&via={{ config('app.name') }}&hashtags=Omar-Lask" target="_blank" rel="noopener" class="blog_card_content_options">
                                        <i class="fab fa-twitter fa-lg"></i>&nbsp;&nbsp;Twitter
                                    </a>

                                    <a href="https://api.whatsapp.com/send?&text={{ $post->title }}%20{{ request()->fullUrl() }}/{{ $post->slug }}" target="_blank" rel="noopener" class="blog_card_content_options">
                                        <i class="fab fa-whatsapp fa-lg"></i>&nbsp;&nbsp;Whatsapp
                                    </a>
                                </div>
                                <input id="R-like{{ $post->id }}" name="modal" type="radio">
                                <label class="modal_label" for="R-like{{ $post->id }}">
                                    <i class="far fa-heart fa-lg"></i>&nbsp;&nbsp;Me gusta
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row j-mt-10 j-mb-10">
                {{ $posts->links('vendor.pagination.default') }}
            </div>
        </div>

        <div class="col-0"></div>
    </div>
</div>
@include('Public.Partial.Footer')
@endsection

