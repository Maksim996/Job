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
                   Новий документ
                </h3>
            </div>
        </div>
        
        <form method="POST" @if($data['type'] == '1') action="{{ URL::route('ad_documents.documents.update', $data['document']->doc_id) }}" @else action="{{ URL::route('ad_documents.documents.update',0) }}" @endif class="k-form k-form--label-right" id='partners_blocks' enctype="multipart/form-data">
              {{ @csrf_field() }}
               @method('PUT') 
            <div class="k-portlet__body" id='documents_block'>
                <div class='documents' id='duplicater'>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Категорія документу:</label>
                        <select class="" required name="cat">
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
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Заголовок документу</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" class="form-control" placeholder="" name="title" @if($data['type'] == '1') value="{{$data['document']->title}}" @endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Виберіть</label>
                        <div class="col-lg-6 col-md-9 col-sm-12" >
                            <input type="radio" class="radio_menu" id="contactChoice1"
                            name="type" value="link" @if ($data['document']->type == 'link') checked @endif>
                            <label for="contactChoice1">Посилання</label>

                            <input type="radio" class="radio_menu" id="contactChoice2"
                            name="type" value="file" @if ($data['document']->type == 'file') checked @endif>
                            <label for="contactChoice2">Файл</label>
                        </div>
                    </div>
                    <div id="linkBar1" class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" class="form-control" name="link" placeholder="" @if($data['type'] == '1') value="{{$data['document']->file_link}}" @endif>
                            <span class="form-text text-muted">По кліку переходить на посиланням ...</span> 
                        </div>
                    </div>
                
                

                    <div id="linkBar2" class="form-group row align-items-center">
                        <label class="col-form-label col-lg-2 col-sm-12">Загрузка документу</label>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                                <input type="file" class="form-control" name="file" value="">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <a class="d-flex align-items-center" href="">
                                <i class="la la-4x la-file-text"></i>
                                <b class="mr-4">
                                    @if($data['type'] == '1')
                                        {{$data['document']->title}}
                                    @endif
                                </b>
                            </a>
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
