@extends('site.template')
@section('menu')
	@parent
@endsection

@section('content')

 <div class="a_n__line">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 a_n__text-center">
                    <div class="a_n__text-first">{{trans('base.announcements')}}</div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="a_n__text-second">{{trans('base.announcements')}}</div>
        <div class="a_n__text-third">{{trans('base.announcements')}}</div>
        <div class="a_n__text-fourth">{{trans('base.announcements')}}</div>
    </div>
        <div class="container">
            <div class="preview">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10">
                        <div class="row anon">
            
                        	@for($i = 0; $i < count($data['announcements']); $i++)

                                
                                 <div class=" col-md-7 preview__card ">
                                    <div class="card-body d-flex flex-column justify-content-between ">
                                        <div>
                                            <div class="card_img">
                                                <img src="{{ URL::asset($data['announcements'][$i]->img_path) }}" alt="" class="card-img-top preview__image">

                                            </div>
                                            <h5 class="card-title">{!! !empty($data['announcements'][$i]->{'title_' . $data['locale']}) ? $data['announcements'][$i]->{'title_' . $data['locale']} : $data['announcements'][$i]-> title_ua !!}</h5>
                                            <p class="card-description">{!! !empty($data['announcements'][$i]->{'short_description_' . $data['locale']}) ? $data['announcements'][$i]->{'short_description_' . $data['locale']} : $data['announcements'][$i]-> short_description_ua !!}</p>
                                        </div>
                                        
                                      
                                        <div>
                                            <div class="card-location">
                                                <i class="icon-location"></i>
                                                {!! !empty($data['announcements'][$i]->{'short_location_' . $data['locale']}) ? $data['announcements'][$i]->{'short_location_' . $data['locale']} : $data['announcements'][$i]-> short_location_ua !!}
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
                                        <a href="{{ route('announcement', array('id' => $data['announcements'][$i]->inner_news_id, 'title' => $data['announcements'][$i]->trans_title)) }}" class="btn btn-outline-primary preview__button ">{{trans('base.button_more')}}</a>
                                    </div>


                                </div>
                            @endfor
                            @if(count($data['announcements']) < 8)
                                    @for($i = count($data['announcements']); $i < 8; $i++)
                                 <div class=" col-md-7 preview__card empty-fild">
                                    </div>
                                @endfor                                    
                            @endif
                        </div>
                    </div>
                </div>
                <div class="pagin">
                    {{$data['announcements']->links()}}
                </div>
        
        	</div>
        </div>
@endsection


@section('footer')
	@parent
@endsection
