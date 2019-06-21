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
                    Анонси
                </h3>


            </div>
           <a class="btn btn-brand k-btn k-btn--icon " id="m_plus" href="{{ route('ad_announcements.announcements.create') }}">
               <span> <i class="la la-plus"></i> <span>Додати анонс</span> </span>
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
                            <th>Дата анонсу</th>
                            <th>Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['announcements'] as $announcement)
                        <tr>
                            <td>{{ $announcement->title_ua }}</td>
                            <td>{{ $announcement->date }}</td>
                            <!-- <td nowrap></td> -->
                            <td>
                                <input class="id" value="{{$announcement->inner_news_id}}" style="display:none">

                                <a href="{{ URL::route('ad_announcements.announcements.show', $announcement->inner_news_id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Перегляд">
                                    <i class="la la-pencil"></i>
                                </a>
                                <a class="btn btn-sm btn-clean btn-icon btn-icon-md delete_announcement" title="Видалення">
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

    <script type="text/javascript" >
    document.addEventListener("DOMContentLoaded", function() {
        let count = $('tr').length;
        if (count == 2) {
            $('.delete_announcement').hide();
        } else $('.delete_announcement').show();
        $('.delete_announcement').on('click', (e) => {
            e.preventDefault();
            let id = $(e.target).closest('td').find('.id').val();
            $(e.target).closest('tr').remove();
            count = $('tr').length;
            console.log(count);
            if (count == 2) {
                $('.delete_announcement').hide();
            } else $('.delete_announcement').show();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/admin/delete-announcement",
                method: 'post',
                data: {
                    'id': id
                },
                dataType: 'json',
                success: function(res) {}
            });
        });
    });
    </script>
    <!--end::Dashboard 1-->
@endsection
