@extends('admin.template')
@section('sidebar')
 @parent
@endsection
@section('content')
<!--begin::Dashboard 1-->
    <div class="k-portlet">
       <div class="k-portlet__head align-items-center justify-content-between">
            <div class="k-portlet__head-label">
                <h3 class="k-portlet__head-title">
                    Телеграм
                </h3>
            </div>
            <a class="btn btn-brand k-btn k-btn--icon " id="m_plus" href="{{ route('ad_telegram.telegram.create') }}">
               <span> <i class="la la-plus"></i> <span>Додати новий запис</span> </span>
            </a>
        </div>
        <div class="k-portlet">
            <div class="k-portlet__head">
                <form class="k-form k-form--fit k-margin-t-20 k-margin-b-20 col-lg-12 row align-items-end">
                    <div class="row  col-lg-8 col-md-12">
                        <label>Назва статті</label>
                        <div class="col-lg-12 row k-margin-b-10-tablet-and-mobile">
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
                            <th>Дата публікації</th>
                            <th>Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['telegram'] as $category)
                        <tr>
                            <td>{{ $category->title_ua }}</td>
                            <td width="150">{{ date("d-m-Y", strtotime($category->date)) }}</td>
                            <td width="80">
                                <form action="{{route('ad_telegram.telegram.destroy', $category->inner_news_id)}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    @method('DELETE')
                                    <a href="{{ URL::route('ad_telegram.telegram.edit', $category->inner_news_id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Перегляд">
                                        <i class="la la-pencil"></i>
                                    </a>
                                    <button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md delete_new" title="Видалення">
                                        <i class="la la-close"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       
        </div>  
   </div>


@endsection
