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
        
        <form action="#" class="k-form k-form--label-right">
            
            <div class="k-portlet__body">
				<div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Адреса розшташування відділу</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" class="form-control" placeholder="">
                        <span class="form-text text-muted">Наприклад: Україна, м.Суми, вул. Римського,2, СумДУ, каб. Г-1012</span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Номер телефона для зв'язку</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" class="form-control" placeholder="">
                        <span class="form-text text-muted">Наприклад: +380(0542)111-111</span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Електрона скринька для зв'язку</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" class="form-control" placeholder="">
                        <span class="form-text text-muted">Наприклад: info@job.sumdu.edu.ua</span> 
                    </div>
                </div>
                <div class='black-line form-group row'></div>
                <p class='info-seach'>Соціальні мережі</p>



                <div class="k-portlet__body" id='partners_block'>
                <div class='partners' id='duplicater'>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Назва соціальної мережі</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" class="form-control" placeholder="">
                            <span class="form-text text-muted">По кліку зображення переходить на посиланням ...</span> 
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
                        <button class="btn btn-social-minus k-btn k-btn--icon but-minus col-form-label col-lg-2 col-sm-12 " id="social_minus">
                            <span> <i class="la la-minus"></i> <span>Видалити соціальну мережу</span> </span>
                        </button>
                    </div>
                </div>      
            </div>
            <div class="row add-partners k-portlet__body">
                <div class="col-lg-12">
                    <button class="btn btn-brand k-btn k-btn--icon but-plus" id="social_plus">
                        <span> <i class="la la-plus"></i> <span>Додати соціальну мережу</span> </span>
                    </button>
                </div>
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
