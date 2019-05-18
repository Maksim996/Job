@extends('site.template')
@section('menu')
	@parent
@endsection

@section('content')

<div class="container">
    <div class="news mt-5">
    	<h1 class="text-center">
    		Новини
    	</h1>
        <div class="news__border mb-3"></div>

        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8 my-4">
            	@for($i=0;$i<5;$i++)

                <div class="card">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="card-title news__title-page">{{$news[$i]->title}}</h5>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ URL::asset($previews[$i]->img_path)}}" class="card-img mt-1" alt="">
                        </div>
                        <div class="col-md-8 mt-1">
                            <div class="card-body">
                                <p class="card-text news__text-page mb-4 py-0">
                                    {{$news[$i]->full_description}}
                                </p>
                                <a href="{{ route('new', array('id' => $news[$i]->inner_news_id)) }}" class="card-link news__link-page">Детальніше...</a>
                                <p class="news__date-page">Дата публікації: {{$news[$i]->date}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="news__border mb-4"></div>
                 @endfor
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-5">
                <nav aria-label="Page navigation example ">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
	</div>
</div>
@endsection


@section('footer')
	@parent
@endsection