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
        
        <form action="#" class="k-form k-form--label-right" id='partners_blocks'>
            
            <div class="k-portlet__body" id='partners_block'>
                <div class='partners' id='duplicater'>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Ім'я партнера</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" class="form-control" placeholder="">
                            <span class="form-text text-muted">По кліку на заголовок переходить на посиланням ...</span> 
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Загрузка фото</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <form enctype="multipart/form-data" method="post">
                                <input type="file"class="form-control">
                            </form> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <button class="btn btn-brand-minus k-btn k-btn--icon but-minus col-form-label col-lg-2 col-sm-12 " id="brand_minus">
                            <span> <i class="la la-minus"></i> <span>Видалити бренд</span> </span>
                        </button>
                    </div>
                </div>      
            </div>
            <div class="row add-partners k-portlet__body">
                <div class="col-lg-12">
                    <button class="btn btn-brand k-btn k-btn--icon but-plus" id="brand_plus">
                        <span> <i class="la la-plus"></i> <span>Додати новий бренд</span> </span>
                    </button>
                </div>
            </div>
            <div class="k-portlet__foot">
                <div class="k-form__actions">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="reset" class="btn btn-brand">Зберегти</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
      
   </div>
 
    <!--end::Dashboard 1-->
@endsection
