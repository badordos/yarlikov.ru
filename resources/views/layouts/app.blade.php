<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title = isset($title) ? $title : env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Vladislav Yarlikov"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

@yield('css')

<!-- Modernizr JS -->
    <script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->

</head>
<body>
<nav id="colorlib-main-nav" role="navigation">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
    <div class="js-fullheight colorlib-table">
        <div class="colorlib-table-cell js-fullheight">
            {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
            {{--<div class="form-group">--}}
            {{--<input type="text" class="form-control" id="search" placeholder="Enter any key to search...">--}}
            {{--<button type="submit" class="btn btn-primary"><i class="icon-search3"></i></button>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li class="active"><a href="{{route('home')}}">Главная</a></li>
                        <li><a href="{{route('projects')}}">Web-сайты</a></li>
                        <li><a href="{{route('albums')}}">Фотопроекты</a></li>
                        <li><a href="{{route('blog')}}">Блог</a></li>
                        <li><a href="{{route('contact')}}">Контакты</a></li>
                        @if(auth()->check() && auth()->user()->is_admin == true)
                            <li><a href="{{route('admin.index')}}">Админ панель</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            @if(isset($favorites_projects) && !$favorites_projects->isEmpty())
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="head-title">Избранные проекты</h2>
                        @foreach($favorites_projects as $project)
                            <a href="{{$project->link}}" class="gallery text-center" target="_blank"
                               style="background-image: url({{$project->getFirstMedia('images')->getUrl()}});">
                                <span><i class="icon-search3"></i></span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>

@include('components.message')
@include('components.errors')

<div id="colorlib-page">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="colorlib-navbar-brand">
                        <a class="colorlib-logo" href="{{route('home')}}"><span>Yarlikov.ru</span></a>
                    </div>
                    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
                </div>
            </div>
        </div>
    </header>

    @yield('content')
    <footer>
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-pb-sm">
                        <div class="row">
                            <div class="col-md-10">
                                <h2>Связаться со мной</h2>
                                <p>Можете написать мне на почту, в социальные сети, мессенджеры или позвонить по
                                    телефону</p>
                                <p><a href="mailto:badordos@gmail.com">badordos@gmail.com</a></p>
                                <p><a href="tel:+79326161120">+7(932)61-61-120</a></p>
                                <p class="colorlib-social-icons">
                                    <a href="https://vk.com/v_ordoss"><i class="fab fa-vk"></i></a>
                                    <a href="http://t.me/v_ordoss"><i class="fab fa-telegram"></i></a>
                                    <a href="https://api.whatsapp.com/send?phone=79326161120"><i
                                            class="fab fa-whatsapp"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-pb-sm">
                        <h2>Ссылки</h2>
                        <div class="f-entry">
                            <div class="desc">
                                <h3><a href="https://github.com/badordos">GitHub</a></h3>
                            </div>
                        </div>
                        <div class="f-entry">
                            <div class="desc">
                                <h3><a href="https://www.fl.ru/users/badordos/">FreeLance</a></h3>
                            </div>
                        </div>
                        <div class="f-entry">
                            <div class="desc">
                                <h3><a href="https://ekaterinburg.hh.ru/resume/8c750d9eff03eacf880039ed1f6847314f6543">HeadHunter</a>
                                </h3>
                            </div>
                        </div>
                        <div class="f-entry">
                            <div class="desc">
                                <h3><a href="https://www.linkedin.com/in/yarlikov">LinkedIn</a></h3>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 col-pb-sm">
                        <h2>Подписка</h2>
                        <p>Подписавшись на эту рассылку, вы один раз в начале месяца будет получать подборку появившихся
                            на моем портале материалов. Проекты, альбомы с фотографиями, записи в блоге.</p>
                        <div class="subscribe text-center">
                            <div class="form-group">
                                <form method="post" action="{{route('subscribe')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="email" class="form-control text-center"
                                           placeholder="Введите email-адрес" name="email" required>
                                    <input type="submit" value="Подписаться" class="btn btn-primary btn-custom">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<!-- Owl Carousel -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/magnific-popup-options.js')}}"></script>

<!-- Main JS (Do not remove) -->
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
@yield('js')
</body>
</html>
