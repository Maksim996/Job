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

                    @isset($data['announcement'][0])
                        Анонс номер {{$data['announcement'][0]->inner_news_id}}
                    @endisset
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
                    <label class="col-form-label col-lg-2 col-sm-12">Заголовок</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">

                        <input type="text" class="form-control form-title" placeholder="" name="title"
                            @if(isset($data['announcement'][0]))
                                value="{{ $data['announcement'][0]->title }}"
                            @else
                                value="" 
                            @endif
                        >
                        <span class="form-text text-muted">Основний заголовок на головній сторінці</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Короткий опис</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">

                        <textarea class="form-control short-description" id="k_maxlength_5" maxlength="250" placeholder="" rows="6" name="short_description">@if(isset($data['announcement'][0])){{ $data['announcement'][0]->short_description }}@endif</textarea>
                        <span class="form-text text-muted"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Детальний опис</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">

                        <textarea id="m_summernote_1" class="summernote full-description" maxlength="250" placeholder="" rows="6" name="full_description">@if(isset($data['announcement'][0])){{ $data['announcement'][0]->full_description }}@endif</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Місце проведення коротке</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">

                        <input type="text" class="form-control short-location" placeholder="" name="short_location"
                            @if(isset($data['announcement'][0]))
                                value="{{ $data['announcement'][0]->short_location }}"
                            @else
                                value=""
                            @endif
                        >
                        <span class="form-text text-muted">Приклад: СумДУ ЕТ-223</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Місце проведення повне</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">

                        <input type="text" class="form-control full-location" placeholder="" name="full_location"
                            @if(isset($data['announcement'][0]))
                                value="{{ $data['announcement'][0]->full_location }}"
                            @else
                                value=""
                            @endif
                        >
                        <span class="form-text text-muted">Приклад: м.Суми, Сумська обл. вул. Соборна 23, буд. 10 к.213</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Дата та час проведення</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">

                        <input type="input" class="form-control date-meeting" placeholder="" name="date"
                            id="k_datetimepicker_3"
                            @if(isset($data['announcement'][0]))
                                value="{{ $data['announcement'][0]->date }}"
                            @else
                                value=""
                            @endif
                        <span class="form-text text-muted">Приклад: 21 грудня о 14:00</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Головне зображення</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="file" id="main_image" class="form-control main-image" name="img_path">
                        <output id="single_img">
                            @if(isset($data['announcement'][0]))
                                <span><img src="{{ $data['announcement'][0]->img_path }}" style="max-width: 100px; height: auto;"></span>
                            @endif
                        </output>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Зображення для слайдера</label>
                    <input type="file" id="files" name="slider-image" name="files[]" multiple />
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
                <div class='black-line form-group row'></div>
                <p class='info-seach'>Додаткова інформація для пошукової системи</p>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Ключові слова</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">

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
                    <div class="col-lg-6 col-md-9 col-sm-12">

                        <textarea class="form-control page-description" id="k_maxlength_5" maxlength="250" placeholder="" rows="6" name="description">@if(isset($data['announcement'][0])){{ $data['announcement'][0]->description }}@endif</textarea>
                        <span class="form-text text-muted">Короткий опис сторінки</span>
                    </div>
                </div>
            </div>
            <div class="k-portlet__foot">
                <div class="k-form__actions">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-brand">Зберегти</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
   </div>
    <!--end::Dashboard 1-->
@endsection
