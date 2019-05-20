@extends('site.template')
@section('menu')
	@parent
@endsection

@section('content')

<div class="container">
    <div class="news mt-5">
    	<h1 class="text-center">
    		Найближчим часом
    	</h1>
        <div class="news__border mb-3"></div>

        <div class="row flex-wrap justify-content-center">
            
            	@for($i = 0; $i < count($data['announcements']); $i++)
                <div class="anonc_cards preview__card">
                    <div class="card preview__item p-2">
                        <img src="{{ URL::asset($data['previews'][$i]->img_path) }}" alt="" class="rounded card-img-top preview__image">
                        <div class="card-body mt-2 px-0 preview__body">
                            <h5 class="card-text preview__text">{{$data['announcements'][$i]->title}}</h5>
                            <div class="card-text">
                                {{$data['previews'][$i]->short_location}}
                            </div>
                            <div class="card-text">
                                {{$data['announcements'][$i]->date}}
                            </div>
                        </div>
                    </div>
                    <div class="card preview__descr ">
                        <div class="card-body text-center px-2 py-0">
                            <p class="card-text text-left">{{$data['previews'][$i]->short_description}}</p>
                            <a href="{{ route('announcement', array('id' => $data['announcements'][$i]->inner_news_id, 'title' => $data['announcements'][$i]->trans_title)) }}" class="btn btn-outline-primary preview__button mb-2">Детальніше</a>
                        </div>
                    </div>
                </div>
                
                 <div class="news__border mb-4"></div>
                 @endfor

            
        </div>
        {{$data['announcements']->links()}}
        {{--<div class="row">
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
        </div>--}}
	</div>
</div>
@endsection


@section('footer')
	@parent
@endsection