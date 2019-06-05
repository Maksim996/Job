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
                    Новини
                </h3>
                <a class="btn btn-brand k-btn k-btn--icon but-plus" id="m_plus" href="{{ route('ad_news.news.create') }}">
                    <span> <i class="la la-plus"></i> <span>Додати новину</span> </span>
                </a>
            </div>
        </div>
        <div class="k-portlet">
            <div class="k-portlet__head">
                <form class="k-form k-form--fit k-margin-t-20 k-margin-b-20 col-lg-12 row align-items-center">
                    <div class="row  col-lg-8 col-md-12">
                        <label>Назва статті</label>
                        <div class="col-lg-8 k-margin-b-10-tablet-and-mobile">
                            <input type="text" class="form-control k-input" placeholder="Заголовок" data-col-index="0">
                        </div>
                    
                    </div>
                    <div class="row col-lg-4 m-0">
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
                            <th>Дата новини</th>
                            <th>Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['news'] as $new)
                        <tr>
                            <td>{{ $new->title }}</td>
                            <td>{{ $new->date }}</td>
                            <!-- <td nowrap></td> -->
                            <td>
                                <a href="{{ URL::route('ad_news.news.show', $new->inner_news_id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Перегляд">
                                    <i class="la la-pencil"></i>
                                </a>
                                <a href="{{ URL::route('ad_news.news.destroy', $new->inner_news_id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Видалення">
                                    <i class="la la-close"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       
        </div>  
   </div>
    <!--end::Dashboard 1-->
@endsection
