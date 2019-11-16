@extends('site.template')
@section('menu')
	@parent
@endsection

@section('content')



        <div class="a_n__line mb-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 a_n__text-center">
                        <div class="a_n__text-first">{{ trans('base.about_as')}}</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">

            <div class="about_container">
                <div class="about_head">
                    <div class="about_text">
                        <h1 class="title">
                            Навчальний відділ практики та інтеграційних зв’язків із замовниками кадрів
                        </h1>
                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus numquam rem sequi! Accusamus cumque debitis dolor dolores ducimus facilis illo illum natus
                            nostrum odit, officia, praesentium veritatis voluptatum. At doloremque dolorum eum eveniet fugiat ipsam laboriosam magni odit praesentium quasi, quis
                            recusandae sed sint tenetur voluptatem? Debitis doloribus dolorum ea hic, illum inventore ipsam laborum magnam minima modi molestiae neque nihil
                            non nostrum odit optio pariatur perferendis quam quo quod rerum soluta ullam voluptas. Doloribus nostrum omnis qui veritatis voluptates!</p>
                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore et, eveniet excepturi nihil nulla praesentium provident sapiente similique voluptatem voluptates!</p>
                    </div>
                    <div class="about_img">
                        <div class="img">
                            <img src="{{ URL::asset('images/about/al.jpg')}}" alt="Євдокимова Альона Вікторівна">
                        </div>
                        <div class="img_description">
                            <p>
                                <b>Євдокимова Альона Вікторівна</b> – начальник навчального відділу практики та інтеграційних зв’язків із замовниками кадрів
                                e-mail: a.yevdokymova@job.sumdu.edu.ua</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="order_task_block">
            <div class="container">
                <h2 class="title">
                    Які наші основні завдання?
                </h2>
                <ul>
                    <li>
                        <span class="icon">
                            <img src="{{ URL::asset('images/about/contract.png')}}" alt="Укладання угод про співпрацю з підприємствами, організаціями та установами;">
                        </span>
                        <p>
                            Укладання угод про співпрацю з підприємствами, організаціями та установами;
                        </p>
                    </li>
                    <li>
                        <span class="icon">
                            <img src="{{ URL::asset('images/about/images.png')}}" alt="Забезпечення єдиних підходів до організації усіх видів практики;">
                        </span>
                        <p>
                            Забезпечення єдиних підходів до організації усіх видів практики;
                        </p>
                    </li>
                    <li>
                        <span class="icon">
                            <img src="{{ URL::asset('images/about/grav-smm.png')}}" alt="Забезпечення кафедр та деканатів супровідною документацією на проведення відповідних практик (наказ, угода тощо);">
                        </span>
                        <p>
                            Забезпечення кафедр та деканатів супровідною документацією на проведення відповідних практик (наказ, угода тощо);
                        </p>
                    </li>
                    <li>
                        <span class="icon">
                            <img src="{{ URL::asset('images/about/cooperation.png')}}" alt="Організація взаємодії та співробітництва з випускниками університету минулих років, у тому числі через асоціації випускників;">
                        </span>
                        <p>
                            Організація взаємодії та співробітництва з випускниками університету минулих років, у тому числі через асоціації випускників;
                        </p>
                    </li>
                </ul>
            </div>

        </div>
        <div class="container">
            <div class="policy_implementation_block">
                <h2 class="title">
                    Ми реалізовуємо політику університету в частині працевлаштування здобувачів вищої освіти та випускників
                </h2>
                <ul>
                    <li>Інформування здобувачів вищої освіти та випускників про вакантні місця роботи відповідно до їхньої фахової підготовки (спеціальності) в тому числі через соцмережі;</li>
                    <li>Проведення консультаційної роботи серед здобувачів вищої освіти з питань їхнього подальшого працевлаштування (майстер-клас по написанню резюме та мотиваційних листів); </li>
                    <li>Організація зустрічей роботодавців та представників ринку праці зі здобувачами вищої освіти та випускниками з питань можливості їхнього подальшого працевлаштування (дні кар’єри, круглі столи, ярмарки вакансій, семінари-практикуми і т.д.);</li>
                    <li>Моніторинг проблем, з якими стикаються здобувачі вищої освіти при працевлаштуванні на перше робоче місце;</li>
                    <li>Участь у роботі комісій з розподілу випускників медичних спеціальностей;</li>
                    <li>Координація моніторингу працевлаштування випускників, в тому числі через бази даних випускників;</li>
                    <li>Координація діяльності факультетів/інститутів та випускових кафедр щодо організації зайнятості здобувачів вищої освіти, які бажають працевлаштуватися протягом навчання.</li>
                </ul>
            </div>

            <div class="employees_block">
                <h2 class="title">
                    Наші кадри
                </h2>
                <ul>
                    <li>
                        <p>
                            <b>Євдокимова Альона Вікторівна</b> – начальник навчального відділу практики та інтеграційних зв’язків із замовниками кадрів
                            <br>e-mail: a.yevdokymova@job.sumdu.edu.ua
                        </p>
                    </li>
                    <li>
                        <p>
                            <b>Горбоконь Валентина Володимирівна</b> – провідний фахівець відділу. Відповідальна за підготовку документації з практичної підготовки
                            <br>e-mail: v.gorbokon@job.sumdu.edu.ua
                        </p>

                    </li>
                    <li>
                        <p>
                            <b>Барабаш Ольга Юріївна</b> – фахівець відділу. Відповідальна за підготовку документації з практичної підготовки
                            <br>e-mail: o.barabash@job.sumdu.edu.ua
                        </p>
                    </li>
                </ul>
            </div>
        </div>

@endsection




@section('footer')
	@parent
@endsection
