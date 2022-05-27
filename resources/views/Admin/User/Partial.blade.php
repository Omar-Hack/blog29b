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
                                    <i class="fas fa-tags"></i>&nbsp;
                                    <label>Roles</label>
                                    <div class="post_card_content_o_date">( Requerido )</div>
                                    <div class="j-mt-5"></div>
                                </div>
                                @if ($errors->has('roles'))
                                    <div class="post_card_content_o_date">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('roles') }}
                                    </div>
                                @endif
                                <div class="menu_card_content_list">
                                    <input type="checkbox">
                                    <div class="post_card_content_c_title">
                                        <div class="post_card_content_o_date">Selecione Rol</div>
                                    </div>
                                    <div class="menu_card_content_down">
                                        <div class="row">
                                            @foreach ($roles as $role)
                                                <div
                                                    class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-6 col-xxl-4 col-xxxl-4">
                                                    <label class="table_card_tag_label">
                                                        {{ Form::checkbox('roles[]', $role->id), null }}
                                                        <span>
                                                            <i
                                                                class="fas fa-tag fa-xs"></i>&nbsp;&nbsp;{{ $role->name }}
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

                        <div class="post_card_content_options">

                            <a href="{{ route('admin.users.index') }}" class="post_card_content_o_title">
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
                                    <i class="fas fa-user"></i>&nbsp;
                                    <label for="name">Usuario</label>
                                    <div class="j-mt-5"></div>
                                </div>
                                @if ($errors->has('name'))
                                    <div class="post_card_content_o_date">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                                {{ Form::text('name', null, ['class' => 'blog_content_comment_input', 'placeholder' => ' ...']) }}
                            </div>

                            <div class="table_card_form_group">
                                <div class="post_card_content_c_title">
                                    <i class="fas fa-envelope"></i>&nbsp;
                                    <label for="name">Correo</label>
                                    <div class="j-mt-5"></div>
                                </div>
                                @if ($errors->has('email'))
                                    <div class="post_card_content_o_date">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                                {{ Form::text('email', null, ['class' => 'blog_content_comment_input', 'placeholder' => ' ...']) }}
                            </div>

                            <div class="table_card_form_group">
                                <div class="post_card_content_c_title">
                                    <i class="fas fa-key"></i>&nbsp;
                                    <label>Contraseña</label>
                                    <div class="j-mt-5"></div>
                                </div>
                                @if ($errors->has('password'))
                                    <div class="post_card_content_o_date">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                                <input class="blog_content_comment_input" id="password_1" type="password"
                                    name="password" placeholder=" ..." value="{{ old('password') }}" />
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

                                    @isset($user->image)
                                        <img class="blog_card_content_c_l_img_l" src="{{ asset($user->image) }}"
                                            id="picture" alt="">
                                    @else
                                        <img class="blog_card_content_c_l_img_l" id="picture" alt="">
                                    @endisset

                                    <div class="table_card_form_group">
                                        <div class="post_card_content_c_title">
                                            <i class="fas fa-camera-retro"></i>&nbsp;
                                            <label>Foto</label>
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
                                            {{ Form::file('image', ['id' => 'image', 'accept' => '.jpeg, .jpg, .jpe, .png']) }}
                                            <div class="table_card_file_message">Subir foto</div>
                                        </div>
                                    </div>

                                </div>
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
