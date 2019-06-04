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
                    Партнери
                </h3>
                <a href="{{ URL::route('ad_partners.partners.edit', 0) }}"class="btn btn-brand k-btn k-btn--icon but-plus" id="m_plus">
                    <span> <i class="la la-plus"></i> <span>Додати нового партнера</span> </span>
                </a>
            </div>
        </div>
        <div class="k-portlet">
            <div class="k-portlet__head">
                <form class="k-form k-form--fit k-margin-t-20 k-margin-b-20 col-lg-12 row align-items-center">
                    <div class="row  col-lg-8 col-md-12">
                        <label>Назва партнера</label>
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
                <table class="table table-striped- table-bordered table-hover table-checkable" id="k_table_3">
                    <thead>
                        <tr>
                            <th>Назва партнера</th>

                            <th>Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($data['partners'] as $partners)
                        <tr>
                            <td>{{ $partners->name_brand }}</td>
                            <td width="200">
                                <a href="{{ URL::route('ad_partners.partners.edit', $partners->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                                    <i class="la la-pencil"></i>
                                </a>
                                <a value="{{$partners->id}}" class="btn btn-sm btn-clean btn-icon btn-icon-md delete_partner" title="View">
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
    document.addEventListener("DOMContentLoaded", function(event) { 
            $('.delete_partner').on('click',function(){
                let id = $(this).val();
               $.ajax({
                    url: "{{ URL::route('ad_partners.partners.destroy', $partners->id) }}",
                    method: 'delete',
                    data : {_token: '{{csrf_token()}}'},
                    
                    success: function(res){
                        alert("Success");
                        location.href = "http://job.test/admin/partners"
                    }
                })   
            });
       });

   </script>
    <!--end::Dashboard 1-->
@endsection
