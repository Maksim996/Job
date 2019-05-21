@extends('site.template')
@section('menu')
	@parent
@endsection

@section('content')
       <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-10 docum">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-6 justify-content-center docum__btn">
                        <div class="nav flex-column nav-pills py-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                            @foreach($data['subcategories'] as $category)
                                    <a class="nav-link btn-dark" id="v-pills-{{$category->subcategory_id}}-tab" data-toggle="pill" href="#v-pills-{{$category->subcategory_id}}" role="tab" aria-controls="v-pills-{{$category->title}}" aria-selected="true">{{$category->title}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 docum__doc py-3">
                        <div class="tab-content" id="v-pills-tabContent">

                            @foreach($data['subcategories'] as $category)
                             
                                    <div class="tab-pane fade show" id="v-pills-{{$category->subcategory_id}}" role="tabpanel" aria-labelledby="v-pills-{{$category->subcategory_id}}-tab">
                               
                                        <ul class="docum__ul">
                                            @foreach($data['documents'] as $document)
                                                @if($document->subcategory_id == $category->subcategory_id)
                                                <li class="docum__li"><a href="#" class="docum__link">{{$document->title}}</a></li>
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
           var v1 = qs.substring(qs.indexOf('=')+1,parent.document.URL.length);
    
            $("#v-pills-"+v1+"-tab").addClass("active");
            $("#v-pills-"+v1).addClass("active");
        });
    </script>

@endsection



@section('footer')
	@parent
@endsection