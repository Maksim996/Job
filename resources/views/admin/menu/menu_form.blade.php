

<div class="k-portlet__body">
    <div class="form-group row">
        <label class="col-form-label col-lg-3 col-sm-12">Назва категорії до якої відноситься розділ</label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <input name="category" type="text" class="form-control" placeholder="" value="{{$data['category']->title_ua}}" readonly>
            <input name="categoryId" type="text" class="form-control" style="display: none" placeholder="" value="{{$data['category']->category_id}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3 col-sm-12">Назва розділу (українською)</label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <input name="title_ua" type="text" class="form-control" placeholder=""  @if(!empty($data['subcategory'])) value="{{$data['subcategory']->title_ua}}" @endif>

        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3 col-sm-12">Посилання</label>
        <div class="form-group col-lg-6 col-md-9  col-sm-12">
            <select class="form-control sel_change" name="subcatSelect">
                <option value= "external">Зовнішнє</option>

                <option value= "{{$data['category']->link}}"   @if(!empty($data['subcategory'])) @if($data['subcategory']->link == $data['category']->link) selected @endif @endif>{{$data['category']->title_ua}}</option>
                  </select>
            <div class="form-group row mt-3 extString" style="display:none">
                <div class="col-lg-12 col-md-9 col-sm-12">
                    <label class="col-form-label col-lg-12 col-sm-12">Зовнішнє</label>
                    <input type="text" class="form-control"  @if(!empty($data['subcategory'])) @if($data['subcategory']->type == 'type1') value="{{$data['subcategory']->link}}" @endif @endif placeholder="" name="subcatLink">
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3 col-sm-12">Виберіть додаткову мову</label>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <div class="k-checkbox-inline">
                <label class="k-checkbox k-checkbox--brand" cheched="">
                    <input  name="local_ru"
                            type="checkbox"
                            value="local_ru"
                            loc-name="local_ru"
                            @if(!empty($data['subcategory']->title_ru)) checked @endif
                    >
                    RU <span></span>
                </label>
                <label class="k-checkbox k-checkbox--brand">
                    <input name="local_us"
                           type="checkbox"
                           value="local_us"
                           loc-name="local_us"
                           @if(!empty($data['subcategory']->title_us)) checked @endif
                    >
                    ENG <span></span>
                </label>

            </div>

        </div>
    </div>

    {{--ru--}}

    <div class="k-portlet" id="local_ru" style="display: none;">
        <div class="k-portlet__head">
            <div class="k-portlet__head-label">
                <h3 class="k-portlet__head-title">
                    RU
                </h3>
            </div>
        </div>
        <div class="k-portlet__body ">
            <div class="form-group row">
                 <label class="col-form-label col-lg-3 col-sm-12">Назва розділу (російською)</label>
                <div class="col-lg-6 col-md-9 col-sm-12">

                    <input type="text" class="form-control form-title-ru" placeholder="" name="title_ru"
                           @if(isset($data['subcategory']))
                           value="{{ $data['subcategory']->title_ru }}"
                           @else
                           value=""
                        @endif
                    >
                </div>
            </div>
        </div>
    </div>

    {{--us --}}

    <div class="k-portlet" id="local_us" style="display: none;">
        <div class="k-portlet__head">
            <div class="k-portlet__head-label">
                <h3 class="k-portlet__head-title">
                    ENG
                </h3>
            </div>
        </div>
        <div class="k-portlet__body ">
            <div class="form-group row">
                 <label class="col-form-label col-lg-3 col-sm-12">Назва розділу (англійською)</label>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <input type="text" class="form-control form-title-us" placeholder="" name="title_us"
                           @if(isset($data['subcategory']))
                           value="{{ $data['subcategory']->title_us }}"
                           @else
                           value=""
                        @endif
                    >
                </div>
            </div>
        </div>
    </div>
</div>
<div class="k-portlet__foot">
    <div class="k-form__actions">
        <button type="submit" class="btn btn-primary">Зберегти</button>
        <a href="{{ route('ad_nav.nav.index')}}" class="btn btn-outline-secondary">Відмінити</a>
    </div>
</div>

