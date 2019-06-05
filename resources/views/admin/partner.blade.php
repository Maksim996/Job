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
        @if($data['id']!=0)
        <form method="POST" action="{{ URL::route('ad_partners.partners.update', $data['partners']->id) }}" class="k-form k-form--label-right" id='partners_blocks' enctype="multipart/form-data">
       
            {{ @csrf_field() }}
               @method('PUT') 
                 <input type="hidden" name="_method" value="PUT">
            <div class="k-portlet__body" id='partners_block'>
                
                <div class='partners' id='duplicater'>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Ім'я партнера</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" name="name" class="form-control" placeholder="" value="{{$data['partners']->name_brand}}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" name="link" class="form-control" value="{{$data['partners']->link}}">
                            <span class="form-text text-muted">По кліку на заголовок переходить на посиланням ...</span> 
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Загрузка фото</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="file" name="img_path" class="form-control">
                        </div>
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
             <div class="form-group row">
                <button type="submit" value="{{$data['partners']->id}}" class="btn btn-brand-minus k-btn k-btn--icon but-minus col-form-label col-lg-2 col-sm-12 " id="brand_minus">
                    <span> <i class="la la-minus"></i> <span>Видалити бренд</span> </span>
                </button>
            </div>
        @else
        <form method="POST" action="{{ URL::route('ad_partners.partners.update', 0) }}" class="k-form k-form--label-right" id='partners_blocks' enctype="multipart/form-data">
       
            {{ @csrf_field() }}
               @method('PUT') 
                 <input type="hidden" name="_method" value="PUT">
            <div class="k-portlet__body" id='partners_block'>
                
                <div class='partners' id='duplicater'>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Ім'я партнера</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" name="name" class="form-control" placeholder="">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Посилання</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" name="link" class="form-control">
                            <span class="form-text text-muted">По кліку на заголовок переходить на посиланням ...</span> 
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Загрузка фото</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="file" name="img_path" class="form-control">
                        </div>
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
        @endif
                   
   </div>

  <!--  <script type="text/javascript">
   document.addEventListener("DOMContentLoaded", function(event) { 
           $('#brand_minus').on('click',function(){
               let id = $(this).val();
              $.ajax({
                   url: "{{ URL::route('ad_partners.partners.destroy', 0) }}",
                   method: 'delete',
                   data : {_token: '{{csrf_token()}}'},
                   
                   success: function(res){
                       alert("Success");
                       location.href = "http://job.test/admin/partners"
                   }
               })   
           });
      });
  
  </script> -->
       
@endsection