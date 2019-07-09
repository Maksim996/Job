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
                   Документи
                </h3>

            </div>
           <a href="{{ URL::route('ad_documents.documents.create') }}" class=" btn btn-brand k-btn k-btn--icon  " id="m_plus">
               <i class="la la-plus"></i>  <span>Створити документ</span>
           </a>
        </div>
        <div class="k-portlet">
            <div class="k-portlet__body">
                <form class="k-form k-form--fit k-margin-t-20 ">
                    <div class="row k-margin-b-20 align-items-end">
                        <div class="col-lg-8 col-md-12 k-margin-b-10-tablet-and-mobile">
                            <label>Пошук документу</label>
                            <input type="text" class="form-control k-input" placeholder="Назва документу" data-col-index="0">
                        </div>
                        <div class="col-lg-4 ml-auto m-0">
                            <button class="btn btn-brand k-btn k-btn--icon" id="m_search">
                                <span> <i class="la la-search"></i> <span>Шукати</span> </span>
                            </button>
                            &nbsp;&nbsp;
                            <button class="btn btn-secondary k-btn k-btn--icon" id="m_reset">
                                <span> <i class="la la-close"></i> <span>Очистити</span> </span>
                            </button>
                        </div>
                    </div>
                    <div class="row k-margin-b-20">
                        <div class="col-lg-6 k-margin-b-10-tablet-and-mobile">
                            <label>Катерогія документу:</label>
                            <select class="form-control k-input" data-col-index="1">
                                <option value="">Вибрати</option>
                                @foreach($data['categorySort'] as $cat)
                                    <option value="{{$cat->title_ua}}">{{$cat->title_ua}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 k-margin-b-10-tablet-and-mobile">
                            <label>Розділ документу:</label>
                            <select class="form-control k-input" data-col-index="2">
                                <option value="">Вибрати</option>
                                @foreach($data['subcategories'] as $cat)
                                    <option value="{{$cat->title_ua}}">{{$cat->title_ua}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="dropdown-divider"></div>
            <div class="k-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="k_table_1">
                    <thead>
                        <tr>
                            <th>Заголовок</th>
                            <th>Категорія</th>
                            <th>Розділ</th>
                            <th>Дата</th>
                            <th>Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data['documents'] as $doc)
                        <tr>
                            <td>{{$doc->title_ua}}</td>
                            @foreach($data['subcategories'] as $sub)
                                @if($sub->subcategory_id == $doc->subcategory_id)
                                    @foreach($data['category'] as $cat)
                                        @if($cat->category_id == $sub->category_id)
                                            <td>{{$cat->title_ua}}</td>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            @foreach($data['subcategories'] as $sub)
                                @if($sub->subcategory_id == $doc->subcategory_id)
                                    <td>{{$sub->title_ua}}</td>
                                @endif
                            @endforeach
                            <td>{{$doc->doc_date}}</td>
                            <td width="75px">
                                <input class="id" value="{{$doc->doc_id}}" style="display:none">
                                <a href="{{ URL::route('ad_documents.documents.show', $doc->doc_id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                                    <i class="la la-pencil"></i>
                                </a>
                                <a class="btn btn-sm btn-clean btn-icon btn-icon-md delete_document" title="View">
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
    <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
            let count = $('tr').length;
           if(count == 2) {
            $('.delete_document').hide();
           }
           else $('.delete_document').show();

            $('.delete_document').on('click', (e) => {
                e.preventDefault();
                let id = $(e.target).closest('td').find('.id').val();
                $(e.target).closest('tr').remove();

                count = $('tr').length;

                if(count == 2){
                    $('.delete_document').hide();
                }
                else $('.delete_document').show();
               $.ajax({
                     headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                   url: "/admin/delete-document",
                   method: 'post',
                   data : {'id':id},
                    dataType: 'json',
                   success (res){
                       window.location.href = '/admin/documents';
                   },
               });

            });
    });

   </script>
    <!--end::Dashboard 1-->
@endsection
