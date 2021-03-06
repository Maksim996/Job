@extends('site.template')
@section('menu')
	@parent
@endsection

@section('content')



@foreach($data['category'] as $category)
    @if(Route::currentRouteName() == $category->link)
        <div class="a_n__line mb-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 a_n__text-center">
                        <div class="a_n__text-first">{!! !empty($category->{'title_'. $data['locale']}) ? $category->{'title_'. $data['locale']} : $category-> title_ua !!}</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="a_n__text-second">{!! !empty($category->{'title_'. $data['locale']}) ? $category->{'title_'. $data['locale']} : $category-> title_ua !!}</div>
        <div class="a_n__text-third">{!! !empty($category->{'title_'. $data['locale']}) ? $category->{'title_'. $data['locale']} : $category-> title_ua !!}</div>
        <div class="a_n__text-fourth">{!! !empty($category->{'title_'. $data['locale']}) ? $category->{'title_'. $data['locale']} : $category-> title_ua !!}</div>
    @endif
 
        
        

@endforeach
       
       <div class="container document_container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12 docum">
                <img class="img_document" src="{{ URL::asset('images/main/img_doc.jpg')}}" alt="">
                <div class="row justify-content-center">


                    <div class="col-md-12 col-lg-6 px-0 justify-content-center docum__btn">

                        <div class="nav flex-column nav-pills py-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                            @foreach($data['subcategories'] as $category)
                                    {{--<a class="doc_cat nav-link btn-dark @if($loop->index == '0') active @endif"--}}
                                    <a class="nav-link doc_cat btn-dark "
                                       id="v-pills-{{$category->subcategory_id}}-tab"
                                       data-toggle="pill"
                                       href="#v-pills-{{$category->subcategory_id}}"
                                       role="tab"
{{--                                       aria-controls="v-pills-{!! !empty($category->{'title_'. $data['locale']}) ? $category->{'title_'. $data['locale']} : $category-> title_ua !!}"--}}
                                       aria-controls="v-pills-{{$category->subcategory_id}}"
                                       aria-selected="true">
                                        {!! !empty($category->{'title_'. $data['locale']}) ? $category->{'title_'. $data['locale']} : $category-> title_ua !!}
                                    </a>

                            @endforeach

                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 docum__doc px-0 py-3">
                        <div class="tab-content" id="v-pills-tabContent">

                            @foreach($data['subcategories'] as $category)
                                    {{--<div  class="doc_list tab-pane fade show @if($loop->index == '0') active @endif"--}}
                                    <div  class="tab-pane doc_list fade show "
                                          id="v-pills-{{$category->subcategory_id}}"
                                          role="tabpanel"
                                          aria-labelledby="v-pills-{{$category->subcategory_id}}-tab">


                                            <ul class="docum__ul accordion"  id="accordionExample">
                                                @foreach($data['documents'] as $key=> $document)
                                                    @if($document->subcategory_id == $category->subcategory_id)
                                                        @php($title_ua =  preg_replace('/^[0-9]+\./iU', '', $document->title_ua))
                                                    <li class="docum__item">
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <div class="docum__title"  data-toggle="collapse" data-target="#index-{{$document->doc_id}}" aria-expanded="false" aria-controls="collapseOne">
                                                                    {!! !empty($document->{'title_' . $data['locale']}) ? preg_replace('/^[0-9]+\./iU', '', $document->{'title_' . $data['locale']}): $title_ua !!}
                                                                </div>
                                                            </div>

                                                            <div id="index-{{$document->doc_id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                @if($document->subcategory_id == $category->subcategory_id && !empty($document-> placeholder_ua) )
                                                                    <div class="card-body">
                                                                        {!! !empty($document->{'placeholder_' . $data['locale']}) ? $document->{'placeholder_' . $data['locale']}: $document-> placeholder_ua !!}
                                                                    </div>
                                                                @endif

                                                                <div class="card-footer text-muted">
                                                                    @if ($document->type === 'file')
                                                                        <a target="_blank" href="{{$document->file_link}}"
                                                                        download="{!! !empty($document->{'title_' . $data['locale']}) ? $document->{'title_' . $data['locale']}: $document-> title_ua !!}"
                                                                           class=" btn btn-outline-info">{{trans('base.download')}}</a>
                                                                    @else
                                                                    <a target="_blank" href="{{$document->file_link}}"
                                                                       class=" btn btn-outline-info">{{trans('base.gosite')}}</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endif
                                                @endforeach
                                            </ul>

                                     </div>


                            @endforeach

                           </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){

           var qs = parent.document.URL.substring(parent.document.URL.indexOf('?'), parent.document.URL.length);
           if (qs[0] =='?'){
               let v1 = qs.substring(qs.indexOf('=')+1,parent.document.URL.length);
               if ($(v1) !=''){
                   console.log('yes')
                   $(".doc_list").removeClass('active');
                   $(".doc_cat").removeClass('active');
                   $("#v-pills-"+v1+"-tab").addClass("active");
                   $("#v-pills-"+v1).addClass("active");
               }
           }
            else {
               $(".doc_cat").filter(':first').addClass('active');
               $(".doc_list").filter(':first').addClass('active');
            }



        });
    </script>

@endsection




@section('footer')
	@parent
@endsection
