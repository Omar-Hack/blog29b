@isset($comments)
@foreach ($comments as $comment)
    <div class="blog_card_content_comment_center j-mt-10">
        <div class="row">
            <div class="col-2 text-a-c">
                <img class="blog_content_comment_img" src="{{ asset($comment->user->image) }}" alt="">
                <div class="blog_content_comment_img_date">
                    {{ $comment->user->name }}
                </div>
            </div>
            <div class="col-10">
                <div class="post_card_content_c_text">
                    <div class="post_card_content_o_text">
                        {{ $comment->content }}
                    </div>
                    <br>
                    <div class="post_card_content_o_date">
                        <i class="far fa-clock"></i>&nbsp;
                        {{ $comment->created_at->toFormattedDateString() }}
                    </div>
                    <div class="modal">

                        {{-- Actualizar --}}
                        @isset(auth()->user()->id)
                            @if ($comment->user_id == Auth::user()->id)
                                <input id="E-{{ $comment->id }}" name="comentarios" type="radio">
                                <label class="modal_label" for="E-{{ $comment->id }}">
                                    <i class="far fa-comment-dots fa-lg"></i>&nbsp;&nbsp;Editar
                                </label>
                                <div class="modal_card">
                                    {!! Form::model($comment, ['route' => ['public.comment.update', $comment->id], 'method' => 'PUT']) !!}
                                    <div class="row">
                                        <div class="col-2 text-a-c">
                                            <img class="blog_content_comment_img"
                                                src="{{ asset($comment->user->image) }}" alt="">
                                            <div class="blog_content_comment_img_date">
                                                {{ $comment->user->name }}
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="post_card_content_c_text">
                                                @if ($errors->has('content'))
                                                    <div class="post_card_content_c_title">
                                                        <i class="fas fa-exclamation-circle"></i>
                                                        {{ $errors->first('content') }}
                                                    </div>
                                                @endif
                                                {{ Form::textarea('content', null, ['class' => 'blog_content_comment_input', 'placeholder' => ' ...']) }}
                                            </div>
                                            <button class="post_card_content_o_title">
                                                &nbsp;<i
                                                    class="fas fa-arrow-alt-circle-right"></i>&nbsp;&nbsp;Actualizar&nbsp;
                                            </button>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            @endif
                        @endisset

                        @isset(auth()->user()->id)
                            @if ($comment->user_id)
                                <input id="C-{{ $comment->id }}" name="comentarios" type="radio">
                                <label class="modal_label" for="C-{{ $comment->id }}">
                                    <i class="far fa-comments fa-lg"></i>&nbsp;&nbsp;Comentar
                                </label>
                                <div class="modal_card">
                                    {!! Form::open(['route' => ['public.comment.store', ['post' => $post->id]]]) !!}
                                    {{ Form::hidden('parent_id', $comment->id) }}
                                    <div class="row">
                                        <div class="col-2 text-a-c">
                                            <img class="blog_content_comment_img" src="{{ asset(Auth::user()->image) }}"
                                                alt="">
                                            <div class="blog_content_comment_img_date">
                                                {{ Auth::user()->name }}
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="post_card_content_c_text">
                                                @if ($errors->has('content'))
                                                    <div class="post_card_content_c_title">
                                                        <i class="fas fa-exclamation-circle"></i>
                                                        {{ $errors->first('content') }}
                                                    </div>
                                                @endif
                                                {{ Form::textarea('content', null, ['class' => 'blog_content_comment_input', 'placeholder' => ' ...']) }}
                                            </div>
                                            <button class="post_card_content_o_title">
                                                &nbsp;<i
                                                    class="fas fa-arrow-alt-circle-right"></i>&nbsp;&nbsp;Publicar&nbsp;
                                            </button>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            @endif
                        @endisset

                        @isset(auth()->user()->id)
                            @if ($comment->user_id == Auth::user()->id)
                                {!! Form::open(['route' => ['public.comment.destroy', $comment->id], 'method' => 'DELETE']) !!}
                                <button class="post_card_content_o_title" type="submit">
                                    &nbsp;&nbsp;<i class="far fa-trash-alt fa-lg"></i>&nbsp;&nbsp;Eliminar&nbsp;&nbsp;
                                </button>
                                {!! Form::close() !!}
                            @endif
                        @endisset
                    </div>
                </div>
            </div>
        </div>
        @include('Public.Comment', ['comments' => $comment->replies])
    </div>
@endforeach
@endisset
