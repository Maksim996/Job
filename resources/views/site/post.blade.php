@extends('site.template')
@section('menu')
	@parent
@endsection

@section('content')

    <div class="container">
        <div class="news my-5">
            <div class="news__item">
                <div class="row">
                    <div class="col-10 offset-1 my-3">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="">Lorem ib nads ul ihn</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div>Суми, Сумська область, вул.Распутника, будинок 13, квартира 666</div>
                            </div>
                            <div class="col-12 col-md-6 news__data">
                                <div>29 Лютого 1944 року</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mx-auto col-md-12">
                                <div class="slider__main mt-3">
                                    <div class="slider slider-for">
                                        @for($i=0;$i<10;$i++)
                                            <img src="{{URL::asset('images/people-coffee-tea-meeting.png')}}">
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">
                                <div class="slider slider-nav mt-3">
                                        @for($i=0;$i<10;$i++)
                                            <div class=" col"> <img src="{{URL::asset('images/people-coffee-tea-meeting.png')}}" width="150" height="100" ></div>
                                        @endfor
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                <h1>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</h1>
                                <p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>
                                <h2>Header Level 2</h2>
                                <ol>
                                    <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                                    <li>Aliquam tincidunt mauris eu risus.</li>
                                </ol>
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p>
                                </blockquote>
                                <h3>Header Level 3</h3>
                                <ul>
                                    <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                                    <li>Aliquam tincidunt mauris eu risus.</li>
                                </ul>
                                <pre><code>
                            #header h1 a { 
                                display: block; 
                                width: 300px; 
                                height: 80px; 
                            }
                            </code></pre>
                            </div>
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
