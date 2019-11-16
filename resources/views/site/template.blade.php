<!DOCTYPE html>
<html lang="ua">

<head>
    <meta charset="UTF-8">
    <title>Job.SumDU</title>

    {{--@php $routename = explode('.',Route::currentRouteName())[0] @endphp--}}
    {{--@php $routenames =[--}}
        {{--'home',--}}
        {{--'news',--}}
        {{--'pracevlashtuvannya-praktika',--}}
        {{--'document',--}}
        {{--'announcements',--}}
    {{--]  @endphp--}}

    <meta name="keywords" content="
    {{--{{$routename}}--}}

        {{--@for($i=0;$i<count($routenames);$i++)--}}
            {{--@if($routename == $routenames[$i])--}}
                {{--{{$data['header'][0]}}--}}
            {{--@endif--}}
        {{--@endfor--}}

        ">
    <meta name="description" content="{{$data['header'][0]->description}}">
    <link rel="shortcut icon" href="{{ URL::asset('images/favicon.ico') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="{{ URL::asset('js/jquery3_3_1.js')}}"></script>

    <link rel="stylesheet" href="{{ URL::asset('plugins/bootstrap4.3.1/css/bootstrap.min.css')}}">
    
        
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
                @auth
                    <nav class="menu__admin">
                        <div class="row justify-content-end align-items-center mr-4">
                            <a class="menu__admin-user d-flex align-items-center">
                                <i class="icon-user mr-3"></i>
                                <span>{{Auth::user()->name}}</span>
                            </a>
                            <a href="{{  route('ad_header.header.index')}}" class="menu__admin-edit d-flex align-items-center">
                                <i class="icon-edit mr-3"></i>
                                <span>Редагувати</span>
                            </a>
                            <a href="{{ route('logout') }}" class="menu__admin-exit d-flex align-items-center">
                                <i class="icon-exit mr-3"></i>
                                <span>Вийти із редагування</span>
                            </a>
                        </div>
                    </nav>
                @endauth
                <div id="menu_header" class="fixed-top background-fixed  menu__navigation">
                    <nav class="navbar navbar-expand-lg  navbar-light align-items-xl-stretch container  fixed-top  ">
                        <a target="_blank" href="https://www.sumdu.edu.ua" class="navbar-brand"><img  src="{{ URL::asset('images/logo-sumdu.svg')}}" alt="logo"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="icon-menu-options"></i>
                        
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                            @foreach($data['category'] as $category)

                                @if($category->type != 'type3' && $category->link != 'discussion-educational-programs' )
                                 <li class="nav-item {{ Route::currentRouteName() == $category->link ? 'active' : ''}}">

                                    @if($category->link == 'home')
                                    <a class="nav-link" href="/">
                                    @elseif($category->type == 'type2')
                                    <a class="nav-link" href="{{$category->link}}">
                                    @elseif($category->type == 'type1')
                                    <a class="nav-link" href="/{{$category->link}}">
                                    @endif
                                    {!! !empty($category->{'title_' . $data['locale']}) ? $category->{'title_' . $data['locale']} : $category-> title_ua !!} {!! Route::currentRouteName() == $category->link ? '<span class="sr-only">(current)</span>' : ''!!}</a>
                                @elseif($category->type == 'type3')
                                <li class="nav-item dropdown {{ Route::currentRouteName() == $category->link ? 'active' : ''}} ">
                                    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       {!! !empty($category->{'title_' . $data['locale']}) ? $category->{'title_' . $data['locale']} : $category-> title_ua !!}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach($data['subcategory'] as $subcategory)
                                        @if($subcategory->category_id == $category->category_id)
                                            @if($subcategory->type == "type2")
                                                <a class="dropdown-item" href="/{{$subcategory->link}}?position={{$subcategory->subcategory_id}}">{{$subcategory->title . '_' . $data['locale']}}</a>
                                            @else
                                                <a class="dropdown-item" href="{{$subcategory->link}}">
                                                    {!! !empty($subcategory->{'title_' . $data['locale']}) ? $subcategory->{'title_' . $data['locale']} : $subcategory-> title_ua !!}
                                                </a>
                                            @endif
                                        @endif
                                    @endforeach
                                    </div>
                                </li>
                                @endif

                                </li>
                            @endforeach

                                <li class="nav-item dropdown language-full d-none" >
                                    <select class="text-uppercase" id="language-choice" >
                                        @foreach(['ua', 'ru', 'us'] as $locale)
                                            <option  value="{{$locale}}" @if($locale == $data['locale']) selected @endif>@if($locale === 'us') en @else {{$locale}} @endif</option>
                                        @endforeach
                                    </select>
                                </li>
                                {{--<li class="nav-item dropdown language-media">--}}
                                    {{--<a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                        {{--Мови <img class="language-media__select" src="{{ URL::asset('images/ukraine.svg')}}">--}}
                                    {{--</a>--}}
                                    {{--<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
                                        {{--<a class="dropdown-item" href="#"><img src="{{ URL::asset('images/united-kingdom.svg')}}"></a>--}}
                                        {{--<a class="dropdown-item" href="#"><img src="{{ URL::asset('images/russia.svg')}}"></a>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
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
                                                <p class="white-content">{!! !empty($data['left_footer'][$i]->{'content_' . $data['locale']}) ? $data['left_footer'][$i]->{'content_' . $data['locale']} : $data['left_footer'][$i]-> content_ua !!}</p>
                                            @else
                                                <a href="{{ $data['left_footer'][$i]->link }}">{!! !empty($data['left_footer'][$i]->{'content_' . $data['locale']}) ? $data['left_footer'][$i]->{'content_' . $data['locale']} : $data['left_footer'][$i]-> content_ua !!}</a>
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
                                        @foreach($data['right_footer'] as $social_hover)
                                            <li class=""><a href="{{ $social_hover->link }}"
                                                            class="circle {{str_replace(' ','_',$social_hover->name )}}"><img src="{{ URL::asset($social_hover->img_path) }}"></a></li>

                                        @endforeach
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
        @foreach($data['right_footer'] as $social_hover)
              .{{str_replace(' ','_',$social_hover->name )}}:hover{
            background:{{$social_hover->color_bg}} ;
        }
        @endforeach
    </style>

    <script src="{{ URL::asset('plugins/bootstrap4.3.1/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('plugins/slick-slider/slick.min.js')}}"></script>
    <script src="{{ URL::asset('js/main.js')}}"></script>
    <script src="{{ URL::asset('js/changeLocale.js')}}"></script>
</body>

</html>
