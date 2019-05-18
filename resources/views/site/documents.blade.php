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
                            <a class="nav-link btn-dark active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                            <a class="nav-link btn-dark " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                            <a class="nav-link btn-dark " id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                            <a class="nav-link btn-dark " id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 docum__doc py-3">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <ul class="docum__ul">
                                    <li class="docum__li"><a href="#" class="docum__link">Документ для розробки програмного забезпечення та покарання дизайнерів цих програмних забезпечень(v.1.3.7)</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Фото</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Печать</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Левий за 100$</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Фото</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Печать</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Левий за 100$</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Фото</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Печать</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Левий за 100$</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Печать</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Левий за 100$</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Фото</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Печать</a></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <ul class="docum__ul">
                                    <li class="docum__li"><a href="#" class="docum__link">Документ для розробки програмного забезпечення та покарання дизайнерів цих програмних забезпечень(v.1.3.7)</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Фото</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Печать</a></li>
                                    <li class="docum__li"><a href="#" class="docum__link">Левий за 100$</a></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci deleniti sapiente ea amet quam odit culpa doloremque ab, voluptatibus modi cupiditate laborum odio! Molestiae, recusandae, voluptatem laudantium ipsam earum ab.</div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci deleniti sapiente ea amet quam odit culpa doloremque ab, voluptatibus modi cupiditate laborum odio! Molestiae, recusandae, voluptatem laudantium ipsam earum ab.</div>
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