@extends('site.template')
@section('menu')
	@parent
@endsection

@section('content')

<div class="container">
    <div class="news mt-5">
    	<h1 class="text-center">
    		Документи
    	</h1>
        <div class="news__border mb-3"></div>

        <div class="row justify-content-center py-4">
            
            	@for($i=0;$i<5;$i++)

                
                 @endfor
                
                <div class="col-md-12 col-xl-10 ">
                    <div id="accordion" class="accord__text">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn " data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Нормативні
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="accord__table my-3">
                                        <li><a href="#">Документ для розробки програмного забезпечення та покарання дизайнерів цих програмних забезпечень(v.1.3.7)</a></li>
                                        <li><a href="#">Фото</a></li>
                                        <li><a href="#">Печать</a></li>
                                        <li><a href="#">Левий за 100$</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn  collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Рада
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="accord__table my-3">
                                        <li><a href="#">Документ для розробки програмного забезпечення та покарання дизайнерів цих програмних забезпечень(v.1.3.7)</a></li>
                                        <li><a href="#">Фото</a></li>
                                        <li><a href="#">Печать</a></li>
                                        <li><a href="#">Левий за 100$</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn  collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Інші
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="accord__table my-3">
                                        <li><a href="#">Документ для розробки програмного забезпечення та покарання дизайнерів цих програмних забезпечень(v.1.3.7)</a></li>
                                        <li><a href="#">Фото</a></li>
                                        <li><a href="#">Печать</a></li>
                                        <li><a href="#">Левий за 100$</a></li>
                                    </ul>
                                </div>
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