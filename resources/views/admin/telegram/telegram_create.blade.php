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
        <form id="telegram_form" action="{{route('ad_telegram.telegram.store')}}"  method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @include('admin.telegram.telegram_form')
        </form>
    </div>
@endsection
