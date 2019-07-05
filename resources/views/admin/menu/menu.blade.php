@extends('admin.template')
@section('sidebar')
    @parent
@endsection
@section('content')

    <!--begin::Dashboard 1-->
    <div class="k-portlet">
        <form id="nav_menu" action="{{route('ad_nav.nav.update',$data['category']->category_id)}}"  method="POST">
            @method('PUT')
            {{csrf_field()}}
            <div class="k-portlet__head align-items-center justify-content-between">
                <div class="k-portlet__head-label">
                    <h3 class="k-portlet__head-title">
                        Назва категорії меню: {{$data['category']->title_ua}}
                    </h3>


                </div>
            </div>

            <div class="k-portlet">
                <div class="k-portlet__body">

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Назва категорії (українською)</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input  name="title_ua"
                                    type="text"
                                    class="form-control required k_maxlength_5"
                                    placeholder=""
                                    maxlength="200"
                                    value="{{ $data['category']->title_ua }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Назва категорії (російською)</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input  name="title_ru"
                                    type="text"
                                    class="form-control required k_maxlength_5"
                                    placeholder=""
                                    maxlength="200"
                                    value="{{ $data['category']->title_ru }}">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Назва категорії (англійською)</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input  name="title_us"
                                    type="text"
                                    class="form-control required k_maxlength_5"
                                    placeholder=""
                                    maxlength="200"
                                    value="{{ $data['category']->title_us }}">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Посилання</label>
                        <div class="form-group col-lg-6 col-md-9  col-sm-12">
                            <select class="form-control sel_change" name="catSelect">
                                <option value= "external">Зовнішнє</option>
                                <option value= "document"   @if($data['category']->link == 'document') selected @endif >Документи</option>
                                <option value= "announcements"   @if($data['category']->link == 'announcements') selected @endif >Анонси</option>
                                <option value= "pracevlashtuvannya-praktika"   @if($data['category']->link == 'pracevlashtuvannya-praktika') selected @endif >Працевлаштування та практика</option>
                            </select>
                            <div class="form-group row mt-3 extString" style="display:none">
                                <div class="col-lg-12 col-md-9 col-sm-12">
                                    <label class="col-form-label col-lg-12 col-sm-12">Зовнішнє</label>
                                    <input type="text" class="form-control requiredField" @if($data['category']->type == 'type2') value="{{$data['category']->link}}" @endif placeholder="" name="catLink">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="k-portlet__foot">
                <div class="k-form__actions">
                    <button type="submit" class="btn btn-primary">Зберегти</button>
                    <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">Назад</a>
                </div>
            </div>
        </form>
        <div class="k-portlet tableHide" style="display: none">
            <div class="k-portlet__head ">
                <div class="k-form k-form--fit k-margin-t-20 k-margin-b-20 col-lg-12 row align-items-end ">
                    <div class="row  col-lg-7 col-md-12">
                        <label>Назва розділу</label>
                        <div class="col-lg-12 row k-margin-b-10-tablet-and-mobile">
                            <input type="text" class="form-control k-input" placeholder="Заголовок" data-col-index="0" >
                        </div>
                    </div>
                    <div class="row col-lg-5 m-0 ml-auto">
                        <button class="btn btn-brand k-btn k-btn--icon" id="m_search">
                            <span> <i class="la la-search"></i> <span>Шукати</span> </span>
                        </button>
                        &nbsp;&nbsp;
                        <button class="btn btn-secondary k-btn k-btn--icon" id="m_reset">
                            <span> <i class="la la-close"></i> <span>Очистити</span> </span>
                        </button>
                        &nbsp;&nbsp;
                        <a class="btn btn-brand k-btn k-btn--icon ml-auto" id="m_plus" href="{{ route('ad_nav.nav.create',['id' => $data['category']->category_id])}}">
                            <span> <i class="la la-plus"></i> <span>Додати розділ</span> </span>
                        </a>
                    </div>

                </div>

            </div>
            <div class="k-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="k_table_1">
                    <thead>
                    <tr>
                        <th>Назва розділів</th>
                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['subcategories'] as $subcategory)
                        <tr>
                            <td>{{ $subcategory->title_ua }}</td>
                            <!-- <td nowrap></td> -->
                            <td class="d-flex align-items-center">
                                <input class="id" value="{{$subcategory->category_id}}" style="display:none">

                                <a href="{{ URL::route('ad_subcat.subcat.show', $subcategory->subcategory_id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Перегляд">
                                    <i class="la la-pencil"></i>
                                </a>
                                <form action="{{ URL::route('ad_subcat.subcat.destroy', $subcategory->subcategory_id) }}" method="POST">
                                    @method('DELETE')
                                    {{csrf_field()}}
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
