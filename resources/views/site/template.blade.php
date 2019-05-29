<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Job</title>

    <link rel="shortcut icon" type="image/svg" href="img/FavIcon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="{{ URL::asset('js/jquery3_3_1.js')}}"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ URL::asset('plugins/slick-slider/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('plugins/slick-slider/slick-theme.css') }} ">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/media.css') }}">
</head>

<body id="body">
    <div class="wrapper">
        <div class="wrapper-content">
            @section('menu')
                <div id="menu_header" class="fixed-top background-fixed  menu__navigation">
                    <nav class="navbar navbar-expand-lg  navbar-light align-items-xl-stretch container  fixed-top  ">
                        <a class="navbar-brand"><img  src="{{ URL::asset('images/logo-sumdu.svg')}}" alt="logo"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <img class="navbar-toggler-icon" src="{{URL::asset('images/menu-options.svg')}}" alt="menu">
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item {{ Route::currentRouteName() =='home' ? 'active' : ''}}">
                                    <!-- {{ Route::currentRouteName() == '' ? 'active' : ''}} -->
                                    <a class="nav-link" href="/">Головна {!! Route::currentRouteName() == 'home' ? '<span class="sr-only">(current)</span>' : ''!!}</a>
                                     
                                </li>
                                <li class="nav-item {{ Route::currentRouteName() =='news' ? 'active' : ''}}">
                                    <a class="nav-link" href="/news">
                                        Новини 
                                        {!! Route::currentRouteName() == 'news' ? '<span class="sr-only">(current)</span>' : ''!!}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Працевлаштування та практика</a>
                                </li>
                                <li class="nav-item dropdown {{ Route::currentRouteName() =='documents' ? 'active' : ''}} ">
                                    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Документи

                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="/documents?position=1">Нормативні</a>
                                        <a class="dropdown-item" href="/documents?position=2">Рада роботодавців</a>
                                        <a class="dropdown-item" href="/documents?position=3">Інші</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Відомі випускники</a>
                                </li>
                                <li class="nav-item dropdown language-full ">
                                    <a class="nav-link dropdown-toggle  " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ URL::asset('images/ukraine.svg')}}">
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#"><img src="{{ URL::asset('images/united-kingdom.svg')}}"></a>
                                        <a class="dropdown-item" href="#"><img src="{{ URL::asset('images/russia.svg')}}"></a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown language-media">
                                    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Мови <img class="language-media__select" src="{{ URL::asset('images/ukraine.svg')}}">
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#"><img src="{{ URL::asset('images/united-kingdom.svg')}}"></a>
                                        <a class="dropdown-item" href="#"><img src="{{ URL::asset('images/russia.svg')}}"></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            @show
            @section('content')
               
            @show  
        </div>
         
        
        
        @section('footer')
            <span class="scroll_yak">
                <a id="up_scroll" href="#body">
                    <img src="{{ URL::asset('images/up-arrow.svg')}}" alt="">
                </a>
            </span>
            <footer>
                <div class="container">
                    <div class=" row justify-content-between">
                        <div class="col-12 col-md-6">
                            <ul class="footer_left ">
                                <li class="footer_left__location">
                                    <div class="circle"><img src="{{ URL::asset('images/location.svg')}}"></div>
                                    <p>Україна, м.Суми, вул. Римського-Корсакова, 2, Сумський державний університет, Головний корпус, каб. Г-1012</p>
                                </li>
                                <li class="footer_left__telNumber">
                                    <div class="circle"><img src="{{ URL::asset('images/phone-receiver.svg')}}"></div>
                                    <p>+38(0542)687-851</p>
                                </li>
                                <li class="footer_left__email">
                                    <div class="circle"><img src="{{ URL::asset('images/envelope.svg')}}"></div>
                                    <a href="#">info@job.sumdu.edu.ua</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-5 pl-2 col-xl-3 ">
                            <ul class="footer_right ">
                                <li class="footer_right__aboutUs">
                                    <a href="#" >
                                        <span class="circle">
                                            <img src="{{ URL::asset('images/info-sign.svg')}}">
                                        </span>
                                        <div>Про наш відділ</div>
                                    </a>
                                </li>
                                <li class="footer_right__socialNetworks">
                                    <p>Слідкуйте за нами у соціальних мережах:</p>
                                    <ul class="iconNetwork">
                                        <li class="facebook"><a href="#" class="circle"><img src="{{ URL::asset('images/facebook-logo.svg')}}"></a></li>
                                        <li class="instagram"><a href="#" class="circle"><img src="{{ URL::asset('images/instagram.svg')}}"></a></li>
                                        <li class="telegram"><a href="#" class="circle"><img src="{{ URL::asset('images/telegram-logo.svg')}}"></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </footer>
        @show
    </div>
    
    


    <script src="js/ajax1_14_7.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('plugins/slick-slider/slick.min.js')}}"></script>
    <script src="{{ URL::asset('js/main.js')}}"></script>

    
</body>

</html>

