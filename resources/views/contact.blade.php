@extends('layouts.app')

@section('content')
    <div id="colorlib-contact">
        <div class="container">
            <div class="row text-center">
                <h2 class="bold">Контакты</h2>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center animate-box intro-heading">
                    <span>Обратная связь</span>
                    <h2>Контакты</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="rotate">
                        <h2 class="heading">Контакты</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <div class="row">
                        <div class="col-md-4 animate-box">
                            <h3>Мое текущее расположение</h3>
                            <ul class="contact-info">
                                <li><span><i class="icon-map5"></i></span>Россия, Свердловская область, г. Екатеринбург</li>
                                <li><span><i class="icon-phone4"></i></span><a href="tel:+79326161120">+7(932)61-61-120</a></li>
                                <li><span><i class="icon-envelope2"></i></span><a href="mailto:badordos@gmail.com">badordos@gmail.com</a></li>
                                <li><span><i class="icon-globe3"></i></span><p class="colorlib-social-icons">
                                        <a href="https://vk.com/v_ordoss"><i class="fab fa-vk"></i></a>
                                        <a href="http://t.me/v_ordoss"><i class="fab fa-telegram"></i></a>
                                        <a href="https://api.whatsapp.com/send?phone=79326161120"><i
                                                class="fab fa-whatsapp"></i></a>
                                    </p></li>
                            </ul>
                        </div>
                        <div class="col-md-7 col-md-push-1 animate-box">
                            <form method="post" action="{{route('callback')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" cols="30" rows="7" placeholder="Сообщение" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Ваше имя" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Ваш email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! app('captcha')->display() !!}
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" value="Отправить сообщение" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
