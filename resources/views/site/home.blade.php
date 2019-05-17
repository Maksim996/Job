@extends('site.template')

@section('menu')
@parent
@endsection
@section('content')   
        <header class="container position-relative">
            <figure class="banner"><img src="{{ URL::asset('images/people-coffee-tea-meeting.png') }}"></figure>
            <figure class="filter"></figure>
            <div class="header-title_block">
                <a href="admin/news" class="blueLine">
                    <h1>
                        ВІДДІЛ ПРАКТИКИ ТА ІНТЕГРАЦІЙНИХ ЗВ'ЯЗКІВ ІЗ ЗАМОВНИКАМИ КАДРІВ
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
                <div class="row mt-5">
                    <div class="col-10 offset-1">
                        <p class="practice__subtitle">Якщо ПРАКТИКА – це обов’язкова складова навчального процесу, то СТАЖУВАННЯ передбачає отримання практичного досвіду у вільний від навчання час. В обох випадках Ви отримаєте професійні навички та можливість проявити власні якості – ініціативність, креативність, наполегливість.</p>
                    </div>
                </div>
                <div class="row mt-5">
                    @foreach($data['practice_intership_card'] as $card)
                        <div class="col-md-12 col-lg-4 card  mb-4 ">
                            <a href="#" class="practice__item practice__card p-3 pb-4 ">
                                <img src="{{ URL::asset($card->img_path) }}" alt="" class="rounded-circle practice__image mx-auto ">
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
                <div class="row justify-content-between d-flex align-items-stretch">
                    <div class="card-group">
                        <div class="col-md-6 col-lg preview__card">
                            <div class="card preview__item p-2">
                                <img src="{{ URL::asset('images/main/preview/first.svg') }}" alt="" class="rounded card-img-top preview__image">
                                <div class="card-body mt-2 px-0 preview__body">
                                    <h5 class="card-text preview__text">Участь у конференції Young Scientist Conference 2.0</h5>
                                    <div class="card-text">
                                        Конгрес-центр СумДУ
                                    </div>
                                    <div class="card-text">
                                        23.04.2019, 12:00
                                    </div>
                                </div>
                            </div>
                            <div class="card preview__descr ">
                                <div class="card-body text-center px-2 py-0">
                                    <p class="card-text text-left">В період з 23 по 24 листопада 2018 року старший викладач кафедри управління Денис Смоленніков взяв участь у VI Національному форумі «Бізнес і університети: розвиваємо підприємництво майбутнього».В ході форуму відбулась низка панельних дискусій з питань глобалізації ринку, соціального та жіночого підприємництва...</p>
                                    <a href="#" class="btn btn-outline-primary preview__button mb-2">Детальніше</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg preview__card">
                            <div class="card preview__item p-2">
                                <img src="{{ URL::asset('images/main/preview/second.svg') }}" alt="" class="rounded card-img-top">
                                <div class="card-body mt-2 px-0 preview__body">
                                    <h5 class="card-text preview__text">Четвертий випуск слухачів курсів за програмою «Менеджер житлового будинку</h5>
                                    <div class="card-text">
                                        Конгрес-центр СумДУ
                                    </div>
                                    <div class="card-text">
                                        24.04.2019, 1325
                                    </div>
                                </div>
                            </div>
                            <div class="card preview__descr ">
                                <div class="card-body text-center px-2 py-0">
                                    <p class="card-text text-left">В період з 23 по 24 листопада 2018 року старший викладач кафедри управління Денис Смоленніков взяв участь у VI Національному форумі «Бізнес і університети: розвиваємо підприємництво майбутнього».В ході форуму відбулась низка панельних дискусій з питань глобалізації ринку, соціального та жіночого підприємництва...</p>
                                    <!-- <a href="posts/{$post->id}}"></a> -->
                                    <a href="#" class="btn btn-outline-primary preview__button mb-2">Детальніше</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg preview__card">
                            <div class="card preview__item p-2">
                                <img src="{{ URL::asset('images/main/preview/third.svg') }}" alt="" class="rounded card-img-top">
                                <div class="card-body mt-2 px-0 preview__body">
                                    <h5 class="card-text preview__text">Екскурсія в рамках практичної підготовки студентів</h5>
                                    <div class="card-text">
                                        СумДУ, ауд. Г-1211
                                    </div>
                                    <div class="card-text">
                                        27.04.2019, 15:00
                                    </div>
                                </div>
                            </div>
                            <div class="card preview__descr ">
                                <div class="card-body text-center px-2 py-0">
                                    <p class="card-text text-left">В період з 23 по 24 листопада 2018 року старший викладач кафедри управління Денис Смоленніков взяв участь у VI Національному форумі «Бізнес і університети: розвиваємо підприємництво майбутнього».В ході форуму відбулась низка панельних дискусій з питань глобалізації ринку, соціального та жіночого підприємництва...</p>
                                    <a href="#" class="btn btn-outline-primary preview__button mb-2">Детальніше</a>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg preview__card">
                            <div class="card preview__item p-2">
                                <img src="{{ URL::asset('images/main/preview/fourth.svg') }}" alt="" class="rounded card-img-top">
                                <div class="card-body mt-2 px-0 preview__body">
                                    <h5 class="card-text preview__text">Викладач кафедри взяв участь у VI Національному форумі «Бізнес і університети»</h5>
                                    <div class="card-text">
                                        Актова зала СумДУ
                                    </div>
                                    <div class="card-text">
                                        28.04.2019, 12:00
                                    </div>
                                </div>
                            </div>
                            <div class="card preview__descr ">
                                <div class="card-body text-center px-2 py-0">
                                    <p class="card-text text-left">В період з 23 по 24 листопада 2018 року старший викладач кафедри управління Денис Смоленніков взяв участь у VI Національному форумі «Бізнес і університети: розвиваємо підприємництво майбутнього».В ході форуму відбулась низка панельних дискусій з питань глобалізації ринку, соціального та жіночого підприємництва...</p>
                                    <a href="#" class="btn btn-outline-primary preview__button mb-2">Детальніше</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 preview__last-row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-outline-primary preview__button-more preview__button-not-hover ">Більше анонсів</a>
                    </div>
                </div>
            </div>
        </div>
        <div  id='tutu' class="caption__displays"  >
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
        
        <div class="container">
            <div class="news mt-5">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="card-title news__title">Участь у конференції «Uni-biz bridge-2</h5>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ URL::asset('images/main/news/NoPath-8.svg') }}" class="card-img mt-1" alt="">
                                </div>
                                <div class="col-md-8 mt-1">
                                    <div class="card-body">
                                        <p class="card-text news__text mb-4 py-0">
                                            16.02.2019 р. доцент кафедри управління ННІ ФЕМ ім. Олега Балацького Мішеніна Г.А. взяла участь у конференції «Uni-biz bridge-2» -«Зв&apos;язок університетів та бізнесу», м. Київ. Uni-biz bridge уже другий рік поспіль...
                                        </p>
                                        <a href="{{ route('new', array('id' => 1)) }}" class="card-link news__link">Детальніше...</a>
                                        <p class="news__date">Дата публікації: Березень 9, 2019</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-end">
                    <div class="col-md-12 col-lg-6 mt-4">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="card-title news__title-item">Паралельне навчання студента спеціальності «Менеджмент» в Канаді</h5>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="img/main/news/NoPath-9.svg" class="card-img mt-1" alt="">
                                </div>
                                <div class="col-md-8 mt-1">
                                    <div class="card-body">
                                        <p class="card-text news__text-item mb-4">
                                            Наприкінці лютого Дарина Лисак, другокурсниця спеціальності «Менеджмент», розпочала своє паралельне навчання в Університеті екології та управління у Варшаві за програмою академічної мобільності Erasmus+ KA1...
                                        </p>
                                        <a href="#" class="card-link news__link-item">Детальніше...</a>
                                        <p class="news__date-item">Дата публікації: Березень 9, 2019</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 mt-4">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="card-title news__title-item">Участь у конференції «Uni-biz bridge-2</h5>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="img/main/news/NoPath-10.svg" class="card-img mt-1" alt="">
                                </div>
                                <div class="col-md-8 mt-1">
                                    <div class="card-body">
                                        <p class="card-text news__text-item mb-4">
                                            16.02.2019 р. доцент кафедри управління ННІ ФЕМ ім. Олега Балацького Мішеніна Г.А. взяла участь у конференції «Uni-biz bridge-2» -«Зв&apos;язок університетів та бізнесу», м. Київ. Uni-biz bridge уже другий рік поспіль...
                                        </p>
                                        <a href="#" class="card-link news__link-item">Детальніше...</a>
                                        <p class="news__date-item">Дата публікації: Березень 9, 2019</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-end">
                    <div class="col-md-12 col-lg-6 mt-4">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="card-title news__title-item">Паралельне навчання студента спеціальності «Менеджмент» в 5ан7ді</h5>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="img/main/news/NoPath-11.svg" class="card-img mt-1" alt="">
                                </div>
                                <div class="col-md-8 mt-1">
                                    <div class="card-body">
                                        <p class="card-text news__text-item mb-4">
                                            Наприкінці лютого Дарина Лисак, другокурсниця спеціальності «Менеджмент», розпочала своє паралельне навчання в Університеті екології та управління у Варшаві за програмою академічної мобільності Erasmus+ KA1...
                                        </p>
                                        <a href="#" class="card-link news__link-item">Детальніше...</a>
                                        <p class="news__date-item">Дата публікації: Березень 9, 2019</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 mt-4">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="card-title news__title-item">Участь у конференції «Uni-biz bridge-2</h5>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="img/main/news/NoPath-12.svg" class="card-img mt-1" alt="">
                                </div>
                                <div class="col-md-8 mt-1">
                                    <div class="card-body">
                                        <p class="card-text news__text-item mb-4">
                                            16.02.2019 р. доцент кафедри управління ННІ ФЕМ ім. Олега Балацького Мішеніна Г.А. взяла участь у конференції «Uni-biz bridge-2» -«Зв&apos;язок університетів та бізнесу», м. Київ. Uni-biz bridge уже другий рік поспіль...
                                        </p>
                                        <a href="#" class="card-link news__link-item">Детальніше...</a>
                                        <p class="news__date-item">Дата публікації: Березень 9, 2019</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-outline-primary news__button ">Більше новин</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="slider mt-5">
                <section class="row autoplay slider__items ">
                    @foreach($data['slider'] as $slider)
                    <div class="col">
                        <a href="#"> <img src="{{ URL::asset($slider->img_path)}}" alt="placeholder+image" class="slider__image img-fluid"></a>
                    </div>
                    @endforeach
                </section>
            </div>
        </div>

	

@endsection

@section('footer')
	@parent
@endsection