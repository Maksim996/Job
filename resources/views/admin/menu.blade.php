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
                   Редагування Меню : {{$data['category']->title}}.
                </h3>
            </div>
        </div>
        
        <form method="post" action="{{ URL::route('ad_menus.menus.update', $data['category']->category_id) }}"" class="k-form k-form--label-right"  id ="linkBar">
         {{ @csrf_field() }}
               @method('PUT') 
            
            <div class="k-portlet__body" >
                <div class='title' >
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Title</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" class="form-control" name="catTitle" placeholder="" value="{{$data['category']->title}}">
                        </div>
                    </div>
                    
                </div> 


            <div class="k-portlet__body">
                <div class='partners row' id='linkBar1'>
                    <div class="form-group col-lg-6 col-md-9  col-sm-12">
                        <select class="col-lg-6 col-md-9 ml-5 col-sm-12 sel_change" name="catSelect">  
                                <option value= "external">Зовнішнє</option>                
                                <option value= "news" @if($data['category']->link == 'news') selected @endif>Новини</option>
                                <option value= "home" @if($data['category']->link == 'home') selected @endif >Головна</option>
                                <option value= "documents" @if($data['category']->link == 'documents') selected @endif>Документи</option>                      
                        </select>
                    </div>
                    
                    <div class="form-group row mt-3 extString" >
                        <label class="col-form-label col-lg-6 col-sm-12">Зовнішнє</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <input type="text" class="form-control" name="catLink" placeholder="" @if($data['category']->type == 'type2') value="{{$data['category']->link}}"  @endif>
                        </div>
                    </div>
                </div>           
            </div>
            <div id="dropdownBar">
             <input id="countSubcats" type="text" style="display:none" value="{{count($data['subcategories'])}}">
            
              @foreach($data['subcategories'] as $sub)
                     <div class="partnerss border">
                     
                     <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Title</label>
                        <div class="col-lg-8 col-md-9 col-sm-12">
                         <input type="text" class="subIdsField" name="id[{{$loop->index}}]" style="display:none" value="{{$sub->subcategory_id}}">
                            <input type="text" class="form-control" name="subcatTitle[{{$loop->index}}]" placeholder="" value="{{$sub->title}}">
                           
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class="form-group col-lg-6 col-md-9  col-sm-12">
                            <select class="col-lg-6 col-md-9 ml-5 col-sm-12 sel_change" name="subcatSelect[{{$loop->index}}]">                  
                                <option value= "external">Зовнішнє</option>
                                <option value= "news" @if($sub->link == 'news') selected @endif>Новини</option>
                                <option value= "home" @if($sub->link == 'home') selected @endif>Головна</option>
                                <option value= "documents" @if($sub->link == 'documents') selected @endif>Документи</option>                      
                            </select>
                        </div>
                        
                        <div class="form-group row mt-3 extString">
                            <label class="col-form-label col-lg-6 col-sm-12">Зовнішнє</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <input type="text" class="form-control" name="subcatLink[{{$loop->index}}]" placeholder="" @if($sub->type == 'type1') value="{{$sub->link}}"  @endif>
                            </div>
                        </div>
                    </div>     
                    <div class="form-group row">
                        <button type="button" class="btn btn-brand-minus k-btn k-btn--icon but-minus col-form-label mt-5 col-lg-2 col-sm-12 minus">
                            <span> <i class="la la-minus"></i> <span>Видалити</span> </span>
                        </button>
                    </div>
                     </div> 
                @endforeach    
                
                @if(count($data['subcategories']) == 0)  
                  <div class="k-portlet__body partnerss border" style="display:none;" id="linkBar2">
                 <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12">Title</label>
                        <div class="col-lg-8 col-md-9 col-sm-12">
                            <input type="text" class="form-control" name="subcatTitle[0]" placeholder="" >
                            <input type="text" name="id[0]" style="display:none" value="0">
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class="form-group col-lg-6 col-md-9  col-sm-12">
                            <select class="col-lg-6 col-md-9 ml-5 col-sm-12 sel_change" name="subcatSelect[0]">                  
                                <option value= "External">Зовнішнє</option>
                                <option value= "news" >news</option>
                                <option value= "home" >home</option>
                                <option value= "documents" >Documents</option>                      
                            </select>
                        </div>
                        
                        <div class="form-group row mt-3 extString">
                            <label class="col-form-label col-lg-6 col-sm-12">Зовнішнє</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <input type="text" class="form-control" placeholder="" name="subcatLink[0]">
                            </div>
                        </div>
                    </div>     
                    <div class="form-group row">
                        <button class="btn btn-brand-minus k-btn k-btn--icon but-minus col-form-label mt-5 col-lg-2 col-sm-12 " id="minus">
                            <span> <i class="la la-minus"></i> <span>Видалити</span> </span>
                        </button>
                    </div>
                     </div> 
                    @endif
           
            </div>
            <div class="row add-partners k-portlet__body">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-brand k-btn k-btn--icon but-plus" id="plus">
                        <span> <i class="la la-plus"></i> <span>Додати</span> </span>
                    </button>
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
 
    <!--end::Dashboard 1-->
@endsection
