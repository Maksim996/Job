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
                   Наші партнери
                </h3>
            </div>
        </div>
        @if($data['id']!=0)
        <form method="POST" action="{{ URL::route('ad_partners.partners.update', $data['partners']->id) }}" class="k-form k-form--label-right" id='partners_blocks' enctype="multipart/form-data">
       
            {{ @csrf_field() }}
               @method('PUT') 
                 <input type="hidden" name="_method" value="PUT">
            <div class="k-portlet__body" id='partners_block'>
                
                <div class='partners' id='duplicater'>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Ім'я партнера</label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <input type="text" name="name" maxlength="30" class="form-control k_maxlength_5" placeholder="" value="{{$data['partners']->name_brand}}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <input type="text" name="link" class="form-control" value="{{$data['partners']->link}}">
                            <span class="form-text text-muted">По кліку на заголовок переходить на посиланням ...</span> 
                        </div>
                    </div>
                    
                    <div class="form-group row align-items-center">
                        <label class="col-form-label col-lg-2 col-sm-12">Загрузка фото</label>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <figure class="figure">
                                <img id="blah" src="{{asset($data['partners']->img_path) }}" class="preview_img figure-img img-fluid rounded" alt="{{ $data['partners']->name_brand }}">
                                <figcaption class="figure-caption">Поточне зображення</figcaption>
                            </figure>
                        </div>
                        <div class="d-flex  flex-column pb-5 col-lg-6 col-md-6 col-sm-6">
                            <input class="inp_partner_img" type="file" name="img_path" @if(empty($data['partners']->img_path)) required @endif accept="image/jpg,image/jpeg,image/png,image/svg+xml">
                            <span class="form-text text-muted">Розширення зображення: jpg, jpeg, png, svg.</span>
                        </div>
                    </div>

                   
                </div>      
            </div>
             
            <div class="k-portlet__foot">
                <div class="k-form__actions">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-brand">Зберегти</button>
                            <a href="{{ route('ad_partners.partners.index')}}" class="btn btn-outline-secondary">Назад</a>
                        </div>
                    </div>
                </div>
            </div>

        </form>
             <div class="form-group row">
            
            </div>
        @else
        <form method="POST" action="{{ URL::route('ad_partners.partners.update', 0) }}" class="k-form k-form--label-right" id='partners_blocks' enctype="multipart/form-data">
       
            {{ @csrf_field() }}
               @method('PUT') 
                 <input type="hidden" name="_method" value="PUT">
            <div class="k-portlet__body" id='partners_block'>

                <div class='partners' id='duplicater'>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Ім'я партнера</label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <input type="text" name="name" maxlength="30" class="form-control k_maxlength_5" placeholder="" value="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <input type="text" name="link" class="form-control" value="">
                            <span class="form-text text-muted">По кліку на заголовок переходить на посиланням ...</span>
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label class="col-form-label col-lg-2 col-sm-12">Загрузка фото</label>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <figure class="figure">
                                <img id="blah" src="" class="preview_img figure-img img-fluid rounded" alt="">
                                <figcaption class="figure-caption">Поточне зображення</figcaption>
                            </figure>
                        </div>
                        <div class="d-flex  flex-column pb-5 col-lg-6 col-md-6 col-sm-6">
                            <input class="inp_partner_img" type="file" name="img_path" @if(empty($data['partners']->img_path)) required @endif accept="image/jpg,image/jpeg,image/png,image/svg+xml">
                            <span class="form-text text-muted">Розширення зображення: jpg, jpeg, png, svg.</span>
                        </div>
                    </div>
                </div>
            </div>
             
            <div class="k-portlet__foot">
                <div class="k-form__actions">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-brand">Зберегти</button>
                            <a href="{{ route('ad_partners.partners.index')}}" class="btn btn-outline-secondary">Назад</a>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        @endif
                   
   </div>


@endsection
