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
                                    <span><i class="fas fa-check-circle"></i>&nbsp;&nbsp;Activo</span>
                                </label>

                                <label class="table_card_status_label">
                                    {{ Form::radio('status', '2', null) }}
                                    <span><i class="fas fa-circle"></i>&nbsp;&nbsp;Suspendido</span>
                                </label>
                            </div>

                            <div class="table_card_form_group">
                                <div class="post_card_content_c_title">
                                    <i class="fas fa-paragraph"></i>&nbsp;
                                    <label>Nombre</label>
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

                            <a href="{{ route('admin.categories.index') }}" class="post_card_content_o_title">
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
                                    <i class="fas fa-paragraph"></i>&nbsp;
                                    <label>Icono</label>
                                    <div class="post_card_content_o_date">( Opcional )</div>
                                    <div class="j-mt-5"></div>
                                </div>
                                @if ($errors->has('icon'))
                                    <div class="post_card_content_o_date">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('icon') }}
                                    </div>
                                @endif
                                {{ Form::text('icon', null, ['class' => 'blog_content_comment_input', 'placeholder' => ' ...']) }}
                            </div>

                            <div class="table_card_form_group">
                                <div class="post_card_content_c_title">
                                    <i class="fas fa-align-left"></i>&nbsp;
                                    <label for="abstract">Descripción</label>
                                    <div class="post_card_content_o_date">( Opcional )</div>
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
            </div>
        </div>
    </div>
