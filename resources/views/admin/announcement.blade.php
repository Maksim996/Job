@extends('admin.template')
@section('sidebar')
 @parent
@endsection
@section('content')
<!--begin::Dashboard 1-->
    <div class="k-portlet">
       <div class="k-portlet__head">
            <div class="k-portlet__head-label">
                <h3 class="k-portlet__head-title">
                    {{isset($data['announcement'][0])?$data['announcement'][0]->title_ua  :'Новий анонс'}}
                </h3>
            </div>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form 
            id="announcements-form"
            method="POST"
                @if(isset($data['announcement'][0]))
                    action="{{ URL::route('ad_announcements.announcements.update', $data['announcement'][0]->inner_news_id) }}"
                @else
                    action="{{ URL::route('ad_announcements.announcements.store') }}"
                @endif
            class="k-form k-form--label-right" enctype="multipart/form-data"
                @if(isset($data['announcement'][0]))
                    data-is-update="1"
                @else
                    data-is-update="0"
                @endif
            @if(isset($data['announcement'][0]))
                data-id="{{$data['announcement'][0]->inner_news_id}}"
            @endif
            >

            {{ @csrf_field() }}
            <!-- 
                @if(isset($data['announcement'][0]))
                    <input type="hidden" name="_method" value="PUT">
                @endif 
            -->
            <div class="k-portlet__body">
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Заголовок анонсу</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">

                        <input type="text" class="form-control form-title-ua" placeholder="" name="title_ua"
                            @if(isset($data['announcement'][0]))
                                value="{{ $data['announcement'][0]->title_ua }}"
                            @else
                                value="" 
                            @endif
                        >
                        <span class="form-text text-muted">Заголовок анонсу на головній сторінці</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Короткий опис</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">

                        <textarea class="form-control short-description-ua"
                                  id="k_maxlength_5"
                                  maxlength="200"
                                  placeholder=""
                                  rows="6"
                                  name="short_description_ua">@if(isset($data['announcement'][0])){{ $data['announcement'][0]->short_description_ua }}@endif</textarea>
                        <span class="form-text text-muted"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Детальний опис</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">

                        <textarea id="m_summernote_1"
                                  class="summernote full-description-ua"
                                  placeholder="" rows="6"
                                  name="full_description_ua">@if(isset($data['announcement'][0])){{ $data['announcement'][0]->full_description_ua }}@endif</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Місце проведення коротке</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">

                        <input type="text" class="form-control short-location-ua" placeholder="" name="short_location_ua"
                            @if(isset($data['announcement'][0]))
                                value="{{ $data['announcement'][0]->short_location_ua }}"
                            @else
                                value=""
                            @endif
                        >
                        <span class="form-text text-muted">Приклад: СумДУ ЕТ-223</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Місце проведення повне</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">

                        <input type="text" class="form-control full-location-ua" placeholder="" name="full_location_ua"
                            @if(isset($data['announcement'][0]))
                                value="{{ $data['announcement'][0]->full_location_ua }}"
                            @else
                                value=""
                            @endif
                        >
                        <span class="form-text text-muted">Приклад: м.Суми, Сумська обл. вул. Соборна 23, буд. 10 к.213</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Дата та час проведення</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">

                        <input type="input" class="form-control date-meeting" autocomplete="off" placeholder="" name="date"
                            id="k_datetimepicker_3"
                            @if(isset($data['announcement'][0]))
                                value="{{ date('d-m-Y H:i', strtotime($data['announcement'][0]->date)) }}"
                            @else
                                value=""
                            @endif
                        <span class="form-text text-muted">Приклад: 21 грудня о 14:00</span>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label class="col-form-label col-lg-2 col-sm-12">Головне зображення</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <input type="file" id="main_image" class=" main-image" name="img_path">
                        <output id="single_img">
                            @if(isset($data['announcement'][0]))
                                <span class="thumb"><img src="{{ $data['announcement'][0]->img_path }}" style="max-width: 100px; height: auto;"></span>
                            @endif
                        </output>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Зображення для слайдера</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <input type="file" id="files" name="slider-image" multiple />
                        <output id="list">
                            @if(isset($data['sliders']))
                                @foreach($data['sliders'] as $slider)
                                    <span>
                                        <img src="{{ $slider->img_path }}" data-id="{{ $slider->id }}" style="max-width: 100px; height: auto;">
                                    </span>
                                @endforeach
                            @endif
                        </output>
                    </div>
                </div>
                <div class='black-line form-group row'></div>
                <p class='info-seach'>Додаткова інформація для пошукової системи</p>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Ключові слова</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">

                        <input type="text" class="form-control additional-info" placeholder="" name="keywords"
                            @if(isset($data['announcement'][0]))
                                value="{{ $data['announcement'][0]->keywords }}"
                            @else
                                value=""
                            @endif
                        >
                        <span class="form-text text-muted">Ключові слова для пошукової системи(виводити через кому), наприклад: СумДУ, Сумський державний університет, СумГУ, SSU</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Опис</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">

                        <textarea class="form-control page-description" id="k_maxlength_5" maxlength="250" placeholder="" rows="6" name="description">@if(isset($data['announcement'][0])){{ $data['announcement'][0]->description }}@endif</textarea>
                        <span class="form-text text-muted">Короткий опис сторінки</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-sm-12 col-form-label">Виберіть додаткову мову</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <div class="k-checkbox-inline">
                            <label class="k-checkbox k-checkbox--brand" cheched="">
                                <input  name="local_ru"
                                        type="checkbox"
                                        value="local_ru"
                                        loc-name="local_ru"
                                        @if(!empty($data['announcement'][0]->title_ru)) checked @endif
                                >
                                RU <span></span>
                            </label>
                            <label class="k-checkbox k-checkbox--brand">
                                <input name="local_us"
                                       type="checkbox"
                                       value="local_us"
                                       loc-name="local_us"
                                       @if(!empty($data['announcement'][0]->title_us)) checked @endif
                                >
                                ENG <span></span>
                            </label>

                        </div>
                        {{--<span class="form-text text-muted">Some help text goes here</span>--}}
                    </div>
                </div>

                {{--ru--}}

                <div class="k-portlet" id="local_ru">
                    <div class="k-portlet__head">
                        <div class="k-portlet__head-label">
                            <h3 class="k-portlet__head-title">
                                RU
                            </h3>
                        </div>
                    </div>
                    <div class="k-portlet__body ">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2 col-sm-12">Заголовок анонсу</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">

                                <input type="text" class="form-control form-title-ru" placeholder="" name="title_ru"
                                       @if(isset($data['announcement'][0]))
                                       value="{{ $data['announcement'][0]->title_ru }}"
                                       @else
                                       value=""
                                    @endif
                                >
                                <span class="form-text text-muted">Заголовок анонсу на головній сторінці: російською</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2 col-sm-12">Короткий опис</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">

                        <textarea class="form-control short-description-ru"
                                  id="k_maxlength_5"
                                  maxlength="200"
                                  placeholder=""
                                  rows="6"
                                  name="short_description_ru">@if(isset($data['announcement'][0])){{ $data['announcement'][0]->short_description_ru }}@endif</textarea>
                                <span class="form-text text-muted"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2 col-sm-12">Детальний опис</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">

                        <textarea id="m_summernote_1"
                                  class="summernote full-description-ru"
                                  placeholder="" rows="6"
                                  name="full_description_ru">@if(isset($data['announcement'][0])){{ $data['announcement'][0]->full_description_ru }}@endif</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2 col-sm-12">Місце проведення коротке</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">

                                <input type="text" class="form-control short-location-ru" placeholder="" name="short_location_ru"
                                       @if(isset($data['announcement'][0]))
                                       value="{{ $data['announcement'][0]->short_location_ru }}"
                                       @else
                                       value=""
                                    @endif
                                >
                                <span class="form-text text-muted">Приклад: СумДУ ЕТ-223</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2 col-sm-12">Місце проведення повне</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">

                                <input type="text" class="form-control full-location-ru" placeholder="" name="full_location_ru"
                                       @if(isset($data['announcement'][0]))
                                       value="{{ $data['announcement'][0]->full_location_ru }}"
                                       @else
                                       value=""
                                    @endif
                                >
                                <span class="form-text text-muted">Приклад: м.Суми, Сумська обл. вул. Соборна 23, буд. 10 к.213</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{--us --}}

                <div class="k-portlet" id="local_us">
                    <div class="k-portlet__head">
                        <div class="k-portlet__head-label">
                            <h3 class="k-portlet__head-title">
                                ENG
                            </h3>
                        </div>
                    </div>
                    <div class="k-portlet__body ">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2 col-sm-12">Заголовок анонсу</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">

                                <input type="text" class="form-control form-title-us" placeholder="" name="title_us"
                                       @if(isset($data['announcement'][0]))
                                       value="{{ $data['announcement'][0]->title_us }}"
                                       @else
                                       value=""
                                    @endif
                                >
                                <span class="form-text text-muted">Заголовок анонсу на головній сторінці: англійською</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2 col-sm-12">Короткий опис</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">

                        <textarea class="form-control short-description-us"
                                  id="k_maxlength_5"
                                  maxlength="200"
                                  placeholder=""
                                  rows="6"
                                  name="short_description_us">@if(isset($data['announcement'][0])){{ $data['announcement'][0]->short_description_us }}@endif</textarea>
                                <span class="form-text text-muted"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2 col-sm-12">Детальний опис</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">

                        <textarea id="m_summernote_1"
                                  class="summernote full-description-us"
                                  placeholder="" rows="6"
                                  name="full_description_us">@if(isset($data['announcement'][0])){{ $data['announcement'][0]->full_description_us }}@endif</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2 col-sm-12">Місце проведення коротке</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">

                                <input type="text" class="form-control short-location-us" placeholder="" name="short_location_us"
                                       @if(isset($data['announcement'][0]))
                                       value="{{ $data['announcement'][0]->short_location_us }}"
                                       @else
                                       value=""
                                    @endif
                                >
                                <span class="form-text text-muted">Приклад: СумДУ ЕТ-223</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2 col-sm-12">Місце проведення повне</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">

                                <input type="text" class="form-control full-location-us" placeholder="" name="full_location_us"
                                       @if(isset($data['announcement'][0]))
                                       value="{{ $data['announcement'][0]->full_location_us }}"
                                       @else
                                       value=""
                                    @endif
                                >
                                <span class="form-text text-muted">Приклад: м.Суми, Сумська обл. вул. Соборна 23, буд. 10 к.213</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="k-portlet__foot">
                <div class="k-form__actions">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-brand">Зберегти</button>
                            <a href="{{ route('ad_announcements.announcements.index')}}" class="btn btn-outline-secondary">Назад</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
   </div>
    <!--end::Dashboard 1-->
@endsection
