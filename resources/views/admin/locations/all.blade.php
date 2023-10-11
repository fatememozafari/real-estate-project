@extends('layouts.admin')
@section('page-title')

    @include('admin.partials.page-title',[
    'title' => 'مدیریت آگهی ها',
    'subtitle' => 'پنل آگهی ها',
])

@endsection
@section('content')
    <!--begin::Card-->
    <div class="card mb-10">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h3>
                    <i class="fa fa-search fs-4 pl-2"></i>
                    جستجوی پیشرفته
                </h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <form action="" method="get" id="remove-empty-values">
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="form-group">
                            @include('admin.__components.label',['title' => "عنوان آگهی"])
                            <div class="mb-5">
                                @include('admin.__components.input-text',[
                                     'name' => 'title',
                                     'placeholder' => 'عنوان آگهی',
                                     'value' => (request()->has('title'))? request('title') : ''
                                 ])
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">

                        <div class="form-group">
                            @include('admin.__components.label',['title' => "نوع تقاضا "])
                            <div class="mb-5">
                                @include('admin.__components.select-2',[
                                     'name' => 'contract',
                                     'placeholder' => 'نوع تقاضا',
                                     'items' => $contracts,
                                     'selectedItems' => (request()->has('contract'))? [request('contract')] : []
                                 ])
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            @include('admin.__components.label',['title' => "نوع ملک "])
                            <div class="mb-5">
                                @include('admin.__components.select-2',[
                                     'name' => 'type',
                                     'placeholder' => 'نوع ملک',
                                     'items' => $types,
                                     'selectedItems' => (request()->has('type'))? [request('type')] : []
                                 ])
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mt-10">
                            <a href="{{url()->current()}}" class="btn btn-sm btn-light-danger">
                                <i class="fa fa-eraser"></i>
                                حذف فیلترها
                            </a>
                            <button type="submit" class="btn btn-sm btn-light-primary">
                                <i class="fa fa-search"></i>
                                جستجو
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h3>فهرست آگهی ها</h3>

            </div>

            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--end::Filter-->

                </div>
                <!--end::Toolbar-->

            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                <!--begin::Table head-->
                <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-20px">#</th>
                    <th class="min-w-125px">عنوان آگهی</th>
                    <th class="min-w-125px">نوع تقاضا</th>
                    <th class="min-w-125px">نوع ملک</th>
                    <th class="min-w-80px">وضعیت</th>
                    <th class="min-w-125px">نام مشاور املاک</th>
                    <th class="min-w-100px">عملیات</th>
                </tr>
                <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-semibold text-gray-600">
                @if(count($locations) > 0)

                    @foreach($locations as $location)
                        <tr>
                            <!--begin::Name=-->
                            <td>
                                <a href="{{route('admin.locations.show',[$location->realEstate,$location])}}"
                                   class="text-gray-800 text-hover-primary mb-1">{{$location->id}}</a>
                            </td>
                            <!--end::Name=-->

                            <!--begin::Email=-->
                            <td>
                                <a href="{{route('admin.locations.show',[$location->realEstate,$location])}}"
                                   class="text-gray-600 text-hover-primary mb-1">{{$location->title}}</a>
                            </td>
                            <!--end::Email=-->
                            <!--begin::Company=-->
                            <td>{{$location->webPresent()->contract}}</td>
                            <!--end::Company=-->
                            <!--begin::Payment method=-->
                            <td>
                                <a href="{{route('admin.locations.show',[$location->realEstate,$location])}}"
                                   class="w-35px me-3">{{$location->webPresent()->type}}</a>
                            </td>
                            <!--end::Payment method=-->
                            <!--begin::Date=-->
                            <td>
                                {!! $location->webPresent()->status !!}</td>
                            <!--end::Date=-->
                            <!--begin::Name=-->
                            <td>
                                <a href="{{route('admin.locations.show',[$location->realEstate,$location])}}"
                                   class="text-gray-800 text-hover-primary mb-1">{{$location->realEstate->name}}</a>
                            </td>
                            <!--end::Name=-->
                            <!--begin::Action=-->
                            <td>
                                <!--begin::Edit-->
                                <a href="{{route('admin.locations.show',[$location->realEstate,$location])}}"
                                   class="btn btn-icon btn-light-dark w-30px h-30px me-3">
                                        <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="مدیریت">
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <i class="fa fa-layer-group"></i>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                </a>
                                <!--end::Edit-->
                                <!--begin::Delete-->
                                @include('admin.__components.delete-link',[
                                'refresh' => true,
                                 'url' => route('admin.locations.delete',[$location,$location->realEstate])
                                  ])
                            <!--end::Delete-->
                            </td>
                            <!--end::Action=-->
                        </tr>
                    @endforeach
                @endif
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
            {!! $locations->withQueryString()->render() !!}
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

@endsection

@section('bottom-scripts')

    <script>
        $('#remove-empty-values').submit(function () {
            $(this).find(':input').filter(function () {
                return !this.value;
            }).attr('disabled', 'disabled');
            return true;
        });
    </script>

@endsection
