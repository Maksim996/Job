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
                            @php($i = 0)
                            @foreach($data['subcategories'] as $category)
                                @if($i == 0 /*$loop->index*/)
                                    <a class="nav-link btn-dark active" id="v-pills-{{$category->title}}-tab" data-toggle="pill" href="#v-pills-{{$category->title}}" role="tab" aria-controls="v-pills-{{$category->title}}" aria-selected="true">{{$category->title}}</a>
                                   @else
                                    <a class="nav-link btn-dark" id="v-pills-{{$category->title}}-tab" data-toggle="pill" href="#v-pills-{{$category->title}}" role="tab" aria-controls="v-pills-{{$category->title}}" aria-selected="true">{{$category->title}}</a>
                                @endif
                                @php($i++)
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 docum__doc py-3">
                        <div class="tab-content" id="v-pills-tabContent">
                            @php($i = 0)
                            @foreach($data['subcategories'] as $category)
                                @if($i == 0)
                                    <div class="tab-pane fade show active" id="v-pills-{{$category->title}}" role="tabpanel" aria-labelledby="v-pills-{{$category->title}}-tab">
                                @else
                                    <div class="tab-pane fade show" id="v-pills-{{$category->title}}" role="tabpanel" aria-labelledby="v-pills-{{$category->title}}-tab">
                                @endif
                                        <ul class="docum__ul">
                                            @foreach($data['documents'] as $document)
                                                @if($document->subcategory_id == $category->subcategory_id)
                                                <li class="docum__li"><a href="#" class="docum__link">{{$document->title}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                @php($i++)
                                     </div>
                            @endforeach

                           </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('footer')
	@parent
@endsection