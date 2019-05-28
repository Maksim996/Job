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
                   Документи
                </h3>
                <button class="btn btn-brand k-btn k-btn--icon but-plus" id="m_plus">
                        <span> <i class="la la-plus"></i> <span>Створити документ</span> </span>
                </button>
            </div>
        </div>
        <div class="k-portlet">
            <div class="k-portlet__head">
                <form class="k-form k-form--fit k-margin-t-20 k-margin-b-20 col-lg-12 row align-items-end">
                    <div class="row  col-lg-7 col-md-12">
                        <label>Пошук документу</label>
                        <div class="col-lg-12 row k-margin-b-10-tablet-and-mobile">
                            <input type="text" class="form-control k-input" placeholder="Назва документу" data-col-index="0">
                        </div>
                    </div>
                    <div class="col-lg-2 k-margin-b-10-tablet-and-mobile">
                        <label>Категорія документу:</label>
                        <select class="form-control k-input" data-col-index="1">
                            <option value="">Вибрати</option>
                            <option value="Нормативні">Нормативні</option>
                            <option value="Рада роботодавців">Рада роботодавців</option>
                            <option value="Інші">Інші</option>
                        </select>
                    </div>    
                    <div class="row col-lg-3 ml-auto m-0">
                        <button class="btn btn-brand k-btn k-btn--icon" id="m_search">
                            <span> <i class="la la-search"></i> <span>Шукати</span> </span>
                        </button>
                        &nbsp;&nbsp; 
                        <button class="btn btn-secondary k-btn k-btn--icon" id="m_reset">
                            <span> <i class="la la-close"></i> <span>Очистити</span> </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="k-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="k_table_1">
                    <thead>
                        <tr>
                            <th>Заголовок</th>
                            <th>Категорія</th>
                            <th>Дата</th>
                            <th>Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Gleichner, Ziemann and Gutkowski</td>
                            <td>Нормативні</td>
                            <td>2/12/2018</td>
                            <td nowrap></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
       
        </div>  
   </div>
    <!--end::Dashboard 1-->
@endsection
