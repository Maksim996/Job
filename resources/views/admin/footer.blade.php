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
                    Нижня частина сторінки
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
        <div class="k-portlet__body">
            <p class='info-seach'>Інформація про нас</p>
            <form id="form-footer" class="k-form k-form--label-right" enctype="multipart/form-data">
                {{ @csrf_field() }}
                @method('PUT')
                <div class="left-column-container">

                    @php($count=0)
                    @for($i = 0; $i < count($data['footer']); $i++)
                        @if($data['footer'][$i]->type == 'left_column')
                            <div class="k-portlet__body left-footer-column partners lef_block" id='info_block' data-id="{{$data['footer'][$i]->footer_id}}">
                                <div class='info-class' id='duplicater'>
                                    <div class="form-group row">
                                        <input style="display: none;" type="text" class="form-control left-type" name="left-type[]" value="{{ $data['footer'][$i]->type }}">
                                        <label class="col-form-label col-lg-3 col-sm-12">Ім'я</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control item-name" placeholder="" name="left-name{{$count}}" value="{{ $data['footer'][$i]->name }}">
                                            <span class="form-text text-muted">Наприклад: локація</span>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-lg-3 col-sm-12 col-form-label">Виберіть посилання чи звичайний текст</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <div class="k-radio-inline">
                                                <label class="k-radio k-radio--bold k-radio--brand">
                                                    <input class="checkLink checkTypeLinTex" type="radio"
                                                           @if(!empty($data['footer'][$i]->link) ) checked="checked" @endif
                                                           id="link" name="contact{{$count}}" value="1">
                                                    Посилання
                                                    <span></span>
                                                </label>
                                                <label class="k-radio k-radio--bold k-radio--brand">
                                                    <input class="checkText checkTypeLinTex"
                                                           @if(empty($data['footer'][$i]->link)) checked="checked" @endif
                                                           type="radio"
                                                           id="text" name="contact{{$count}}" value="0">
                                                    Звичайний текст
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row ckeckLinkText" style="display: none">
                                        <label class="col-form-label col-lg-3 col-sm-12">Посилання</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control item-link"  placeholder="" name="left-link{{$count}}" value="{{ $data['footer'][$i]->link }}">
                                            <span class="form-text text-muted">По кліку переходить за посиланням ...</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">Інформація українською</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control item-content_ua" name="left-content{{$count}}" value="{{ $data['footer'][$i]->content_ua }}">
                                            <span class="form-text text-muted">Наприклад: Україна, м.Суми, вул. Римського-Корсакова,2, СумДУ, каб. Г-1012</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">Інформація російською</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control item-content_ru" name="left-content_ru{{$count}}" value="{{ $data['footer'][$i]->content_ru }}">
                                            <span class="form-text text-muted">Например: Украина, г.Сумы, ул. Римского-Корсакова,2, СумГУ, каб. Г-1012</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">Інформація англійською</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control item-content_us" name="left-content_us{{$count}}" value="{{ $data['footer'][$i]->content_us }}">
                                            <span class="form-text text-muted">For example: Ukraine, c.Sumy, 2, Rymskogo-Korsakova st., SumDU, office. M-1012</span>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-lg-3 col-sm-12">Загрузка фото</label>
                                        <div class="col-lg-3 col-md-3 col-sm-6">
                                            <figure class="figure">
                                                <img id="item-image" src="{{ URL::asset($data['footer'][$i]->img_path) }}" class="preview_img  figure-img img-fluid rounded">
                                                <figcaption class="figure-caption">Поточне зображення</figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-lg-3 col-md-9 col-sm-12">
                                            <input type="file"
                                                   class="inp_footer_img item-image @if(empty($data['footer'][$i]->img_path)) required @endif"
                                                   name="img_path_left{{$count}}"
                                                   value="{{ $data['footer'][$i]->img_path }}"
                                                   accept="image/jpg,image/jpeg,image/png,image/svg+xml">
                                            <span class="form-text text-muted">Розширення зображення: jpg, jpeg, png, svg.</span>
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-center col-lg-12">
                                        <button id="delLeftCol" del-id="{{$data['footer'][$i]->footer_id}}" type="button" class="btn btn-danger">
                                            <span>
                                                <span>Видалити</span>
                                            </span>
                                        </button>

                                    </div>
                                </div>
                            </div>
                            @php($count++)
                        @endif
                    @endfor
                </div>
                <div class="row add-partners k-portlet__body">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-brand k-btn k-btn--icon but-plus" id="info_plus">
                            <span> <i class="la la-plus"></i> <span>Додати</span> </span>
                        </button>
                    </div>
                </div>

                <div class='black-line form-group row'></div>
                <p class='info-seach'>Про нас</p>
                @for($i = 0; $i < count($data['footer']); $i++)
                    @if($data['footer'][$i]->type == 'about_as')
                        <div class="form-group row">
                            <input style="display: none;" type="text" class="form-control about-us-type" name="about-us-type[]" value="{{ $data['footer'][$i]->type }}">
                            <label class="col-form-label col-lg-3 col-sm-12">Посилання</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" class="form-control about-us-link" placeholder="" name="about-us-link" data-id="{{$data['footer'][$i]->footer_id}}" value="{{ $data['footer'][$i]->link }}">
                                <span class="form-text text-muted">По кліку переходить на посиланням ...</span>
                            </div>
                        </div>

                        <div class='black-line form-group row'></div>
                    @endif
                @endfor

                <p class='info-seach'>Соціальні мережі</p>
                <div class="social-networks-container">
                    @php($count=0)

                    @for($i = 0; $i < count($data['footer']); $i++)
                        @if($data['footer'][$i]->type == 'social')
                            <div class="k-portlet__body social-networks partners" id='partners_block' data-id="{{$data['footer'][$i]->footer_id}}">
                                <div   id='duplicater'>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">Назва соціальної мережі</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control social-name" name="social-name{{$count}}" value="{{ $data['footer'][$i]->name }}">
                                            <span class="form-text text-muted">Наприклад: Telegram</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <input style="display: none;" class="form-control social-type" type="text" name="social-type[]" value="{{ $data['footer'][$i]->type }}">
                                        <label class="col-form-label col-lg-3 col-sm-12">Посилання</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control social-link" name="social-link{{$count}}" value="{{ $data['footer'][$i]->link }}">
                                            <span class="form-text text-muted">По кліку зображення переходить на посиланням ...</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">Кольор при наведенні на логотип соціальної мережі</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <input type="text" class="form-control social-color" name="social-color_bg[]" value="{{ $data['footer'][$i]->color_bg }}">
                                            <span class="form-text text-muted">Наприклад: rgb(0,0,0) або black або #000</span>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-form-label col-lg-3 col-sm-12">Загрузка фото</label>
                                        <div class="col-lg-3 col-md-3 col-sm-6">
                                            <figure class="figure">
                                                <img  id="social-image" src="{{ URL::asset($data['footer'][$i]->img_path) }}" class="preview_img  figure-img img-fluid rounded">
                                                <figcaption class="figure-caption">Поточне зображення</figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-lg-3 col-md-9 col-sm-12">
                                            <input type="file"
                                                   name="img_path_social{{$count}}"
                                                   class="inp_footer_img  social-image @if(empty($data['footer'][$i]->img_path)) required @endif">
                                            <span class="form-text text-muted">Розширення зображення: jpg, jpeg, png, svg.</span>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center col-lg-12">
                                        <button id="delLeftCol" del-id="{{$data['footer'][$i]->footer_id}}" type="button" class="btn btn-danger">
                                            <span>
                                                <span>Видалити соціальну мережу</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @php($count++)

                        @endif
                    @endfor

                </div>

                <div class="row add-partners k-portlet__body ">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-brand k-btn k-btn--icon but-plus" id="social_plus">
                            <span> <i class="la la-plus"></i> <span>Додати соціальну мережу</span> </span>
                        </button>
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
