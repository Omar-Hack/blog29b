@extends('Public.Partial.Master')

@section('title', 'Registrate')

@section('home', 'Inicio')
@section('theme', 'Registrate')
@section('description', 'Registrate para interatuar en la pagina')
@section('image', 'https://casadelaculturadecordoba.com/img/logo.png')
@section('type', 'null')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-12 col-sm-11 col-md-5 col-lg-4 col-xl-3 col-xxl-3">

                <div class="post_card j-mt-40">

                    <form method="post" action="{{ route('public.register.index') }}">
                        @csrf

                        <div class="blog_card_content_center">

                            <div class="row">
                                @if (Session::has('error'))
                                    <div class="post_card_content_o_date">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>

                            <div class="table_card_form_group">
                                <div class="post_card_content_c_title">
                                    <i class="fas fa-user"></i>&nbsp;
                                    <label>Usuario</label>
                                    <div class="j-mt-5"></div>
                                </div>
                                @if ($errors->has('name'))
                                    <div class="post_card_content_o_date">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <input class="blog_content_comment_input" type="text" name="name" placeholder=" laska ..."
                                    value="{{ old('name') }}">
                            </div>

                            <div class="table_card_form_group">
                                <div class="post_card_content_c_title">
                                    <i class="fas fa-envelope"></i>&nbsp;
                                    <label>Correo</label>
                                    <div class="j-mt-5"></div>
                                </div>
                                @if ($errors->has('email'))
                                    <div class="post_card_content_o_date">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                                <input class="blog_content_comment_input" type="text" name="email"
                                    placeholder=" laska@gmail.com ..." value="{{ old('email') }}">
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
                                <input class="blog_content_comment_input" type="password" name="password"
                                    placeholder=" ********* ..." value="{{ old('password') }}">
                            </div>
                        </div>

                        <div class="footer-line-m"></div>

                        <div class="post_card_content_options">
                            <div class="row">
                                <button class="post_card_content_o_title">
                                    Crear Cuenta&nbsp;
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
