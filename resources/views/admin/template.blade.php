<!DOCTYPE html>

<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8"/>
        <title>Keen | Dashboard</title>
        <!-- <meta name="description" content="Latest updates and statistic charts"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}" style="display:none">
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
        <!--begin::Fonts -->
        <script
              src="https://code.jquery.com/jquery-3.4.1.min.js"
              integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
              crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
        <script src="{{ URL::asset('css/admin/font.js') }}"></script>
        {{--<script src="{{ URL::asset('js/app.js') }}"></script>--}}

        <!--end::Fonts -->
        <!--begin::Page Vendors Styles(used by this page) -->
        <!-- <link href="../assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" /> -->
        <!--end::Page Vendors Styles -->
        <!--begin:: Global Mandatory Vendors -->
<link href="{{ URL::asset('css/admin/perfect-scrollbar.css') }} " rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('css/admin/dropzone.css') }} " rel="stylesheet" type="text/css">
<link href="{{ URL::asset('css/admin/bootstrap-datepicker3.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('css/admin/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('css/admin/bootstrap-timepicker.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('css/admin/summernote/summernote.css') }}" rel="stylesheet" type="text/css" />
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
    <link href="{{ URL::asset('css/admin/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('css/admin/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('css/admin/flaticon2/flaticon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('css/admin/fontawesome5/css/all.min.css') }}" rel="stylesheet" type="text/css" />
