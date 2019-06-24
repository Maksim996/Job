@extends('admin.template')
@section('sidebar')
    @parent
@endsection
@section('content')

    <div class="k-portlet">
        <div class="k-portlet__head align-items-center justify-content-between">
            <div class="k-portlet__head-label">
                <h3 class="k-portlet__head-title">
                    Новий розділ
                </h3>
            </div>
        </div>
        <form id="subcat" action="{{route('ad_subcat.subcat.store')}}"  method="POST">
            {{csrf_field()}}
            @include('admin.menu.menu_form')
        </form>
    </div>
@endsection
