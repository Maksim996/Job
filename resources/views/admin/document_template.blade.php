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
                    {{!empty($data['document']->title)? $data['document']->title:'Новий документ'}}
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
                                            value="{{$sub->subcategory_id}}">{{$sub->title}}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Заголовок документу:</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input  type="text" class="form-control" placeholder="" name="title" @if($data['type'] == '1') value="{{$data['document']->title}}" @endif>
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
                                            {{ strlen($data['document']->title)>= 50 ? substr( $data['document']->title , 0, 47 ).'...' :  $data['document']->title }}
                                        @endif
                                    </b>
                                </a>
                            @endif
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