<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Styles(used by all pages) -->
        <link href="{{ URL::asset('css/admin/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('css/admin/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles -->
        <!--begin::Layout Skins(used by all pages) -->
        <link href="{{ URL::asset('css/admin/skins/brand/navy.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('css/admin/skins/aside/navy.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Layout Skins -->
        <link rel="shortcut icon" href="../assets/media/logos/favicon.ico" />
        <link href="{{ URL::asset('css/admin/style.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <!-- end::Head -->
    <!-- begin::Body -->
    <body class="k-header--fixed k-header-mobile--fixed k-subheader--enabled k-subheader--transparent k-aside--enabled k-aside--fixed k-page--loading" >
        <!-- begin:: Header Mobile -->
        <div id="k_header_mobile" class="k-header-mobile k-header-mobile--fixed " >
            <div class="k-header-mobile__logo">
                <a href="index.html">
                    <img alt="Logo" src="../assets/media/logos/logo-6.png"/>
                </a>
            </div>
            <div class="k-header-mobile__toolbar">
                <button class="k-header-mobile__toolbar-toggler k-header-mobile__toolbar-toggler--left" id="k_aside_mobile_toggler"><span></span></button>
            </div>
        </div>
        <!-- end:: Header Mobile -->
        <!-- begin:: Root -->
        <div class="k-grid k-grid--hor k-grid--root">
            <!-- begin:: Page -->
            <div class="k-grid__item k-grid__item--fluid k-grid k-grid--ver k-page">
                <!-- begin:: Aside -->
                @section ('sidebar')
                <div class="k-aside k-aside--fixed k-grid__item k-grid k-grid--desktop k-grid--hor-desktop" id="k_aside">
                    <!-- begin::Aside Brand -->
                    <div class="k-aside__brand k-grid__item " id="k_aside_brand">
                        <div class="k-aside__brand-logo">
                            <a href="{{route('home')}}">
                                Повернутися на сайт
                            </a>
                        </div>
                        <div class="k-aside__brand-tools">
                            <button class="k-aside__brand-aside-toggler k-aside__brand-aside-toggler--left" id="k_aside_toggler"><span></span></button>
                        </div>
                    </div>
                    <!-- end:: Aside Brand -->
                    <!-- begin:: Aside Menu -->
                    <div class="k-aside-menu-wrapper k-grid__item k-grid__item--fluid" id="k_aside_menu_wrapper">
                        <div id="k_aside_menu" class="k-aside-menu " data-kmenu-vertical="1" data-kmenu-scroll="1" data-kmenu-dropdown-timeout="500" >
                            <ul class="k-menu__nav ">

                                <li class="k-menu__item k-menu__item--submenu  " aria-haspopup="true" data-kmenu-submenu-toggle="hover">
                                    <a href="javascript:;" class="k-menu__link k-menu__toggle"><i class="k-menu__link-icon flaticon2-graphic"></i><span class="k-menu__link-text">Меню</span><i class="k-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="k-menu__submenu ">
                                        <span class="k-menu__arrow"></span>
                                        <ul class="k-menu__subnav">
                                            <li class="k-menu__item k-menu__item--parent" aria-haspopup="true" >
                                                <span class="k-menu__link"><span class="k-menu__link-text">Меню</span></span>
                                            </li>
                                            <li class="k-menu__item" aria-haspopup="true" >
                                                <a href="{{ route('menu',array('id' => '3'))}}" class="k-menu__link ">
                                                    <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i>
                                                    <span class="k-menu__link-text">Практика</span>
                                                </a>
                                            </li>
                                            <li class="k-menu__item " aria-haspopup="true" >
                                                <a href="{{ route('menu',array('id' => '4'))}}" class="k-menu__link ">
                                                    <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i>
                                                    <span class="k-menu__link-text">Документи</span>
                                                </a>
                                            </li>
                                            <li class="k-menu__item " aria-haspopup="true" >
                                                <a href="{{ route('menu',array('id' => '5'))}}" class="k-menu__link ">
                                                    <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i>
                                                    <span class="k-menu__link-text">Випускники</span>
                                                </a>
                                            </li>
                                             <li class="k-menu__item " aria-haspopup="true" >
                                                <a href="{{ route('menu',array('id' => '1'))}}" class="k-menu__link ">
                                                    <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i>
                                                    <span class="k-menu__link-text">Головна</span>
                                                </a>
                                            </li>
                                             <li class="k-menu__item " aria-haspopup="true" >
                                                <a href="{{ route('menu',array('id' => '2'))}}" class="k-menu__link ">
                                                    <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i>
                                                    <span class="k-menu__link-text">Новини</span>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </li>

                                
                                <li class="k-menu__item " aria-haspopup="true" >

                                    <a href="{{ route('ad_header.header.index') }}" class="k-menu__link "><i class="k-menu__link-icon flaticon2-gear"></i><span class="k-menu__link-text">Головна</span></a>

                                </li>
                                <!-- Добавить когда вібраній елемент k-menu__item--open k-menu__item--here -->
                                <li class="k-menu__item k-menu__item--submenu  " aria-haspopup="true" data-kmenu-submenu-toggle="hover">
                                    <a href="javascript:;" class="k-menu__link k-menu__toggle"><i class="k-menu__link-icon flaticon2-graphic"></i><span class="k-menu__link-text">Працевлаштування та практика</span><i class="k-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="k-menu__submenu ">
                                        <span class="k-menu__arrow"></span>
                                        <ul class="k-menu__subnav">
                                            <li class="k-menu__item k-menu__item--parent" aria-haspopup="true" >
                                                <span class="k-menu__link"><span class="k-menu__link-text">Працевлаштування та практика</span></span>
                                            </li>
                                            <li class="k-menu__item" aria-haspopup="true" >
                                                <a href="{{ route('ad_practic-header.practic-header.index')}}" class="k-menu__link ">
                                                    <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i>
                                                    <span class="k-menu__link-text">Головна</span>
                                                </a>
                                            </li>
                                            <li class="k-menu__item " aria-haspopup="true" >
                                                <a href="{{ route('ad_practic-cards.practic-cards.index')}}" class="k-menu__link ">
                                                    <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i>
                                                    <span class="k-menu__link-text">Картки</span>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </li>
                                <li class="k-menu__item " aria-haspopup="true" >
                                    <a  href="{{ route('ad_documents.documents.index')}}" class="k-menu__link "><i class="k-menu__link-icon flaticon2-gear"></i><span class="k-menu__link-text">
                                        Документи
                                    </span></a>
                                </li>
                                <li class="k-menu__item " aria-haspopup="true" >
                                    <a  href="{{ route('ad_announcements.announcements.index')}}"  class="k-menu__link "><i class="k-menu__link-icon flaticon2-gear"></i><span class="k-menu__link-text">
                                        Анонси
                                    </span></a>
                                </li>
                                <li class="k-menu__item " aria-haspopup="true" >
                                    <a  href="{{ route('ad_news.news.index')}}" class="k-menu__link "><i class="k-menu__link-icon flaticon2-gear"></i><span class="k-menu__link-text">
                                        Новини
                                    </span></a>
                                </li>
                                <li class="k-menu__item " aria-haspopup="true" >
                                    <a  href="{{ route('ad_partners.partners.index')}}" class="k-menu__link "><i class="k-menu__link-icon flaticon2-gear"></i><span class="k-menu__link-text">
                                        Наши партнери
                                    </span></a>
                                </li>
                                <li class="k-menu__item " aria-haspopup="true" >

                                    <a href="{{ route('ad_footer.footer.index')}}" class="k-menu__link "><i class="k-menu__link-icon flaticon2-gear"></i><span class="k-menu__link-text">
                                        Футер
                                    </span></a>
                                </li>
                                <li class="k-menu__item " aria-haspopup="true">
                                    <a  href="{{ route('logout') }}" class="k-menu__link "><i class="k-menu__link-icon flaticon2-gear"></i>
                                        <span class="k-menu__link-text"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end:: Aside Menu -->
                </div>
                @show
                <!-- end:: Aside -->
                <!-- begin:: Wrapper -->
                <div class="k-grid__item k-grid__item--fluid k-grid k-grid--hor k-wrapper" id="k_wrapper">
                    
                    <div class="k-grid__item k-grid__item--fluid k-grid k-grid--hor">
                        
                        <!-- begin:: Content -->
                        
                            <div class="k-content k-grid__item k-grid__item--fluid" id="k_content">
                                @section ('content')
                                <!--begin::Dashboard 1-->
                                <div class="k-portlet">
                                   <div class="k-portlet__head">
                                        <div class="k-portlet__head-label">
                                            <h3 class="k-portlet__head-title">
                                                Bootstrap Date Picker Examples
                                            </h3>
                                        </div>
                                    </div>
                                    
                                    <form action="#" class="k-form k-form--label-right">
                                            
                                        
                                        <div class="k-portlet__body">

                                        </div>
                                        <div class="k-portlet__foot">
                                            <div class="k-form__actions">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <button type="reset" class="btn btn-brand">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                  
                               </div>
                                <!--end::Dashboard 1-->
                                @show
                            </div>
                        
                        <!-- end:: Content -->
                    </div>
                   
                </div>
                <!-- end:: Wrapper -->
            </div>
            <!-- end:: Page -->
        </div>
        <!-- end:: Root -->

