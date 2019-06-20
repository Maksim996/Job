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
            <p class='info-seach'>Left column</p>
            <form id="form-footer" class="k-form k-form--label-right" enctype="multipart/form-data">
                {{ @csrf_field() }}
                @method('PUT')
                <div class="left-column-container">


                    @for($i = 0; $i < count($data['footer']); $i++)
                        <h1>dd</h1>
                        @if($data['footer'][$i]->type == 'left_column')
                            <div class="k-portlet__body left-footer-column partners" id='info_block' data-id="{{$data['footer'][$i]->footer_id}}">
                                <div class='info-class' id='duplicater'>
                                    <div class="form-group row">
                                        <input style="display: none;" type="text" class="form-control left-type" name="left-type[]" value="{{ $data['footer'][$i]->type }}">
                                        <label class="col-form-label col-lg-2 col-sm-12">Ім'я</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <input type="text" class="form-control item-name" placeholder="" name="left-name[]" value="{{ $data['footer'][$i]->name_ua }}">
                                            <span class="form-text text-muted">Наприклад: локація</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <input type="text" class="form-control item-link" placeholder="" name="left-link[]" value="{{ $data['footer'][$i]->link }}">
                                            <span class="form-text text-muted">По кліку переходить на посиланням ...</span>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2 col-sm-12">Текст</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <input type="text" class="form-control item-content" placeholder="" name="left-content[]" value="{{ $data['footer'][$i]->content }}">
                                            <span class="form-text text-muted">Наприклад: Україна, м.Суми, вул. Римського,2, СумДУ, каб. Г-1012</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2 col-sm-12">Загрузка фото</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <input type="file" class="form-control item-image" name="img_path" value="{{ $data['footer'][$i]->img_path }}">
                                        </div>
                                        <img width="50px" id="item-image" src="{{ URL::asset($data['footer'][$i]->img_path) }}"/>
                                    </div>
                                    <div class="form-group row">
                                        <button id="delLeftCol" del-id="{{$data['footer'][$i]->footer_id}}" type="button" class="btn btn-social-minus k-btn k-btn--icon but-minus col-form-label col-lg-2 col-sm-12 ">
                                            <span>
                                                <i class="la la-minus"></i> <span>Видалити</span>
                                            </span>
                                        </button>

                                    </div>
                                </div>
                            </div>
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
                            <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <input type="text" class="form-control about-us-link" placeholder="" name="about-us-link[]" data-id="{{$data['footer'][$i]->footer_id}}" value="{{ $data['footer'][$i]->link }}">
                                <span class="form-text text-muted">По кліку переходить на посиланням ...</span>
                            </div>
                        </div>

                        <div class='black-line form-group row'></div>
                    @endif
                @endfor

                <p class='info-seach'>Соціальні мережі</p>
                <div class="social-networks-container">
                    @for($i = 0; $i < count($data['footer']); $i++)
                        @if($data['footer'][$i]->type == 'social')
                            <div class="k-portlet__body social-networks" id='partners_block' data-id="{{$data['footer'][$i]->footer_id}}">
                                <div class='partners' id='duplicater'>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2 col-sm-12">Назва соціальної мережі</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <input type="text" class="form-control social-name" name="social-name[]" value="{{ $data['footer'][$i]->name }}">
                                            <span class="form-text text-muted">Наприклад: Telegram</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <input style="display: none;" class="form-control social-type" type="text" name="social-type[]" value="{{ $data['footer'][$i]->type }}">
                                        <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <input type="text" class="form-control social-link" name="social-link[]" value="{{ $data['footer'][$i]->link }}">
                                            <span class="form-text text-muted">По кліку зображення переходить на посиланням ...</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2 col-sm-12">Кольор при наведенні на логотип соціальної мережі</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <input type="text" class="form-control social-color" name="social-color_bg[]" value="{{ $data['footer'][$i]->color_bg }}">
                                            <span class="form-text text-muted">Наприклад: rgb(0,0,0) або black або #000</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2 col-sm-12">Загрузка фото</label>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <input type="file" name="img_path" class="form-control social-image">
                                        </div>
                                        <img width="50px" id="social-image" src="{{ URL::asset($data['footer'][$i]->img_path) }}"/>
                                    </div>
                                    <div class="form-group row">
                                        <button id="delSocial" del-id="{{$data['footer'][$i]->footer_id}}" type="button" class="btn btn-social-minus k-btn k-btn--icon but-minus col-form-label col-lg-2 col-sm-12 ">
                                            <span> <i class="la la-minus"></i> <span>Видалити соціальну мережу</span> </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>

                <div class="row add-partners k-portlet__body">
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
