@extends('site.template')
@section('menu')
	@parent
@endsection

@section('content')
    @foreach($data['category'] as $category)
        @if(Route::currentRouteName() == $category->link )
            <div class="a_n__line mb-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 a_n__text-center">
                            <div class="a_n__text-first">{!! !empty($category->{'title_' . $data['locale'] }) ? $category->{'title_' . $data['locale'] } : $category-> title_ua !!}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="a_n__text-second">{!! !empty($category->{'title_' . $data['locale'] }) ? $category->{'title_' . $data['locale'] } : $category-> title_ua !!}</div>
            <div class="a_n__text-third">{!! !empty($category->{'title_' . $data['locale'] }) ? $category->{'title_' . $data['locale'] } : $category-> title_ua !!}</div>
            <div class="a_n__text-fourth">{!! !empty($category->{'title_' . $data['locale'] }) ? $category->{'title_' . $data['locale'] } : $category-> title_ua !!}</div>
        @endif




    @endforeach

    <div class="container">
        <div class="news">
    	@for($i = 0; $i < count($data['news']); $i++)
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-8 my-2 news__card">
                    <div class="news__card-item">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="card-title news__title-page">
                                        {!! !empty($data['news'][$i]->{'title_' . $data['locale'] }) ? $data['news'][$i]->{'title_' . $data['locale'] } : $data['news'][$i]-> title_ua !!}
                                    </h5>
                                </div>
                            </div>
                            <div class="row no-gutters d-flex align-items-stretch">
                                <div class="col-lg-4">
                                    <img src="{{ URL::asset($data['news'][$i]->img_path)}}" class="card-img mt-1" alt="">
                                </div>
                                <div class="card-body pl-lg-3 col-lg-8">
                                    <p class="card-text news__text-page mb-4 py-0">
                                        {!! !empty($data['news'][$i]->{'short_description_' . $data['locale']}) ? $data['news'][$i]->{'short_description_' . $data['locale']} : $data['news'][$i]-> short_description_ua !!}
                                    </p>
                                    <div class="news__about">
                                        <a href="{{ route('new', array('id' => $data['news'][$i]->inner_news_id, 'title' => $data['news'][$i]->trans_title)) }}" class="card-link news__link-page">
                                            {{trans('base.link_more')}}
                                        </a>
                                        <div class="news__date-page">
                                            {{trans('base.date_post')}}: {{ date("d-m-Y H:i", strtotime($data['news'][$i]->date)) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                 @endfor

                <div class="pagin">

                    {{$data['news']->links()}}
           
                </div>
            </div>
        </div>

@endsection


@section('footer')
	@parent
@endsection
