@extends('site.template')
@section('menu')
	@parent
@endsection

@section('content')

    <div class="container">
        <div class="news my-5">
            <div class="news__item">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-10  my-3">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="">{!! !empty($data['new']->{'title_' . $data['locale']}) ? $data['new']->{'title_' . $data['locale']} : $data['new']-> title_ua !!}</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div>{!! !empty($data['new']->{'full_location_' . $data['locale']}) ? $data['new']->{'full_location_' . $data['locale']} : $data['new']-> full_location_ua !!}</div>
                            </div>
                            <div class="col-12 col-md-6 news__data">
                                @if($data['new']->type ==='telegram')
                                    <div>{{ date("d-m-Y", strtotime($data['new']->date)) }}</div>

                                @elseif($data['new']->type ==='new')
                                    <div>{{ date("d-m-Y", strtotime($data['new']->date)) }}</div>
                                @else  <div>{{ date("d-m-Y H:i", strtotime($data['new']->date)) }}</div>
                                @endif
                            </div>
                        </div>
                        @if($data['new']->type ==='telegram')
                        <div class="row mt-3">
                            <div class="col-lg-8 mx-auto d-flex justify-content-center">
                                <img class="w-100" src="{{ URL::asset($data['new']->img_path) }}">
                            </div>
                        </div>
                        @else

                        <div class="row">
                            <div class="col-12 mx-auto col-md-12">
                                <div class="slider__main mt-3">
                                    <div class="slider slider-for">
                                         @foreach($data['slider'] as $slide)
                                             <img src="{{ URL::asset($slide->img_path) }}">
                                         @endforeach
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">
                                <div class="slider slider-nav mt-3">
                                         @foreach($data['slider'] as $slide)
                                            <div class=" col"> <img src="{{ URL::asset($slide->img_path) }}" width="150" height="100" ></div>
                                         @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row mt-5">
                            <div class="col-12">
                                {!! !empty($data['new']->{'full_description_' . $data['locale']}) ? $data['new']->{'full_description_' . $data['locale']} : $data['new']-> full_description_ua !!}
                                
                            </div>
                        </div>

                    @if($data['new']->type ==='telegram' && !empty($data['new']->link))
                            <div class="row">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <a href="{{$data['new']->link}}" class="btn btn-outline-primary px-5">
                                        {{ trans('base.go')}}
                                    </a>
                                </div>
                            </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer')
	@parent
@endsection
