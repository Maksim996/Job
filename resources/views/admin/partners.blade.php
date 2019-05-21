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
        
        <form action="#" class="k-form k-form--label-right">
            
            <div class="k-portlet__body">
				<div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Основний заголовок </label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" class="form-control" placeholder="">
                        <span class="form-text text-muted">Основний заголовок, наприклад: Відділ практики</span> 
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
                    <label class="col-form-label col-lg-2 col-sm-12">Короткий опис</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <textarea class="form-control" id="k_maxlength_5" maxlength="250" placeholder="" rows="6"></textarea>
                        <span class="form-text text-muted"></span> 
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
                <div class='black-line form-group row'></div>
                <p class='info-seach'>Додаткова інформація для пошукової системи</p>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Ключові слова</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" class="form-control" placeholder="">
                        <span class="form-text text-muted">Ключові слова для пошукової системи(виводити через кому) , наприклад: СумДУ, Сумський державний університет, СумГУ, SSU</span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Опис</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <textarea class="form-control" id="k_maxlength_5" maxlength="250" placeholder="" rows="6"></textarea>
                        <span class="form-text text-muted">Короткий опис сторінки</span> 
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
