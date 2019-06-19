<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Job</title>


    <meta name="keywords" content="{{$data['header'][0]->keywords}}">
    <meta name="description" content="{{$data['header'][0]->description}}">

    <link rel="shortcut icon" type="image/svg" href="img/FavIcon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="{{ URL::asset('js/jquery3_3_1.js')}}"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('fonts/AvenirNextCyr/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('plugins/slick-slider/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fonts/AvenirNext/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('plugins/slick-slider/slick-theme.css') }} ">
    <link rel="stylesheet" href="{{ URL::asset('fonts/icon/style.css') }}">
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
                        <i class="icon-menu-options"></i>
                        
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                            @foreach($data['category'] as $category) 
                                @if($category->type != 'type3')
                                 <li class="nav-item {{ Route::currentRouteName() == $category->link ? 'active' : ''}}">

                                    @if($category->link == 'home')
                                    <a class="nav-link" href="/">
                                    @elseif($category->type == 'type2')
                                    <a class="nav-link" href="{{$category->link}}">
                                    @else
                                    <a class="nav-link" href="/{{$category->link}}">
                                    @endif
                                    {!!$category->{'title_' . $data['locale']} !!} {!! Route::currentRouteName() == $category->link ? '<span class="sr-only">(current)</span>' : ''!!}</a>
                                @else
                                <li class="nav-item dropdown {{ Route::currentRouteName() == $category->link ? 'active' : ''}} ">
                                    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       {!!$category->{'title_' . $data['locale']} !!}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach($data['subcategory'] as $subcategory)
                                        @if($subcategory->category_id == $category->category_id)
                                            @if($subcategory->type == "type2")
                                                <a class="dropdown-item" href="/{{$subcategory->link}}?position={{$subcategory->subcategory_id}}">{{$subcategory->title . '_' . $data['locale']}}</a>
                                            @else
                                                <a class="dropdown-item" href="{{$subcategory->link}}">
                                                    {!! $subcategory->{'title_' . $data['locale']} !!}
                                                </a>
                                            @endif
                                        @endif
                                    @endforeach
                                    </div>
                                </li>
                                @endif
                                     
                                </li>
                            @endforeach

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
                                @for($i = 0; $i < count($data['left_footer']); $i++)
                                    @if(empty($data['left_footer'][$i]))
                                        <p></p>
                                    @else
                                        <li class="">
                                            <div class="circle"><img src="{{ URL::asset($data['left_footer'][$i]->img_path) }}"></div>
                                            @if(empty($data['left_footer'][$i]->link))
                                                <p class="content">{{$data['left_footer'][$i]->{'content_' . $data['locale']} }}</p>
                                            @else
                                                <a href="{{ $data['left_footer'][$i]->link }}">{{$data['left_footer'][$i]->{'content_' . $data['locale']} }}</a>
                                            @endif
                                        </li>
                                    @endif
                                @endfor
                            </ul>
                        </div>
                        <div class="col-12 col-md-5 pl-2 col-xl-3 ">
                            <ul class="footer_right ">
                                @for($i = 0; $i < count($data['about_footer']) && $i < 1; $i++)
                                    @if(empty($data['about_footer'][$i]))
                                        <p></p>
                                    @else
                                        <li class="footer_right__aboutUs">
                                            <a href="{{ $data['about_footer'][$i]->link }}" >
                                        <span class="circle">
                                            <img src="{{ URL::asset('images/info-sign.svg')}}">
                                        </span>
                                                <div>Про наш відділ</div>
                                            </a>
                                        </li>
                                    @endif
                                @endfor

                                <li class="footer_right__socialNetworks">
                                    <p>Слідкуйте за нами у соціальних мережах:</p>
                                    <ul class="iconNetwork">
                                        {{--@for($i = 0; $i < count($data['right_footer']) && $i < 7; $i++)--}}
                                        @foreach($data['right_footer'] as $social_hover)
                                            <li class=""><a href="{{ $social_hover->link }}"
                                                            class="circle {{str_replace(' ','_',$social_hover->name )}}"><img src="{{ URL::asset($social_hover->img_path) }}"></a></li>

                                        @endforeach
                                        {{--@endfor--}}
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        @show
    </div>

    <style>
        {{--        @for($i = 0; $i < count($data['right_footer']) && $i < 7; $i++)--}}
        @foreach($data['right_footer'] as $social_hover)
              .{{str_replace(' ','_',$social_hover->name )}}:hover{
            background:{{$social_hover->color_bg}} ;
        }
        @endforeach
        {{--@endfor--}}
    </style>


    <script src="js/ajax1_14_7.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('plugins/slick-slider/slick.min.js')}}"></script>
    <script src="{{ URL::asset('js/main.js')}}"></script>

    
</body>

</html>

