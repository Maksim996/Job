@extends('site.template')

@section('menu')
@parent
@endsection
@section('content')
        <header class="position-relative">
            <figure class="banner"><img src="{{ URL::asset('images/people-coffee-tea-meeting.png') }}"></figure>
            <figure class="filter"></figure>
            <div class="header-title_block">
                <a href="admin/news" class="blueLine">
                    <h1>
                        ВІДДІЛ ПРАКТИКИ ТА ІНТЕГРАЦІЙНИХ<br> ЗВ'ЯЗКІВ ІЗ ЗАМОВНИКАМИ КАДРІВ
                    </h1>
                </a>
                <div class="header__text col-xl-10 mx-auto">
                    <p>На нашому сайті ви можете дізнатися більше про види практики,
                        зайти усі необхідні документи, що потрібні для оформлення практики, а також знайти роботу.</p>
                </div>
            </div>
            <span class="scroll_yak">
            	<a class="down-arrow" href="#next_content"><img src="{{ URL::asset('images/downArrow.svg') }}"></a>
            </span>
            
        </header>

        <div class="container" id="next_content">
            <div class="practice">
                <div class="row mt-3">
                    <div class="col-12">
                        <p class="practice__title">
                            Отже, що ж таке ПРАКТИКА та СТАЖУВАННЯ ?
                        </p>
                    </div>
                </div>
                <div class="row mt-md-5 mt-sm-1">
                    <div class="col-10 offset-1">
                        <p class="practice__subtitle">Якщо ПРАКТИКА – це обов’язкова складова навчального процесу, то СТАЖУВАННЯ передбачає отримання практичного досвіду у вільний від навчання час. В обох випадках Ви отримаєте професійні навички та можливість проявити власні якості – ініціативність, креативність, наполегливість.</p>
                    </div>
                </div>
                <div class="row mt-md-5 mt-sm-2">
                    @foreach($data['practice_intership_card'] as $card)
                        <div class="col-md-12 col-lg-4 card  mb-4 ">
                            <a href="#" class="practice__item practice__card p-3 pb-4 ">
                                <img src="{{ URL::asset($card->img_path) }}" alt="{{$card->card_title}}" class="rounded-circle practice__image mx-auto ">
                                <div class="card-body mt-4">
                                    <h5 class="card-title practice__topic">{{$card->card_title}}</h5>
                                    <p class="card-text practice__text">{{$card->card_description}}</p>
                                </div>
                            </a>
                        </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
   
        <div class="container">
            <div class="preview mt-3">
                <div class="row">
                    <div class="col preview__title">
                        <h3>Найближчим часом</h3>
                    </div>
                </div>
                

                <div class="anonc_block ">
                    @for($i = 0; $i < count($data['announcements']) && $i < 4; $i++)
                        <div class=" col-md-7 preview__card ">
                            <div class="preview__item w-100">
                                <div class="card_img">
                                    <img src="{{ URL::asset($data['announcements'][$i]->img_path) }}" alt="" class="card-img-top preview__image">
                                    
                                </div>

                                <div class="card-body preview__body">
                                    <h5 class="card-text preview__text">{{$data['announcements'][$i]->title}}</h5>
                                    <div>
                                        <div class="card-text">
                                            {{$data['announcements'][$i]->short_location}}
                                        </div>
                                        <div class="card-text">
                                            {{$data['announcements'][$i]->date}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-lg-none p-0 m-0 dropdown-divider"></div>
                            <div class="preview__descr ">
                                <div class="card-body text-center px-2 py-0">
                                    <p class="card-text text-left">{{$data['announcements'][$i]->short_description}}</p>
                                    <a href="{{ route('announcement', array('id' => $data['announcements'][$i]->inner_news_id, 'title' => $data['announcements'][$i]->trans_title)) }}" class="btn btn-outline-primary preview__button mb-2">Детальніше</a>

                                </div>
                            </div>
                        </div>




                    @endfor
                </div>

                <div class="row mt-5 preview__last-row">
                    <div class="col-12 text-center">
                        <a href="/announcements" class="btn btn-outline-primary preview__button-more preview__button-not-hover">Більше анонсів</a>
                    </div>
                </div>
            </div>
        </div>
        <div  id='tutu'>
            <div class="container">
                <div class="caption mt-5">
                    <div class="row ">
                        <div class="col-lg-12 caption__display ">
                            <p class="caption__last caption__all">ОСТАННІ</p>
                            <p class="caption__news caption__all">НОВИНИ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row news_noanimation mt-5">
            <div class="col preview__title">
                <h3>Новини</h3>
            </div>
        </div>
        <div class="container">
            <div class="news mt-md-5 mt-sm-0">
            @if(count($data['news'])!=0)
            
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="card-title news__title">{{$data['news'][0]->title}}</h5>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset($data['news'][0]->img_path) }}" class="card-img mt-1" alt="">
                                </div>
                                <div class="col-md-8 pl-md-3">
                                    <div class="card-body">
                                        <p class="card-text news__text  ">  
                                            {{$data['news'][0]->short_description}}
                                        </p>
                                        <div>
                                            <a href="{{ route('new', array('id' => $data['news'][0]->inner_news_id, 'title' => $data['news'][0]->trans_title)) }}" class="card-link news__link">Детальніше...</a>
                                            <p class="news__date">Дата публікації: {{$data['news'][0]->date}}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-end">

                    @for($i = 1; $i < (count($data['news'])) && $i < 5; $i++)

                    <div class="col-md-12 col-lg-6 mt-4">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="card-title news__title-item">{{$data['news'][$i]->title}}</h5>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset($data['news'][$i]->img_path) }}" class="card-img mt-1" alt="">
                                </div>
                                <div class="col-md-8   pl-md-3">
                                    <div class="card-body">
                                        <p class="card-text news__text-item">
                                            {{$data['news'][$i]->short_description}}
                                        </p>
                                        <div>
                                            <a href="{{ route('new', array('id' => $data['news'][$i]->inner_news_id, 'title' => $data['news'][$i]->trans_title)) }}" class="card-link news__link-item">Детальніше...</a>
                                            <p class="news__date-item">
                                                Дата публікації: {{$data['news'][$i]->date}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            @endif

                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <a href="/news" class="btn btn-outline-primary news__button ">Більше новин</a>
                    </div>
                </div>
            </div>
        </div>
        
       
        <div class="slider my-5">
            <section class="row autoplay slider__items ">
                @foreach($data['slider'] as $slider)
                <div class="col brand-slider_item">
                    <a class="brand-slider_link" href="{{$slider->link}}"> <img src="{{ URL::asset($slider->img_path)}}" alt="placeholder+image" class="slider__image img-fluid"></a>
                </div>
                @endforeach
            </section>
        </div>
     

@endsection

@section('footer')
	@parent
@endsection