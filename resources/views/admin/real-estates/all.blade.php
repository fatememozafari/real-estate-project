@extends('layouts.admin')

@section('page-title')

    @include('admin.partials.page-title',[
    'title' => 'مدیریت مشاورین املاک',
    'subtitle' => 'پنل مدیریت',
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
                            @include('admin.__components.label',['title' => "نام املاک"])
                            <div class="mb-5">
                                @include('admin.__components.input-text',[
                                     'name' => 'name',
                                     'placeholder' => 'نام املاک',
                                     'value' => (request()->has('name'))? request('name') : ''
                                 ])
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-md-3">--}}
{{--                        <div class="form-group">--}}
{{--                            @include('admin.__components.label',['title' => "مدیریت "])--}}
{{--                            <div class="mb-5">--}}
{{--                                @include('admin.__components.select-2-ajax',[--}}
{{--                                     'name' => 'user',--}}
{{--                                     'placeholder' => 'مدیریت',--}}
{{--                                     'url' => route('admin.users.ajax-search'),--}}
{{--                                      'selectedItems' => (request()->has('user')) ? request('user') : ''--}}
{{--                                 ])--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="form-group">--}}
{{--                            @include('admin.__components.label',['title' => "وضعیت "])--}}
{{--                            <div class="mb-5">--}}
{{--                                @include('admin.__components.select-2',[--}}
{{--                                     'name' => 'status',--}}
{{--                                     'placeholder' => 'وضعیت',--}}
{{--                                     'items' => $statuses,--}}
{{--                                     'selectedItems'=> [\App\Contants\Constant::ACTIVE],--}}
{{--                                     'selectedItems' => (request()->has('status'))? request('status') : ''--}}
{{--                                 ])--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-md-3">
                        <div class="form-group mt-10">
                            <a href="{{route('admin.real-estates.all')}}" class="btn btn-sm btn-light-danger">
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
                <h3>فهرست مشاورین املاک</h3>
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--end::Filter-->
                    <!--begin::Add customer-->
                    <a href="{{route('admin.real-estates.create')}}" class="btn btn-sm btn-flex btn-primary">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                        <span class="svg-icon svg-icon-3">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
																<rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                                      rx="5" fill="currentColor"/>
																<rect x="10.8891" y="17.8033" width="12" height="2"
                                                                      rx="1" transform="rotate(-90 10.8891 17.8033)"
                                                                      fill="currentColor"/>
																<rect x="6.01041" y="10.9247" width="12" height="2"
                                                                      rx="1" fill="currentColor"/>
															</svg>
														</span>
                        <!--end::Svg Icon-->افزودن مشاور املاک جدید</a>
                    <!--end::Add customer-->
                </div>
                <!--end::Toolbar-->
            </div>
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
                    <th class="min-w-100px">تصویر</th>
                    <th class="min-w-125px">نام املاک</th>
                    <th class="min-w-125px">آدرس</th>
                    <th class="min-w-125px">مدیریت</th>
                    <th class="min-w-100px">وضعیت</th>
                    <th class="min-w-70px">عملیات</th>
                </tr>
                <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-semibold text-gray-600">
                @if(count($realEstates) > 0)
                    @foreach($realEstates as $realEstate)
                        <tr>
                            <!--begin::Name=-->
                            <td>
                                <a href="{{route('admin.real-estates.show',$realEstate)}}"
                                   class="text-gray-800 text-hover-primary mb-1">{{$realEstate->id}}</a>
                            </td>
                            <!--end::Name=-->
                            <!--begin::Name=-->
                            <td>
                                <img src="{{$realEstate->webPresent()->avatar}}" class="img-fluid" width="60" alt="user_{{$realEstate->id}}_image">

                            </td>
                            <!--end::Name=-->
                            <!--begin::Name=-->
                            <td>
                                <a href="{{route('admin.real-estates.show',$realEstate)}}"
                                   class="text-gray-800 text-hover-primary mb-1">{{$realEstate->name}}</a>
                            </td>
                            <!--end::Name=-->
                            <!--begin::Email=-->
                            <td>
                                <a href="{{route('admin.real-estates.show',$realEstate)}}"
                                   class="text-gray-600 text-hover-primary mb-1">{{$realEstate->address}}</a>
                            </td>
                            <!--end::Email=-->
                            <!--begin::Company=-->
                            <td>{{$realEstate->manager->name}}</td>
                            <!--end::Company=-->
                            <!--begin::Payment method=-->
                            <td>
                                {!! $realEstate->webPresent()->status !!}
                            </td>
                            <!--end::Payment method=-->

                            <!--begin::Action=-->
                            <td>
                                <!--begin::Edit-->
                                <a href="{{route('admin.real-estates.show',$realEstate)}}"
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
                           'url' => route('admin.real-estates.delete',$realEstate)
                            ])
                                <!--end::Delete-->

                            </td>
                            <!--end::Action=-->
                        </tr>
                    @endforeach

                @else
                    <tr>
                        <td colspan="6">
                            <p class="text-danger text-bold text-center">اطلاعاتی ثبت نشده است</p>
                        </td>
                    </tr>
                @endif
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
{{--            {!! $realEstate->withQueryString()->render() !!}--}}
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
