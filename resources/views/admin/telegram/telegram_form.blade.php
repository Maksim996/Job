

<div class="k-portlet__body">
    <div class="form-group row">
        <label class="col-form-label col-lg-2 col-sm-12">Заголовок</label>
        <div class="col-lg-9 col-md-9 col-sm-12">

            <input type="text"
                   class="form-control form-title-ua k_maxlength_5"
                   placeholder=""
                   maxlength="75"
                   name="title_ua"
                   @if(isset($data['telegram'][0]))
                   value="{{ $data['telegram'][0]->title_ua }}"
                   @else
                   value=""
                @endif
            >
            {{--<span class="form-text text-muted">Заголовок анонсу на головній сторінці</span>--}}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-2 col-sm-12">Короткий опис</label>
        <div class="col-lg-9 col-md-9 col-sm-12">

                        <textarea class="form-control short-description-ua k_maxlength_5"
                                  maxlength="200"
                                  placeholder=""
                                  rows="6"
                                  name="short_description_ua">@if(isset($data['telegram'][0])){{ $data['telegram'][0]->short_description_ua }}@endif</textarea>
            <span class="form-text text-muted"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-2 col-sm-12">Детальний опис</label>
        <div class="col-lg-9 col-md-9 col-sm-12">

                        <textarea id="m_summernote_1"
                                  class="summernote full-description-ua"
                                  placeholder="" rows="6"
                                  name="full_description_ua">@if(isset($data['telegram'][0])){{ $data['telegram'][0]->full_description_ua }}@endif</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-2 col-sm-12">Коротке адреса </label>
        <div class="col-lg-9 col-md-9 col-sm-12">

            <input type="text" maxlength="30" class="form-control short-location-ua k_maxlength_5" placeholder="" name="short_location_ua"
                   @if(isset($data['telegram'][0]))
                   value="{{ $data['telegram'][0]->short_location_ua }}"
                   @else
                   value=""
                @endif
            >
            <span class="form-text text-muted">Приклад: СумДУ ЕТ-223</span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-2 col-sm-12">Повна адреса</label>
        <div class="col-lg-9 col-md-9 col-sm-12">

            <input type="text" maxlength="200" class="form-control full-location-ua k_maxlength_5" placeholder="" name="full_location_ua"
                   @if(isset($data['telegram'][0]))
                   value="{{ $data['telegram'][0]->full_location_ua }}"
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
            <input type="input" class="form-control date-meeting" autocomplete="off" placeholder="" readonly name="date"
                   id="k_datetimepicker_3"
                   @if(isset($data['telegram'][0]))
                   value="{{ date('d-m-Y H:i', strtotime($data['telegram'][0]->date)) }}"
                   @else
                   value=""
                @endif
            >
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
        <div class="col-lg-9 col-md-9 col-sm-12">

            <input type="text" maxlength="30" class="form-control short-location-ua " placeholder="" name="link"
                   @if(isset($data['telegram'][0]))
                   value="{{ $data['telegram'][0]->link }}"
                   @else
                   value=""
                @endif
            >
            <span class="form-text text-muted">Посилання на організацію або замовника</span>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-form-label col-lg-2 col-sm-12">Загрузка фото</label>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <figure class="figure">
                <img id="blah"
                     accept="image/jpg,image/jpeg,image/png"
                     @if(isset($data['telegram'][0]))
                     src="{{asset($data['telegram'][0]->img_path) }}"
                     @else
                     src=""
                     @endif
                class=" preview_img figure-img img-fluid rounded" >
                <figcaption class="figure-caption">Поточне зображення</figcaption>
            </figure>
        </div>
        <div class="d-flex  flex-column pb-5 col-lg-6 col-md-6 col-sm-6">
            <input class="inp_header_img form-control
                 @if(!isset($data['telegram'][0]->img_path))
                    required
                @endif
                    "
                   type="file" name="img_path" class="form-control-file" accept="image/jpg,image/jpeg,image/png">
            <span class="form-text text-muted">Розширення зображення: jpg, jpeg, png.</span>
        </div>

    </div>
    <div class='black-line form-group row'></div>
    <p class='info-seach'>Додаткова інформація для пошукової системи</p>
    <div class="form-group row">
        <label class="col-form-label col-lg-2 col-sm-12">Ключові слова</label>
        <div class="col-lg-9 col-md-9 col-sm-12">

            <input type="text" class="form-control additional-info k_maxlength_5" maxlength="200" placeholder="" name="keywords"
                   @if(isset($data['telegram'][0]))
                   value="{{ $data['telegram'][0]->keywords }}"
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
            <textarea class="form-control page-description" placeholder="" rows="6" name="description">@if(isset($data['telegram'][0])){{ $data['telegram'][0]->description }}@endif</textarea>
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
                            @if(!empty($data['telegram'][0]->title_ru)) checked @endif
                    >
                    RU <span></span>
                </label>
                <label class="k-checkbox k-checkbox--brand">
                    <input name="local_us"
                           type="checkbox"
                           value="local_us"
                           loc-name="local_us"
                           @if(!empty($data['telegram'][0]->title_us)) checked @endif
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
                <label class="col-form-label col-lg-2 col-sm-12">Заголовок</label>
                <div class="col-lg-9 col-md-9 col-sm-12">

                    <input type="text" class="form-control form-title-ru k_maxlength_5" placeholder="" maxlength="75" name="title_ru"
                           @if(isset($data['telegram'][0]))
                           value="{{ $data['telegram'][0]->title_ru }}"
                           @else
                           value=""
                        @endif
                    >
                    {{--<span class="form-text text-muted">Заголовок на головній сторінці: російською</span>--}}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2 col-sm-12">Короткий опис</label>
                <div class="col-lg-9 col-md-9 col-sm-12">

                        <textarea class="form-control short-description-ru k_maxlength_5"
                                  maxlength="200"
                                  placeholder=""
                                  rows="6"
                                  name="short_description_ru">@if(isset($data['telegram'][0])){{ $data['telegram'][0]->short_description_ru }}@endif</textarea>
                    <span class="form-text text-muted"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2 col-sm-12">Детальний опис</label>
                <div class="col-lg-9 col-md-9 col-sm-12">

                        <textarea id="m_summernote_1"
                                  class="summernote full-description-ru"
                                  placeholder="" rows="6"
                                  name="full_description_ru">@if(isset($data['telegram'][0])){{ $data['telegram'][0]->full_description_ru }}@endif</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2 col-sm-12">Коротка адреса</label>
                <div class="col-lg-9 col-md-9 col-sm-12">

                    <input type="text" maxlength="30" class="form-control short-location-ru k_maxlength_5" placeholder="" name="short_location_ru"
                           @if(isset($data['telegram'][0]))
                           value="{{ $data['telegram'][0]->short_location_ru }}"
                           @else
                           value=""
                        @endif
                    >
                    <span class="form-text text-muted">Приклад: СумДУ ЕТ-223</span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2 col-sm-12">Повна адреса</label>
                <div class="col-lg-9 col-md-9 col-sm-12">

                    <input type="text" class="form-control full-location-ru k_maxlength_5" maxlength="200" placeholder="" name="full_location_ru"
                           @if(isset($data['telegram'][0]))
                           value="{{ $data['telegram'][0]->full_location_ru }}"
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
                <label class="col-form-label col-lg-2 col-sm-12">Заголовок</label>
                <div class="col-lg-9 col-md-9 col-sm-12">

                    <input type="text" class="form-control form-title-us k_maxlength_5" maxlength="75" placeholder="" name="title_us"
                           @if(isset($data['telegram'][0]))
                           value="{{ $data['telegram'][0]->title_us }}"
                           @else
                           value=""
                        @endif
                    >
                    {{--<span class="form-text text-muted">Заголовок анонсу на головній сторінці: англійською</span>--}}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2 col-sm-12">Короткий опис</label>
                <div class="col-lg-9 col-md-9 col-sm-12">

                        <textarea class="form-control short-description-us k_maxlength_5"
                                  maxlength="200"
                                  placeholder=""
                                  rows="6"
                                  name="short_description_us">@if(isset($data['telegram'][0])){{ $data['telegram'][0]->short_description_us }}@endif</textarea>
                    <span class="form-text text-muted"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2 col-sm-12">Детальний опис</label>
                <div class="col-lg-9 col-md-9 col-sm-12">

                        <textarea id="m_summernote_1"
                                  class="summernote full-description-us"
                                  placeholder="" rows="6"
                                  name="full_description_us">@if(isset($data['telegram'][0])){{ $data['telegram'][0]->full_description_us }}@endif</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2 col-sm-12 ">Коротка адреса</label>
                <div class="col-lg-9 col-md-9 col-sm-12">

                    <input type="text" class="form-control short-location-us k_maxlength_5" maxlength="30" placeholder="" name="short_location_us"
                           @if(isset($data['telegram'][0]))
                           value="{{ $data['telegram'][0]->short_location_us }}"
                           @else
                           value=""
                        @endif
                    >
                    <span class="form-text text-muted">Приклад: СумДУ ЕТ-223</span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-2 col-sm-12">Повна адреса</label>
                <div class="col-lg-9 col-md-9 col-sm-12">

                    <input type="text" class="form-control full-location-us k_maxlength_5" maxlength="200" placeholder="" name="full_location_us"
                           @if(isset($data['telegram'][0]))
                           value="{{ $data['telegram'][0]->full_location_us }}"
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
                <a href="{{ route('ad_telegram.telegram.index')}}" class="btn btn-outline-secondary">Назад</a>
            </div>
        </div>
    </div>
</div>
{{--<div class="k-portlet__foot">--}}
    {{--<div class="k-form__actions">--}}
        {{--<button type="submit" class="btn btn-primary">Зберегти</button>--}}
        {{--<a href="{{ route('ad_nav.nav.show',['id'=>$data['category']->category_id])}}" class="btn btn-outline-secondary">Відмінити</a>--}}
    {{--</div>--}}
{{--</div>--}}

