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
                    Головна
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

        <form method="POST" action="{{ URL::route('ad_header.header.update', $data['header'][0]->id) }}" class="k-form k-form--label-right"
            enctype="multipart/form-data">
            {{ @csrf_field() }}
            @method('PUT')
            <div class="k-portlet__body">
				<div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Заголовок головної сторінки</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" name="title_ua" class="form-control" placeholder="" value="{{ $data['header'][0]->title_ua }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" name="link" class="form-control" placeholder="" value="{{ $data['header'][0]->link }}">
                        <span class="form-text text-muted">По кліку на заголовок переходить за посиланням ...</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Короткий опис</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <textarea class="form-control" name="content_ua" id="k_maxlength_5" maxlength="250" placeholder="" rows="6">{{ $data['header'][0]->content_ua }}</textarea>
                        <span class="form-text text-muted">Короткий опис</span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Загрузка фото</label>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <figure class="figure">
                            <img id="blah" src="{{asset($data['header'][0]->img_path) }}" class="figure-img img-fluid rounded" alt="{{ $data['header'][0]->{'content_' . $data['locale']} }}">
                            <figcaption class="figure-caption">Поточне зображення</figcaption>
                        </figure>
                    </div>
                    <div class="d-flex align-items-center pb-5 col-lg-3 col-md-6 col-sm-6">
                        <input type="file" name="img_path" class="form-control-file">
                    </div>

                </div>
                <div class='black-line form-group row'></div>
                <p class='info-seach'>Додаткова інформація для пошукової системи</p>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Ключові слова</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input name="keywords" type="text" class="form-control" placeholder="" value="{{ $data['header'][0]->keywords }}">
                        <span class="form-text text-muted">Ключові слова для пошукової системи(виводити через кому), наприклад: СумДУ, Сумський державний університет, СумГУ, SSU</span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Опис</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <textarea name="description" class="form-control" id="k_maxlength_5" maxlength="250" placeholder="" rows="6">{{ $data['header'][0]->description }}</textarea>
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
                                        @if(!empty($data['header'][0]->title_ru)) checked @endif
                                >
                                RU <span></span>
                            </label>
                            <label class="k-checkbox k-checkbox--brand">
                                <input name="local_us"
                                       type="checkbox"
                                       value="local_us"
                                       loc-name="local_us"
                                       @if(!empty($data['header'][0]->title_us)) checked @endif
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
                        <div class="form-group row" >
                            <label class="col-form-label col-lg-2 col-sm-12">Заголовок головної сторінки російською</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <input type="text"
                                       name="title_ru"
                                       class="form-control"
                                       placeholder=""
                                       value="{{ $data['header'][0]->title_ru }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2 col-sm-12">Короткий опис</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <textarea class="form-control"
                                          name="content_ru"
                                          id="k_maxlength_5"
                                          maxlength="250"
                                          placeholder=""
                                          rows="6">{{ $data['header'][0]->content_ru }}</textarea>
                                <span class="form-text text-muted">Короткий опис</span>
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
                            <label class="col-form-label col-lg-2 col-sm-12">Заголовок головної сторінки англійською</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <input type="text"
                                       name="title_us"
                                       class="form-control"
                                       placeholder=""
                                       value="{{ $data['header'][0]->title_us }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2 col-sm-12">Короткий опис</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <textarea class=" form-control"
                                          name="content_us"
                                          id="k_maxlength_5"
                                          maxlength="250"
                                          placeholder=""
                                          rows="6">{{ $data['header'][0]->content_us }}</textarea>
                                <span class="form-text text-muted">Короткий опис</span>
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

    <!--end::Dashboard 1-->
@endsection
