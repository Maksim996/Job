@extends('admin.template')
@section('sidebar')
 @parent
@endsection
@section('content')
<!--begin::Dashboard 1-->
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/media.css') }}">
    <div class="k-portlet">
       <div class="k-portlet__head">
            <div class="k-portlet__head-label">
                <h3 class="k-portlet__head-title">
                    Картки
                </h3>
            </div>
        </div>

        <form id="practic-cards" method="POST" action="{{ URL::route('ad_practic-cards.practic-cards.store') }}" class="k-form" enctype="multipart/form-data">
            {{ @csrf_field() }}
            <div class="k-portlet__body">
                <div class="row mt-5">
                    <div id="block1" class="col-lg-4 col-md-12  mt-2">
                        <div class="col-lg-9 mx-auto admin_card d-flex flex-column align-items-center">
                            <img src="{{ URL::asset($data['practicCards'][0]->img_path) }}" alt="" class="rounded-circle practice__image">
                            <div class="card-body mt-3">
                                <h5 class="card-title practice__topic">{{ $data['practicCards'][0]->card_title_ua }}</h5>
                                <p class="card-text practice__text">{{ $data['practicCards'][0]->card_description_ua }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-12">Заголовок картки</label>
                                <input name="card_title1_ua" maxlength="80" type="text" class="form-control k_maxlength_5" placeholder="" value="{{ $data['practicCards'][0]->card_title_ua }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-12">Короткий опис</label>
                                <textarea name="card_description1_ua" class="form-control k_maxlength_5"  maxlength="250" placeholder="" rows="6">{{ $data['practicCards'][0]->card_description_ua }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-12">Зображення</label>
                                <input type="file" name="img_path1" class="" @if(empty($data['practicCards'][0]->img_path)) required @endif>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-12">Посилання</label>
                                <input type="text" name="card_link1" class="form-control" placeholder="" value="{{ $data['practicCards'][0]->card_link }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-6 col-sm-12 col-form-label">Виберіть додаткову мову</label>
                            <div class="col-lg-6 col-sm-12">
                                <div class="k-checkbox-inline">
                                    <label class="k-checkbox k-checkbox--brand" >
                                        <input  name="local1_ru"
                                                type="checkbox"
                                                value="local1_ru"
                                                loc-name="local_ru"
                                                @if(!empty($data['practicCards'][0]->card_title_ru)) checked @endif
                                        >
                                        RU <span></span>
                                    </label>
                                    <label class="k-checkbox k-checkbox--brand">
                                        <input name="local1_us"
                                               type="checkbox"
                                               value="local1_us"
                                               loc-name="local_us"
                                               @if(!empty($data['practicCards'][0]->card_title_us)) checked @endif
                                        >
                                        ENG <span></span>
                                    </label>

                                </div>
                            </div>
                        </div>

                        {{--ru--}}

                        <div class="k-portlet" id="local1_ru">
                            <div class="k-portlet__head">
                                <div class="k-portlet__head-label">
                                    <h3 class="k-portlet__head-title">
                                        RU
                                    </h3>
                                </div>
                            </div>

                                <div class="form-group row" >
                                    <div class="col-lg">
                                    <label class="col-form-label col-lg-12">Заголовок картки</label>
                                        <input type="text"
                                               name="card_title1_ru"
                                               class="form-control k_maxlength_5"
                                               maxlength="80"
                                               value="{{ $data['practicCards'][0]->card_title_ru }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg">
                                    <label class="col-form-label col-lg-12">Короткий опис</label>
                                <textarea class="form-control k_maxlength_5"
                                          name="card_description1_ru"
                                          maxlength="250"
                                          placeholder=""
                                          rows="6">{{ $data['practicCards'][0]->card_description_ru }}</textarea>
                                    </div>
                                </div>

                        </div>

                        {{--us --}}

                        <div class="k-portlet" id="local1_us">
                            <div class="k-portlet__head">
                                <div class="k-portlet__head-label">
                                    <h3 class="k-portlet__head-title">
                                        ENG
                                    </h3>
                                </div>
                            </div>

                                <div class="form-group row">
                                    <div class="col-lg">
                                    <label class="col-form-label col-lg-12">Заголовок картки</label>
                                        <input type="text"
                                               name="card_title1_us"
                                               class="form-control k_maxlength_5"
                                               placeholder=""
                                               maxlength="80"
                                               value="{{ $data['practicCards'][0]->card_title_us }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg">
                                    <label class="col-form-label col-lg-12">Короткий опис</label>
                                <textarea class=" form-control k_maxlength_5"
                                          name="card_description1_us"
                                          maxlength="250"
                                          placeholder=""
                                          rows="6">{{ $data['practicCards'][0]->card_description_us }}</textarea>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div id="block2" class="col-lg-4 col-md-12  mt-2">
                        <div class="col-lg-9 mx-auto admin_card d-flex flex-column align-items-center">
                            <img src="{{ URL::asset($data['practicCards'][1]->img_path) }}" alt="" class="rounded-circle practice__image ">
                            <div class=" card-body mt-3">
                                <h5 class="card-title practice__topic">{{ $data['practicCards'][1]->card_title_ua }}</h5>
                                <p class="card-text practice__text">{{ $data['practicCards'][1]->card_description_ua }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-12">Заголовок картки</label>
                                <input name="card_title2_ua" maxlength="80" type="text" class="form-control k_maxlength_5" placeholder="" value="{{ $data['practicCards'][1]->card_title_ua }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-12">Короткий опис</label>
                                <textarea name="card_description2_ua" class="form-control k_maxlength_5" maxlength="250" placeholder="" rows="6">{{ $data['practicCards'][1]->card_description_ua }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-12">Зображення</label>
                                <input type="file" name="img_path2" class="" @if(empty($data['practicCards'][1]->img_path)) required @endif>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-12">Посилання</label>
                                <input type="text" name="card_link2" class="form-control " placeholder="" value="{{ $data['practicCards'][1]->card_link }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-6 col-sm-12 col-form-label">Виберіть додаткову мову</label>
                            <div class="col-lg-6 col-sm-12">
                                <div class="k-checkbox-inline">
                                    <label class="k-checkbox k-checkbox--brand" >
                                        <input  name="local2_ru"
                                                type="checkbox"
                                                value="local2_ru"
                                                loc-name="local_ru"
                                                @if(!empty($data['practicCards'][1]->card_title_ru)) checked @endif
                                        >
                                        RU <span></span>
                                    </label>
                                    <label class="k-checkbox k-checkbox--brand">
                                        <input name="local2_us"
                                               type="checkbox"
                                               value="local2_us"
                                               loc-name="local_us"
                                               @if(!empty($data['practicCards'][1]->card_title_us)) checked @endif
                                        >
                                        ENG <span></span>
                                    </label>

                                </div>
                            </div>
                        </div>

                        {{--ru--}}

                        <div class="k-portlet" id="local2_ru">
                            <div class="k-portlet__head">
                                <div class="k-portlet__head-label">
                                    <h3 class="k-portlet__head-title">
                                        RU
                                    </h3>
                                </div>
                            </div>

                                <div class="form-group row" >
                                    <div class="col-lg">
                                    <label class="col-form-label col-lg-12">Заголовок картки</label>
                                        <input type="text"
                                               name="card_title2_ru"
                                               maxlength="80"
                                               class="form-control k_maxlength_5"
                                               placeholder=""
                                               value="{{ $data['practicCards'][1]->card_title_ru }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg">
                                    <label class="col-form-label col-lg-12">Короткий опис</label>
                                <textarea class="form-control k_maxlength_5"
                                          name="card_description2_ru"
                                          maxlength="250"
                                          placeholder=""
                                          rows="6">{{ $data['practicCards'][1]->card_description_ru }}</textarea>
                                    </div>
                                </div>

                        </div>

                        {{--us --}}

                        <div class="k-portlet" id="local2_us">
                            <div class="k-portlet__head">
                                <div class="k-portlet__head-label">
                                    <h3 class="k-portlet__head-title">
                                        ENG
                                    </h3>
                                </div>
                            </div>

                                <div class="form-group row">
                                    <div class="col-lg">
                                    <label class="col-form-label col-lg-12">Заголовок картки</label>
                                        <input type="text"
                                               name="card_title2_us"
                                               class="form-control k_maxlength_5"
                                               placeholder=""
                                               maxlength="80"
                                               value="{{ $data['practicCards'][1]->card_title_us }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg">
                                    <label class="col-form-label col-lg-12">Короткий опис</label>

                                <textarea class=" form-control  k_maxlength_5"
                                          name="card_description2_us"
                                          maxlength="250"
                                          placeholder=""
                                          rows="6">{{ $data['practicCards'][1]->card_description_us }}</textarea>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div id="block3" class="col-lg-4 col-md-12    my-2">
                        <div class="col-lg-9 mx-auto admin_card d-flex flex-column align-items-center">
                            <img name="image" src="{{ URL::asset($data['practicCards'][2]->img_path) }}" alt="" class="rounded-circle practice__image ">
                            <div class="card-body mt-3">
                                <h5 class="card-title practice__topic">{{ $data['practicCards'][2]->card_title_ua }}и</h5>
                                <p class="card-text practice__text">{{ $data['practicCards'][2]->card_description_ua }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-12">Заголовок картки</label>
                                <input name="card_title3_ua" type="text" class="form-control k_maxlength_5" maxlength="80" placeholder="" value="{{ $data['practicCards'][2]->card_title_ua }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-12">Короткий опис</label>
                                <textarea name="card_description3_ua" class="form-control k_maxlength_5"  maxlength="250" placeholder="" rows="6">{{ $data['practicCards'][2]->card_description_ua }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-12">Зображення</label>
                                <input type="file" name="img_path3" class="" @if(empty($data['practicCards'][2]->img_path)) required @endif>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-12">Посилання</label>
                                <input type="text" name="card_link3" class="form-control" placeholder="" value="{{ $data['practicCards'][2]->card_link }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-6 col-sm-12 col-form-label">Виберіть додаткову мову</label>
                            <div class="col-lg-6 col-sm-12">
                                <div class="k-checkbox-inline">
                                    <label class="k-checkbox k-checkbox--brand" >
                                        <input  name="local3_ru"
                                                type="checkbox"
                                                value="local3_ru"
                                                loc-name="local_ru"
                                                @if(!empty($data['practicCards'][2]->card_title_ru)) checked @endif
                                        >
                                        RU <span></span>
                                    </label>
                                    <label class="k-checkbox k-checkbox--brand">
                                        <input name="local3_us"
                                               type="checkbox"
                                               value="local3_us"
                                               loc-name="local_us"
                                               @if(!empty($data['practicCards'][2]->card_title_us)) checked @endif
                                        >
                                        ENG <span></span>
                                    </label>

                                </div>
                            </div>
                        </div>

                        {{--ru--}}

                        <div class="k-portlet" id="local3_ru">
                            <div class="k-portlet__head">
                                <div class="k-portlet__head-label">
                                    <h3 class="k-portlet__head-title">
                                        RU
                                    </h3>
                                </div>
                            </div>

                                <div class="form-group row" >
                                    <div class="col-lg">
                                    <label class="col-form-label col-lg-12">Заголовок картки</label>
                                        <input type="text"
                                               name="card_title3_ru"
                                               class="form-control k_maxlength_5"
                                               placeholder=""
                                               maxlength="80"
                                               value="{{ $data['practicCards'][2]->card_title_ru }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg">
                                    <label class="col-form-label col-lg-12">Короткий опис</label>

                                <textarea class="form-control  k_maxlength_5"
                                          name="card_description3_ru"
                                          maxlength="250"
                                          placeholder=""
                                          rows="6">{{ $data['practicCards'][2]->card_description_ru }}</textarea>
                                    </div>
                                </div>

                        </div>

                        {{--us --}}

                        <div class="k-portlet" id="local3_us">
                            <div class="k-portlet__head">
                                <div class="k-portlet__head-label">
                                    <h3 class="k-portlet__head-title">
                                        ENG
                                    </h3>
                                </div>
                            </div>

                                <div class="form-group row">
                                    <div class="col-lg">
                                    <label class="col-form-label col-lg-12">Заголовок картки</label>

                                        <input type="text"
                                               name="card_title3_us"
                                               class="form-control k_maxlength_5"
                                               placeholder=""
                                               maxlength="80"
                                               value="{{ $data['practicCards'][2]->card_title_us }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg">
                                    <label class="col-form-label col-lg-12">Короткий опис</label>
                                <textarea class=" form-control k_maxlength_5"
                                          name="card_description3_us"
                                          maxlength="250"
                                          placeholder=""
                                          rows="6">{{ $data['practicCards'][2]->card_description_us }}</textarea>
                                    </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </form>
   </div>
   {{--<script--}}
  {{--src="https://code.jquery.com/jquery-3.4.1.min.js"--}}
  {{--integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="--}}
  {{--crossorigin="anonymous"></script>--}}

    <!--end::Dashboard 1-->
@endsection
