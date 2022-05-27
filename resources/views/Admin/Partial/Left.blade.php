<div class="post_card">
    <div class="post_card_content_left">

        <div class="sub_menu_card_content_list">

            <label for="usuario" class="ax-hidden"></label>
            <input type="checkbox" id="usuario">
            <div class="post_card_content_l_subtitle">
                <i class="fas fa-user"></i>&nbsp;&nbsp;Usuario
            </div>

            <div class="sub_menu_card_content_down">

                @can('admin.users.index')
                    <div class="j-mt-10"></div>

                    <a href="{{ route('admin.users.index') }}">
                        <div class="menu-card-content-text">
                            <i class="fas fa-list-ul"></i>&nbsp;&nbsp;Listar
                        </div>
                    </a>
                @endcan

                @can('admin.users.create')
                    <div class="j-mt-10"></div>

                    <a href="{{ route('admin.users.create') }}">
                        <div class="menu-card-content-text">
                            <i class="far fa-plus-square"></i>&nbsp;&nbsp;Crear
                        </div>
                    </a>
                @endcan
            </div>
        </div>

        <div class="sub_menu_card_content_list">

            <label for="blog" class="ax-hidden"></label>
            <input type="checkbox" id="blog">
            <div class="post_card_content_l_subtitle">
                <i class="fab fa-blogger-b"></i>&nbsp;&nbsp;Blog
            </div>

            <div class="sub_menu_card_content_down">

                @can('admin.posts.index')
                    <div class="j-mt-10"></div>

                    <a href="{{ route('admin.posts.index') }}">
                        <div class="menu-card-content-text">
                            <i class="fas fa-list-ul"></i>&nbsp;&nbsp;Listar
                        </div>
                    </a>
                @endcan

                @can('admin.posts.create')
                    <div class="j-mt-10"></div>

                    <a href="{{ route('admin.posts.create') }}">
                        <div class="menu-card-content-text">
                            <i class="far fa-plus-square"></i>&nbsp;&nbsp;Crear
                        </div>
                    </a>
                @endcan
            </div>
        </div>

        <div class="sub_menu_card_content_list">


            <label for="etiqueta" class="ax-hidden"></label>
            <input type="checkbox" id="etiqueta">
            <div class="post_card_content_l_subtitle">
                <i class="fas fa-bookmark fa-sm"></i>&nbsp;&nbsp;Etiqueta
            </div>

            <div class="sub_menu_card_content_down">


                @can('admin.tags.index')
                    <div class="j-mt-10"></div>

                    <a href="{{ route('admin.tags.index') }}">
                        <div class="menu-card-content-text">
                            <i class="fas fa-list-ul"></i>&nbsp;&nbsp;Listar
                        </div>
                    </a>
                @endcan

                @can('admin.tags.create')
                    <div class="j-mt-10"></div>

                    <a href="{{ route('admin.tags.create') }}">
                        <div class="menu-card-content-text">
                            <i class="far fa-plus-square"></i>&nbsp;&nbsp;Crear
                        </div>
                    </a>
                @endcan
            </div>
        </div>

        <div class="sub_menu_card_content_list">


            <label for="categoria" class="ax-hidden"></label>
            <input type="checkbox" id="categoria">
            <div class="post_card_content_l_subtitle">
                <i class="fas fa-tags fa-sm"></i>&nbsp;&nbsp;Categoría
            </div>

            <div class="sub_menu_card_content_down">


                @can('admin.categories.index')
                    <div class="j-mt-10"></div>

                    <a href="{{ route('admin.categories.index') }}">
                        <div class="menu-card-content-text">
                            <i class="fas fa-list-ul"></i>&nbsp;&nbsp;Listar
                        </div>
                    </a>
                @endcan

                @can('admin.categories.index')
                    <div class="j-mt-10"></div>

                    <a href="{{ route('admin.categories.create') }}">
                        <div class="menu-card-content-text">
                            <i class="far fa-plus-square"></i>&nbsp;&nbsp;Crear
                        </div>
                    </a>
                @endcan
            </div>
        </div>
    </div>
</div>
