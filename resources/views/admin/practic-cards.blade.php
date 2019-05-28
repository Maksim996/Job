@extends('admin.template')
@section('sidebar')
 @parent
@endsection
@section('content')
<!--begin::Dashboard 1-->
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/media.css') }}">
    <div class="k-portlet">
       <div class="k-portlet__head">
            <div class="k-portlet__head-label">
                <h3 class="k-portlet__head-title">
                    Картки
                </h3>
            </div>
        </div>
        <style>
            .admin_card{
                height: 240px;
            }
        </style>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ URL::route('ad_practic-cards.practic-cards.store') }}" class="k-form">
            {{ @csrf_field() }}
            <div class="k-portlet__body">
                <div class="row mt-5">
                    <div id="block1" class="col-lg-4 col-md-12  mt-2">
                        <div class="col-lg-9 mx-auto admin_card">
                            <img width="140px" src="{{ URL::asset('images/practice/deal.svg') }}" alt="" class="rounded-circle practice__image">
                            
                            <div class="card-body mt-3">
                                <h5 class="card-title practice__topic">Де знайти місце проходження практики?</h5>
                                <p class="card-text practice__text">Практика - це можливість набратись досвіду й знайти своє призначення</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-4 col-sm-12">Заголовок</label>
                                <input name="card_title[]" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-4 col-sm-12">Короткий опис</label>
                                <textarea name="card_description[]" class="form-control" id="k_maxlength_5" maxlength="250" placeholder="" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-4 col-sm-12">Зображення</label>
                                <input name="img_path[]" type="file" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-4 col-sm-12">Посилання</label>
                                <input type="text" name="card_link[]" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div id="block2" class="col-lg-4 col-md-12  mt-2">
                        <div class="col-lg-9 mx-auto admin_card">
                            <img width="140px" src="{{ URL::asset('images/practice/migrate.svg') }}" alt="" class="rounded-circle practice__image ">
                            <div class=" card-body mt-3">
                                <h5 class="card-title practice__topic">Документи для проходження</h5>
                                <p class="card-text practice__text">Все, що Вам потрібно для практики</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-4 col-sm-12">Заголовок</label>
                                <input name="card_title[]" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-4 col-sm-12">Короткий опис</label>
                                <textarea name="card_description[]" class="form-control" id="k_maxlength_5" maxlength="250" placeholder="" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-4 col-sm-12">Зображення</label>
                                <input type="file" name="img_path[]" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-4 col-sm-12">Посилання</label>
                                <input type="text" name="card_link[]" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div id="block3" class="col-lg-4 col-md-12    my-2">
                        <div class="col-lg-9 mx-auto admin_card">
                            <img name="image" width="140px" src="{{ URL::asset('images/practice/share.svg') }}" alt="" class="rounded-circle practice__image ">
                            <div class="card-body mt-3">
                                <h5 class="card-title practice__topic">Центр студенської кар'єри</h5>
                                <p class="card-text practice__text">Актуальні вакансії та пропозиції від роботодавців</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-4 col-sm-12">Заголовок</label>
                                <input name="card_title[]" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-4 col-sm-12">Короткий опис</label>
                                <textarea name="card_description[]" class="form-control" id="k_maxlength_5" maxlength="250" placeholder="" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-4 col-sm-12">Зображення</label>
                                <input type="file" name="img_path[]" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-4 col-sm-12">Посилання</label>
                                <input type="text" name="card_link[]" class="form-control" placeholder="">
                            </div>
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
   </div>
   <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
   <script>

       // function repiat(id){
       //  let id_block = id;
       //  let desc = $(id_block).find('textarea[name="description"]').val();
       //  let title = $(id_block).find('input[name="title"]').val();
       //  let img = $(id_block).find('input[type="file"]')[0];
       //  // var files = evt.target.files;
       //  let text_title =  $(id_block).find('.card-title')[0];
       //  let text_desc =  $(id_block).find('.card-text')[0];
       //  let text_img =  $(id_block).find('practice__image')[0];
       //      text_title .innerHTML=  title !==''? title : text_title.innerHTML;
       //      text_desc.innerHTML= desc !==''? desc : text_desc.innerHTML;
  
       // }
       // $('#block1').on('input','input, textarea', function(){
       //      repiat('#block1');
       // });
       // $('#block2').on('input','input, textarea', function(){
       //      repiat('#block2');
       // });
       // $('#block3').on('input','input, textarea', function(){
       //      repiat('#block3');
       // });
   </script>
    <!--end::Dashboard 1-->
@endsection
