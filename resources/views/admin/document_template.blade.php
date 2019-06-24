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
                    {{!empty($data['document']->title_ua)? $data['document']->title_ua:'Новий документ'}}
                </h3>
            </div>
        </div>

        <form novalidate="novalidate"  method="POST" @if($data['type'] == '1') action="{{ URL::route('ad_documents.documents.update', $data['document']->doc_id) }}" @else action="{{ URL::route('ad_documents.documents.update',0) }}" @endif class="k-form k-form--label-right" id='partners_blocks' enctype="multipart/form-data">
              {{ @csrf_field() }}
               @method('PUT')
            <div class="k-portlet__body" id='documents_block'>
                <div class='documents' id='duplicater'>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Категорія документу:</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <select class="form-control" required name="cat">
                                @foreach($data['subcategories'] as $sub)
                                <option @if($data['type'] == '1')
                                            @if($data['document']->subcategory_id == $sub->subcategory_id)
                                                selected
                                            @endif
                                        @endif
                                            value="{{$sub->subcategory_id}}">
                                            @foreach($data['category'] as $cat)
                                                 @if($cat->category_id ==$sub->category_id )Категорія {{$cat->title_ua}} :@endif
                                            @endforeach
                                        {{$sub->title_ua}}
                                </option>
                            @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Заголовок документу:</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input  type="text" class="form-control" placeholder="" name="title_ua" @if($data['type'] == '1') value="{{$data['document']->title_ua}}" @endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Виберіть</label>
                        <div class=" col-lg-6 col-md-9 col-sm-12">
                            <div class="k-radio-inline">
                                <label class="k-radio  k-radio--brand">
                                    <input type="radio"
                                           class="radio_menu"
                                           id="contactChoice1"
                                           name="type" value="link"
                                           @if(empty($data['document']))
                                           checked="checked"
                                           @elseif($data['document']->type === 'link')
                                           checked="checked"
                                        @endif>
                                    Посилання
                                    <span></span>
                                </label>
                                <label class="k-radio  k-radio--brand" for="contactChoice2">
                                    <input type="radio"
                                           class="radio_menu"
                                           id="contactChoice2"
                                           name="type"
                                           value="file"
                                           @if(empty($data['document']))
                                           @elseif($data['document']->type === 'file')
                                           checked="checked"
                                        @endif>
                                    Файл
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div id="linkBar1" class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" class="form-control " name="link" placeholder="" value="@if($data['type'] == '1' and !empty($data['document'])){{$data['document']->file_link }}@endif">
                            <span class="form-text text-muted">Ведить <i>URL</i> адресу, наприклад: <i>https://www.google.com</i></span>
                        </div>
                    </div>
                    <div id="linkBar2" class="form-group row align-items-center">
                        <label class="col-form-label col-lg-2 col-sm-12">Загрузка документу</label>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="file" name="file" class="form-control-file" >
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            @if( $data['type'] == '1' and $data['document']->type ==='file')
                                <a class="d-flex align-items-center" href="">
                                    <i class="la la-4x la-file-text"></i>
                                    <b class="mr-4">
                                        @if($data['type'] == '1')
                                            {{ strlen($data['document']->title_ua)>= 50 ? substr( $data['document']->title_ua , 0, 47 ).'...' :  $data['document']->title_ua }}
                                        @endif
                                    </b>
                                </a>
                            @endif
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
                                            @if(!empty($data['document']->title_ru)) checked @endif
                                    >
                                    RU <span></span>
                                </label>
                                <label class="k-checkbox k-checkbox--brand">
                                    <input name="local_us"
                                           type="checkbox"
                                           value="local_us"
                                           loc-name="local_us"
                                           @if(!empty($data['document']->title_us)) checked @endif
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
                                <label class="col-form-label col-lg-2 col-sm-12">Заголовок документу російською</label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <input type="text" class="form-control form-title-ru" placeholder="" name="title_ru"
                                           @if(isset($data['document']))
                                           value="{{ $data['document']->title_ru }}"
                                           @else
                                           value=""
                                        @endif
                                    >
                                    <span class="form-text text-muted">Заголовок документу, наприклад: Відділ практики</span>
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
                                <label class="col-form-label col-lg-2 col-sm-12">Заголовок документу англійською</label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <input type="text" class="form-control form-title-us" placeholder="" name="title_us"
                                           @if(isset($data['document']))
                                           value="{{ $data['document']->title_us }}"
                                           @else
                                           value=""
                                        @endif
                                    >
                                    <span class="form-text text-muted">Заголовок документу, наприклад: Відділ практики</span>
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

    <!--end::Dashboard 1-->
@endsection