{{--        <script src="{{ URL::asset('js/jquery3_3_1.js') }}" type="text/javascript"></script>--}}
        <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>


        <!-- begin:: Scrolltop -->
        <div id="k_scrolltop" class="k-scrolltop"> <i class="la la-arrow-up"></i> </div>
        <!-- end:: Scrolltop -->
        
        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script src="{{ URL::asset('js/admin/main.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/partners.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/photo.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/footer.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/document.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/menu_edit.js') }}" type="text/javascript"></script>

        <!-- end::Global Config -->
        <!--begin:: Global Mandatory Vendors -->
        <script src="{{ URL::asset('js/admin/general/jquery/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/umd/popper.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/js.cookie.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/tooltip.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/perfect-scrollbar.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/sticky.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/wNumb.js') }}" type="text/javascript"></script>
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->

        <script src="{{ URL::asset('js/admin/general/lib.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/jquery.input.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/repeater.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/summernote.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/bootstrap-timepicker/init.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
        <!-- <script src="../assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js" type="text/javascript"></script> -->

        <script src="{{ URL::asset('js/admin/general/dropzone.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/admin/general/bootstrap-maxlength.js') }}" type="text/javascript"></script>

<!--end:: Global Optional Vendors -->

        <!--begin::Global Theme Bundle(used by all pages) -->

        <script src="{{ URL::asset('js/admin/custom/scripts.bundle.js') }}" type="text/javascript"></script>
        <!--end::Global Theme Bundle -->

        <!--begin::Page Scripts(used by this page) -->


        {{--validation plugin--}}
            <script src="{{ URL::asset('js/admin/general/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript" charset="UTF-8"></script>
        <script src="{{ URL::asset('js/admin/general/jquery-validation/dist/additional-methods.js') }}" type="text/javascript" charset="UTF-8"></script>
        <script src="{{ URL::asset('js/admin/general/jquery-validation/dist/localization/messages_uk.js') }}" type="text/javascript" charset="UTF-8"></script>
        <script src="{{ URL::asset('js/admin//custom/jquery-validation/init.js') }}" type="text/javascript" charset="UTF-8"></script>
        <script src="{{ URL::asset('js/admin//custom/jquery-validation/controls.js') }}" type="text/javascript" charset="UTF-8"></script>

        {{--end validation plugin--}}

        <script src="{{ URL::asset('js/admin/custom/repeater.js') }}" type="text/javascript"></script>

        <script src="{{ URL::asset('js/admin/general/lang-sommernote/summernote-uk-UA.js') }}" type="text/javascript" charset="UTF-8"></script>
        <script src="{{ URL::asset('js/admin/custom/summernote.js') }}" type="text/javascript"></script>


        <script src="{{ URL::asset('js/admin/custom/bootstrap-timepicker.js') }}" type="text/javascript"></script>


        <script src="{{ URL::asset('js/admin/custom/bootstrap-datepicker.js') }}" type="text/javascript"></script>
         <script src="{{ URL::asset('js/admin/general/locales/bootstrap-datetimepicker.ua.js') }}" type="text/javascript" charset="UTF-8"></script>
        <script src="{{ URL::asset('js/admin/custom/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>

        <script src="{{ URL::asset('js/admin/custom/dropzone.js') }}" type="text/javascript"></script>

        <script src="{{ URL::asset('js/admin/custom/bootstrap-maxlength.js') }}" type="text/javascript" class="__web-inspector-hide-shortcut__"></script>

      //  <script src="{{ URL::asset('js/admin/custom/datatables.bundle.js') }}" type="text/javascript"></script>

        <script src="{{ URL::asset('js/admin/custom/advanced-search.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/saveForm.js') }}"></script>
        
        <!-- <script src="../assets/app/scripts/custom/dashboard.js" type="text/javascript"></script> -->
        <!--end::Page Scripts -->
        <!--begin::Global App Bundle(used by all pages) -->
        <!-- <script src="../assets/app/scripts/bundle/app.bundle.js" type="text/javascript"></script> -->
        <!--end::Global App Bundle -->

    </body>
    <!-- end::Body --> 
</html>
