@extends('admin.template')
@section('sidebar')
    @parent
@endsection
@section('content')

    <div class="k-portlet">
        <div class="k-portlet__head align-items-center justify-content-between">
            <div class="k-portlet__head-label">
                <h3 class="k-portlet__head-title">
                    Редагування розділу
                </h3>
            </div>
        </div>
        <form action="{{route('ad_subcat.subcat.update',$data['subcategory']->subcategory_id)}}"  method="POST">
            @method('PUT')
            {{csrf_field()}}
            @include('admin.menu.menu_form')
        </form>
    </div>
@endsection
