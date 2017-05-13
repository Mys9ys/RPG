<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RPG</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .btn-contener{
                position: absolute;
                width: 15%;
                height: 15%;
                border: 3px solid yellow;

            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body data-spy="scroll" data-target=".navbar-example">
    <div class="navbar navbar-default navbar-static-top">
            <ul class="top-right links">
                <a href="#about">О игре</a>
                <a href="#ratings">Рейтинги</a>
                <a href="#news">Новости</a>

        @if (Route::has('login'))
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Профиль</a>
                @else
                    <a href="{{ url('/login') }}">Войти</a>
                    <a href="{{ url('/register') }}">Регистрация</a>
                @endif
        @endif
            </ul>
    </div>
    <section class="main">
        <img src="../../public/img/mainBG.jpg" style="width: 100%">
    </section>
    <section id="about">
        <h2>Давным давно и бла-бла-бла</h2>
        <pre><p>
            Здесь произвольный текст. Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
            art party before they sold out master cleanse gluten free squid scenester freegan cosby sweater.
            Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.
            Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table
            VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh
            craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.
        </p>
            <p>
            Здесь произвольный текст. Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
            art party before they sold out master cleanse gluten free squid scenester freegan cosby sweater.
            Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.
            Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table
            VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh
            craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.
        </p>
            <p>
            Здесь произвольный текст. Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
            art party before they sold out master cleanse gluten free squid scenester freegan cosby sweater.
            Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.
            Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table
            VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh
            craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.
        </p>
            <p>
            Здесь произвольный текст. Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
            art party before they sold out master cleanse gluten free squid scenester freegan cosby sweater.
            Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.
            Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table
            VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh
            craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.
        </p>
            <p>
            Здесь произвольный текст. Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
            art party before they sold out master cleanse gluten free squid scenester freegan cosby sweater.
            Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.
            Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table
            VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh
            craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.
        </p>
    </section>
    <section id="ratings">
        <h2>Рейтинги бла бла бла</h2>
        <div class="content">
        <textarea style="width: 400px; height: 600px;"></textarea>
        </div>
    </section>
    <section id="news">
        <h2>Новости проекта</h2>
        <h5>Бла-бла-бла</h5>
    </section>
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    </body>
</html>
