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
                    Головна працевлаштування та практика
                </h3>
            </div>
        </div>

        {{--@if($errors->any())--}}
            {{--<div class="alert alert-danger">--}}
                {{--<ul>--}}
                    {{--@foreach($errors->all() as $error)--}}
                        {{--<li>{{ $error }}</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--@endif--}}

        <form method="POST" action="{{ URL::route('ad_practic-header.practic-header.update', $data['practicContent'][0]->content_id) }}" class="k-form k-form--label-right">
            {{ @csrf_field() }}
            @method('PUT')
            <div class="k-portlet__body">
				<div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Заголовок</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" name="title_ua" class="form-control" placeholder="" value="{{ $data['practicContent'][0]->title_ua }}">
                        <span class="form-text text-muted">Основний заголовок на головній сторінці</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Короткий опис</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <textarea class="form-control" name="content_ua" id="k_maxlength_5" maxlength="250" placeholder="" rows="6">{{ $data['practicContent'][0]->content_ua }}</textarea>
                        <span class="form-text text-muted"></span> 
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
                                        @if(!empty($data['practicContent'][0]->title_ru)) checked @endif
                                >
                                RU <span></span>
                            </label>
                            <label class="k-checkbox k-checkbox--brand">
                                <input name="local_us"
                                       type="checkbox"
                                       value="local_us"
                                       @if(!empty($data['practicContent'][0]->title_us)) checked @endif
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
                            <label class="col-form-label col-lg-2 col-sm-12">Основний заголовок</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <input type="text"
                                       name="title_ru"
                                       class="form-control"
                                       placeholder=""
                                       value="{{ $data['practicContent'][0]->title_ru }}">
                                <span class="form-text text-muted">Основний заголовок, наприклад: Відділ практики</span>
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
                                          rows="6">{{ $data['practicContent'][0]->content_ru }}</textarea>
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
                            <label class="col-form-label col-lg-2 col-sm-12">Основний заголовок</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <input type="text"
                                       name="title_us"
                                       class="form-control"
                                       placeholder=""
                                       value="{{ $data['practicContent'][0]->title_us }}">
                                <span class="form-text text-muted">Основний заголовок, наприклад: Відділ практики</span>
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
                                          rows="6">{{ $data['practicContent'][0]->content_us }}</textarea>
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
