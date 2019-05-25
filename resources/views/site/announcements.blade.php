@extends('site.template')
@section('menu')
	@parent
@endsection

@section('content')

 <div class="a_n__line">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 a_n__text-center">
                    <div class="a_n__text-first">Анонси</div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="a_n__text-second">Анонси</div>
        <div class="a_n__text-third">Анонси</div>
        <div class="a_n__text-fourth">Анонси</div>
    </div>
        <div class="container">
            <div class="preview">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10">
                        <div class="row anon">
            
                        	@for($i = 0; $i < count($data['announcements']); $i++)
                          
                                <div class="anonc_cards-main">
                                    <div class="preview__card-page">
                                        <div class="card preview__item-page ">
                                            <img src="{{ URL::asset($data['announcements'][$i]->img_path) }}" alt="" class="rounded card-img-top preview__image">

                                            <div class="card-body my-2 px-3 preview__body">
                                                <h5 class="card-text preview__text-page">
                                                    <div class="abra"></div>
                                                    {{$data['announcements'][$i]->title}}
                                                </h5>
                                                <div class="preview__card-text-page">
                                                    <div class="card-text">
                                                        {{$data['announcements'][$i]->short_location}}
                                                    </div>
                                                    <div class="card-text">
                                                        {{$data['announcements'][$i]->date}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                       <div class="card preview__descr-page">
                                            <div class="card-body text-center ">
                                                <div class="card-text text-left preview__descr-text-page">
                                                    <div class="abra"></div>{{$data['announcements'][$i]->short_description}}
                                                </div>

                                                <a href="{{ route('announcement', array('id' => $data['announcements'][$i]->inner_news_id, 'title' => $data['announcements'][$i]->trans_title)) }}" class="btn btn-outline-primary preview__button mt-3">Детальніше</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="pagin">
                    <!-- {{$data['announcements']->links()} -->
                </div>
        
        	</div>
        </div>
@endsection


@section('footer')
	@parent
@endsection