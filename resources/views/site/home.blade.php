@extends('site.template')
@section('menu')
    @parent
@endsection
@section('content')
        <header class="position-relative">
            <figure class="banner"><img src="{{ URL::asset($data['header'][0]->img_path)  }}"></figure>
            <figure class="filter"></figure>
            <div class="header-title_block">
                <a href="{{$data['header'][0]->link}}" class="blueLine">
                    <h1 class="text-uppercase">
                        {!! $data['header'][0]->title !!}
                    </h1>
                </a>
                <div class="header__text col-xl-10 mx-auto">
                    <p> {!! $data['header'][0]->content !!}</p>
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
                            {!! $data['internship'][0]->title !!}
                        </p>
                    </div>
                </div>
                <div class="row mt-md-5 mt-sm-1 justify-content-center">
                    <div class="col-12 col-md-10">
                        <p class="practice__subtitle">{!! $data['internship'][0]->content !!}</p>
                    </div>
                </div>
                <div class="row mt-md-5 mt-4">
                    @foreach($data['practice_intership_card'] as $card)
                        <div class="col-md-12 col-lg-4 card  mb-4 ">
                            <a href="{{$card->card_link}}" class="practice__item practice__card p-3 pb-4 ">
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
                            <div class="card-body d-flex flex-column justify-content-between ">
                                <div>
                                    <div class="card_img">
                                        <img src="{{ URL::asset($data['announcements'][$i]->img_path) }}" alt="" class="card-img-top preview__image">
                                    </div>
                                    <h5 class="card-title">{{$data['announcements'][$i]->title}}</h5>
                                    <p class="card-description">{{$data['announcements'][$i]->short_description}}</p>
                                </div>                           
                              
                                <div>
                                    <div class="card-location">
                                        <i class="icon-location"></i>
                                        {{$data['announcements'][$i]->short_location}}

                                    </div>
                                    <ul class="card-date">
                                        <li class="card-date-item">
                                            <i class="icon-clock-circular-outline"></i>
                                            {{ date("H:i", strtotime($data['announcements'][$i]->date)) }}
                                        </li>
                                        <li class="card-date-item">
                                            <i class="icon-calendar"></i>
                                            {{ date("d.m.Y", strtotime($data['announcements'][$i]->date)) }} 
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('announcement', array('id' => $data['announcements'][$i]->inner_news_id, 'title' => $data['announcements'][$i]->trans_title)) }}" class="btn btn-outline-primary preview__button ">Детальніше</a>
                            </div>


                        </div>
                    @endfor
                </div>

     

                <div class="row  preview__last-row">
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
        <div class="news_noanimation">
            <div class="col preview__title">
                <h3>Новини</h3>
            </div>
        </div>
        <div class="container">
            <div class="news mt-md-5 mt-sm-0">
            @if(count($data['news'])!=0)
            
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        <div class="card news__one">
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
                                            <p class="news__date">Дата публікації: {{ date("d-m-Y H:i", strtotime($data['news'][0]->date)) }}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-end">

                    @for($i = 1; $i < (count($data['news'])) && $i < 5; $i++)

                    <div class="col-md-12 col-lg-6 mt-4 ">
                        <div class="card news__one">
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
                                                Дата публікації: {{ date("d-m-Y H:i", strtotime($data['news'][$i]->date)) }}
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

                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <a href="/news" class="btn btn-outline-primary news__button ">Більше новин</a>
                    </div>
                </div>
            </div>
        </div>
        
       
        <div class="slider mt-5 my-4">
            <section class="row autoplay slider__items ">
                @foreach($data['slider'] as $slider)
                <div class="col brand-slider_item">
                    <a class="brand-slider_link" href="{{$slider->link}}"> <img src="{{ URL::asset($slider->img_path)}}" alt="{{$slider->name_brand}}" class="slider__image img-fluid"></a>
                </div>
                @endforeach
            </section>
        </div>
     

@endsection

@section('footer')
	@parent
@endsection