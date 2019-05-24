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

        <form method="POST" action="{{ route('header.store') }}" class="k-form k-form--label-right">
            

            {{ @csrf_field() }}
            <div class="k-portlet__body">
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Картинка для хедера</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" name="img_path" class="form-control" placeholder="" value="{{ old('img_path') }}">
                        <span class="form-text text-muted">URL картинки для хедера</span> 
                    </div>
                </div>
				<div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Заголовок на головній сторінці</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" name="title" class="form-control" placeholder="" value="{{ old('title') }}">
                        <span class="form-text text-muted">Основний заголовок на головній сторінці</span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" name="link" class="form-control" placeholder="" value="{{ old('link') }}">
                        <span class="form-text text-muted">По кліку на заголовок переходить на посиланням ...</span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Короткий опис</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <textarea class="form-control" name="content" id="k_maxlength_5" maxlength="250" placeholder="" rows="6"></textarea>
                        <span class="form-text text-muted">Короткий опис</span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Ключові слова</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" name="keywords" class="form-control" placeholder="" value="{{ old('keywords') }}">
                        <span class="form-text text-muted">Набір ключових слов</span> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12">Короткий опис</label>
                    <div class="col-lg-6 col-md-9 col-sm-12">
                        <input type="text" name="description" class="form-control" placeholder="" value="{{ old('description') }}">
                        <span class="form-text text-muted">Короткий опис для ключових слів</span> 
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
