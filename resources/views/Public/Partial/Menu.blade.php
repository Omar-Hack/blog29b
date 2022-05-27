<div class="menu_card">
    <div class="menu_card">
        <div class="menu_card_right">
            <div class="sub_menu_card_content_list">
                <label for="user" class="ax-hidden"></label>
                <input type="checkbox" id="user">

                @guest
                    <div class="post_card_content_l_subtitle j-mt-5">
                        <i class="fas fa-user"></i>&nbsp;&nbsp;Registro
                    </div>

                    <div class="sub_menu_card_content_down">

                        <div class="j-mt-10"></div>

                        <a href="{{ route('public.register.index') }}">
                            <div class="menu-card-content-text">
                                <i class="fas fa-user-edit"></i>&nbsp;&nbsp;Crear Cuenta
                            </div>
                        </a>

                        <div class="j-mt-10"></div>

                        <a href="{{ route('public.login.index') }}">
                            <div class="menu-card-content-text">
                                <i class="fas fa-user-plus"></i>&nbsp;&nbsp;Iniciar Sesión
                            </div>
                        </a>

                        <div class="j-mt-10"></div>

                        <a href="{{ route('public.post.index') }}">
                            <div class="menu-card-content-text">
                                <i class="fab fa-blogger-b fa-lg"></i>&nbsp;&nbsp;Blog
                            </div>
                        </a>

                    </div>
                @else
                    <div class="row">
                        <div class="col-4">
                            @isset(Auth::user()->image)
                                <img class="blog_content_comment_img" src="{{ asset(Auth::user()->image) }}" alt="">
                            @endisset
                        </div>

                        <div class="col-8 j-mt-15">
                            @isset(Auth::user()->name)
                                <div class="blog_content_comment_img_date">
                                    {{ Auth::user()->name }}
                                </div>
                            @endisset
                        </div>
                    </div>

                    <div class="sub_menu_card_content_down">

                        <div class="j-mt-10"></div>

                        <a href="{{ route('public.post.index') }}">
                            <div class="menu-card-content-text">
                                <i class="fab fa-blogger-b fa-lg"></i>&nbsp;&nbsp;Blog
                            </div>
                        </a>

                        @can('admin.posts.index')
                            <div class="j-mt-10"></div>

                            <a href="{{ route('admin.posts.index') }}">
                                <div class="menu-card-content-text">
                                    <i class="fas fa-tools"></i>&nbsp;&nbsp;Panel
                                </div>
                            </a>
                        @endcan

                        <div class="j-mt-10"></div>

                        <a href="#">
                            <div class="menu-card-content-text">
                                <i class="fas fa-user-circle"></i>&nbsp;&nbsp;Perfil
                            </div>
                        </a>

                        <div class="j-mt-10"></div>

                        <a href="{{ route('logout') }}">
                            <div class="menu-card-content-text">
                                <i class="fas fa-user-lock"></i>&nbsp;&nbsp;Cerrar Sesión
                            </div>
                        </a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
    <label>
        <input type="checkbox" id="menu_card_left" class="menu_card_left_checkbox">
        <div class="menu_card_left">

            <label class="menu_card_toggle ax-hidden" for="menu_card_left">
                <i class="fas fa-th-large"></i>
            </label>

            <div class="menu_card_content">
                <a href="#">
                    <div class="menu-card-content-text">
                        <i class="fas fa-book"></i>&nbsp;
                        Contactános
                        <p class="menu-card-content-subtext">10 pendejada</p>
                    </div>
                </a>
            </div>
        </div>
    </label>
</div>
