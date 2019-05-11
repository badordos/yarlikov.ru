@extends('layouts.app')

@section('content')
    <div id="colorlib-about">
        <div class="container">
            <div class="row text-center">
                <h2 class="bold">Обо мне</h2>
            </div>
            <div class="row">
                <div class="col-md-5 animate-box">
                    <div class="owl-carousel3">
                        <div class="item">
                            <img class="img-responsive about-img" src="/img/port1.jpg"
                                 alt="html5 bootstrap template by colorlib.com">
                        </div>
                        <div class="item">
                            <img class="img-responsive about-img" src="/img/port2.jpg"
                                 alt="html5 bootstrap template by colorlib.com">
                        </div>
                        <div class="item">
                            <img class="img-responsive about-img" src="/img/port3.jpg"
                                 alt="html5 bootstrap template by colorlib.com">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-push-1 animate-box">
                    <div class="about-desc">
                        <div class="owl-carousel3">
                            <div class="item">
                                <h2><span>Владислав Ярлыков</span></h2>
                            </div>
                            <div class="item">
                                <h2><span>Web-Разработчик</span></h2>
                            </div>
                            <div class="item">
                                <h2><span>Фотограф</span></h2>
                            </div>
                        </div>
                        <div class="desc">
                            <div class="rotate">
                                <h2 class="heading">Обо мне</h2>
                            </div>
                            <p>В настоящий момент - основным родом моей деятельности является разработка <a
                                    href="{{route('projects')}}">web-сайтов</a>:
                                корпоративных порталов, CRM/ERP-систем, интернет-магазинов.
                            </p>
                            <p>Еще я люблю заниматься <a href="{{route('albums')}}">фотографией</a>: делаю ради интереса и на заказ
                                фотосессии и ретушь.
                            </p>
                            <p>И пишу небольшой <a href="{{route('blog')}}">блог</a> о программировании и разработке.
                            </p>
                            <p>Связаться со мной:
                            </p>
                            <p class="colorlib-social-icons">
                                <a href="https://vk.com/v_ordoss"><i class="fab fa-vk"></i></a>
                                <a href="http://t.me/v_ordoss"><i class="fab fa-telegram"></i></a>
                                <a href="https://api.whatsapp.com/send?phone=79326161120"><i
                                        class="fab fa-whatsapp"></i></a>
                            </p>
                            <p><a href="tel:+79326161120" class="btn btn-primary btn-outline">Позвонить мне</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="colorlib-services">
        <div class="container">
            <div class="row text-center">
                <h2 class="bold">Навыки</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="services-flex">
                        <div class="one-third">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-0 animate-box intro-heading">
                                    <span>Мои навыки</span>
                                    <h2>Немного о моих умениях</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="rotate">
                                        <h2 class="heading">Навыки</h2>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="services animate-box">
                                        <h3>Back-end разработка</h3>
                                        <ul>
                                            <li>PHP</li>
                                            <li>Laravel</li>
                                            <li>NodeJS</li>
                                            <li>Python</li>
                                        </ul>
                                    </div>
                                    <div class="services animate-box">
                                        <h3>Front-End разработка</h3>
                                        <ul>
                                            <li>HTML / CSS</li>
                                            <li>JavaScript</li>
                                            <li>jQuery</li>
                                            <li>VueJS</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="one-forth services-img"
                             style="background-image: url({{asset('img/dev.jpeg')}});">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!$projects->isEmpty())
        <div id="colorlib-work">
            <div class="container">
                <div class="row text-center">
                    <h2 class="bold">Приложения</h2>
                </div>
                <div class="row">
                    <div class="col-md-12 col-md-offset-0 text-center animate-box intro-heading">
                        <span>Портфолио</span>
                        <h2>Web-сайты</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="rotate">
                            <h2 class="heading">Портфолио</h2>
                        </div>
                    </div>
                </div>
                @foreach($projects as $project)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="work-entry animate-box">
                                <a href="{{$project->link}}" target="_blank" class="work-img"
                                   style="background-image: url({{$project->getFirstMedia('images')->getUrl()}});">
                                    <div class="display-t">
                                        <div class="work-name">
                                            <h2>{{$project->title}}</h2>
                                        </div>
                                    </div>
                                </a>
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="desc">
                                        {!!  $project->desc !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <h3 class="text-center"><a href="{{route('projects')}}">Посмотреть все проекты</a></h3>
            </div>
        </div>
    @endif

    @if(!$albums->isEmpty())
        <div id="colorlib-blog">
            <div class="container">
                <div class="row text-center">
                    <h2 class="bold">Фотопроекты</h2>
                </div>
                <div class="row">
                    <div class="col-md-12 col-md-offset-0 text-center animate-box intro-heading">
                        <span>Портфолио</span>
                        <h2>Последние фотосессии</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="rotate">
                            <h2 class="heading">Портфолио</h2>
                        </div>
                    </div>
                </div>
                <div class="row animate-box">
                    <div class="owl-carousel1">
                        @foreach($albums as $album)
                            <div class="item">
                                <div class="col-md-12">
                                    <div class="article">
                                        <a href="{{route('album.frontend.show', $album)}}" class="blog-img">
                                            <img class="img-responsive"
                                                 src="{{$album->getFirstMedia('main_image')->getUrl('small')}}"
                                                 alt="{{$album->desc}}">
                                            <div class="overlay"></div>
                                            <div class="link">
                                                <h2 class="read">Посмотреть</h2>
                                            </div>
                                        </a>
                                        <div class="desc">
                                        <span
                                            class="meta">{{\Carbon\Carbon::parse($album->date)->format('d.m.Y')}}</span>
                                            <h2><a href="#">{{$album->title}}</a></h2>
                                            <p>{{$album->desc}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <h3 class="text-center"><a href="{{route('albums')}}">Посмотреть все фотопроекты</a></h3>
        </div>
    @endif

    @if(!$articles->isEmpty())
        <div id="colorlib-testimony">
            <div class="container">
                <div class="row text-center">
                    <h2 class="bold">Блог</h2>
                </div>
                <div class="row">
                    <div class="col-md-12 col-md-offset-0 text-center animate-box intro-heading">
                        <span>Блог</span>
                        <h2>Записи и статьи</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="rotate">
                            <h2 class="heading">Блог</h2>
                        </div>
                    </div>
                </div>
                <div class="row animate-box">
                    <div class="owl-carousel">
                        @foreach($articles as $article)
                            <div class="item">
                                <div class="col-md-12 text-center">
                                    <div class="testimony">
                                        <blockquote>
                                            <h2>
                                                <a href="{{route('article.frontend.show', $article)}}">{{$article->title}}</a>
                                                <hr>
                                                <p>{{$article->short_desc}}</p>
                                            </h2>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
            <h3 class="text-center"><a href="{{route('blog')}}">Посмотреть все записи</a></h3>
        </div>
    @endif
@endsection
