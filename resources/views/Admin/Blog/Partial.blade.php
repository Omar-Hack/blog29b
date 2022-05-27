<div class="container">
    <div class="row">

        <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2">
            @include('Admin.Partial.Left')
        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="post_card">

                        <div class="blog_card_content_center">

                            <div class="table_card_form_group">
                                <div class="post_card_content_c_title">
                                    <i class="fas fa-toggle-on"></i>&nbsp;
                                    <label>Estado</label>
                                    <div class="post_card_content_o_date">( Requerido )</div>
                                </div>
                                @if ($errors->has('status'))
                                    <div class="post_card_content_o_date">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('status') }}
                                    </div>
                                @endif
                                <p></p>

                                <label class="table_card_status_label">
                                    {{ Form::radio('status', '1', null) }}
                                    <span><i class="fas fa-check-circle"></i>&nbsp;&nbsp;Publicar</span>
                                </label>

                                <label class="table_card_status_label">
                                    {{ Form::radio('status', '2', null) }}
                                    <span><i class="fas fa-circle"></i>&nbsp;&nbsp;Suspender</span>
                                </label>
                            </div>

                            <div class="table_card_form_group">
                                <div class="post_card_content_c_title">
                                    <i class="fas fa-paragraph"></i>&nbsp;
                                    <label>Titulo</label>
                                    <div class="post_card_content_o_date">( Requerido )</div>
                                    <div class="j-mt-5"></div>
                                </div>
                                @if ($errors->has('title'))
                                    <div class="post_card_content_o_date">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                                {{ Form::text('title', null, ['class' => 'blog_content_comment_input', 'placeholder' => ' ...']) }}
                            </div>
                        </div>

                        <div class="footer-line-m"></div>

                        <div class="post_card_content_options">

                            <a href="{{ route('admin.posts.index') }}" class="post_card_content_o_title">
                                &nbsp;<i class="fas fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Atras&nbsp;
                            </a>

                            <button class="post_card_content_o_title">
                                &nbsp;<i class="far fa-save"></i>&nbsp;&nbsp;Guardar&nbsp;
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="post_card">
                        <div class="blog_card_content_center">

                            <div class="table_card_form_group">
                                <div class="post_card_content_c_title">
                                    <i class="fas fa-align-left"></i>&nbsp;
                                    <label for="abstract">Descripción</label>
                                    <div class="post_card_content_o_date">( Requerido )</div>
                                    <div class="j-mt-5"></div>
                                </div>
                                @if ($errors->has('description'))
                                    <div class="post_card_content_o_date">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                                {{ Form::textarea('description', null, ['class' => 'blog_content_comment_input', 'placeholder' => ' ...']) }}
                            </div>
                        </div>

                        <div class="footer-line-m"></div>
                        <div class="post_card_content_options"></div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="post_card">
                        <div class="blog_card_content_center">
                            <div class="table_card_form_group">
                                <div class="post_card_content_c_title">
                                    <i class="fas fa-list-alt"></i>&nbsp;
                                    <label for="category">Categoría</label>
                                    <div class="post_card_content_o_date">( Requerido )</div>
                                    <div class="j-mt-5"></div>
                                </div>
                                @if ($errors->has('category'))
                                    <div class="post_card_content_o_date">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('category') }}
                                    </div>
                                @endif
                                <div class="table_card_select">
                                    {{ Form::select('category', $categories, null, ['placeholder' => 'Selecione categoría']) }}
                                </div>
                            </div>

                            <div class="table_card_form_group">
                                <div class="post_card_content_c_title">
                                    <i class="fas fa-tags"></i>&nbsp;
                                    <label>Etiquetas</label>
                                    <div class="post_card_content_o_date">( Requerido )</div>
                                    <div class="j-mt-5"></div>
                                </div>
                                @if ($errors->has('tags'))
                                    <div class="post_card_content_o_date">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('tags') }}
                                    </div>
                                @endif
                                <div class="menu_card_content_list">
                                    <label for="taga" class="ax-hidden"></label>
                                    <input type="checkbox" id="taga">
                                    <div class="post_card_content_c_title">
                                        <div class="post_card_content_o_date">Selecione Etiqueta</div>
                                    </div>
                                    <div class="menu_card_content_down">
                                        <div class="row">
                                            @foreach ($tags as $tag)
                                                <div
                                                    class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-6 col-xxl-4 col-xxxl-4">
                                                    <label class="table_card_tag_label">
                                                        {{ Form::checkbox('tags[]', $tag->id), null }}
                                                        <span>
                                                            <i
                                                                class="fas fa-tag fa-xs"></i>&nbsp;&nbsp;{{ $tag->title }}
                                                        </span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="footer-line-m"></div>
                        <div class="post_card_content_options"></div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="post_card">
                        <div class="blog_card_content_center">

                            @if ($errors->has('image'))
                                <div class="post_card_content_o_date">
                                    <i class="fas fa-exclamation-circle"></i>&nbsp;&nbsp;Selecione Imagenes
                                </div>
                            @endif

                            <div class="modal">
                                <input type="radio" name="modal" id="R-image">
                                <label class="modal_label" for="R-image">
                                    <i class="fas fa-photo-video"></i>&nbsp;&nbsp;Portada
                                </label>
                                <div class="modal_card">

                                    @isset($post->image)
                                        <img class="blog_card_content_c_l_img_l" src="{{ asset($post->image) }}"
                                            id="picture" alt="">
                                    @else
                                        <img class="blog_card_content_c_l_img_l" id="picture" alt="">
                                    @endisset

                                    <div class="table_card_form_group">
                                        <div class="post_card_content_c_title">
                                            <i class="fas fa-camera-retro"></i>&nbsp;
                                            <label for="image">Foto</label>
                                            <div class="post_card_content_o_date">( Requerido )</div>
                                            <div class="j-mt-5"></div>
                                        </div>
                                        @if ($errors->has('image'))
                                            <div class="post_card_content_o_date">
                                                <i class="fas fa-exclamation-circle"></i>
                                                {{ $errors->first('image') }}
                                            </div>
                                        @endif
                                        <div class="table_card_file">
                                            <input type="file" name="image" id="image" accept=".jpeg, .jpg, .jpe, .png">
                                            <div class="table_card_file_message">Subir foto</div>
                                        </div>
                                    </div>

                                </div>

                                <input type="radio" name="modal" id="R-images">
                                <label class="modal_label" for="R-images">
                                    <i class="fas fa-images"></i>&nbsp;&nbsp;Galería
                                </label>
                                <div class="modal_card">

                                    @isset($images)
                                        <div class="blog_card_content_c_l_img_s" id="pictures">
                                            @foreach ($images as $image)
                                                <img src="{{ asset($image->url) }}">
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="blog_card_content_c_l_img_s" id="pictures"></div>
                                    @endisset

                                    <div class="table_card_form_group">
                                        <div class="post_card_content_c_title">
                                            <i class="fas fa-camera-retro"></i>&nbsp;
                                            <label for="images">Galería</label>
                                            <div class="post_card_content_o_date">( Opcional )</div>
                                            <div class="j-mt-5"></div>
                                        </div>
                                        @if ($errors->has('images'))
                                            <div class="post_card_content_o_date">
                                                <i class="fas fa-exclamation-circle"></i>
                                                {{ $errors->first('images') }}
                                            </div>
                                        @endif
                                        <div class="table_card_file">
                                            <input type="file" multiple name="images[]" id="images"
                                                accept=".jpeg, .jpg, .jpe, .png">
                                            <div class="table_card_file_message">Subir imagenes</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-line-m"></div>
                        <div class="post_card_content_options"></div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="post_card">
                        <div class="blog_card_content_center">

                            <div class="table_card_form_group">
                                <div class="post_card_content_c_title">
                                    <i class="fas fa-file-alt"></i>&nbsp;
                                    <label for="content">Contenido</label>
                                    <div class="post_card_content_o_date">( Requerido )</div>
                                    <div class="j-mt-5"></div>
                                </div>
                                @if ($errors->has('content'))
                                    <div class="post_card_content_o_date">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('content') }}
                                    </div>
                                @endif
                                {{ Form::textarea('content', null, ['class' => 'blog_content_comment_input', 'placeholder' => ' ...']) }}
                            </div>
                        </div>

                        <div class="footer-line-m"></div>
                        <div class="post_card_content_options"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Admin.Partial.Image')
