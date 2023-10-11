@extends('layouts.admin')
@section('page-title')

    @include('admin.partials.page-title',[
    'title' => 'مدیریت مشاور املاک',
    'subtitle' => 'نمایش اطلاعات',
])
@endsection
@section('content')

                <!--begin::Navbar-->
            @include('admin.real-estates.top-card')
            <!--end::Navbar-->
                <!--begin::details View-->
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                            <!--begin::Card header-->
                            <div class="card-header cursor-pointer">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">آگهی های مشاور املاک</h3>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Action-->
                                <a href="{{route('admin.locations.create',$realEstate)}}" class="btn btn-sm btn-primary align-self-center">
                                    <i class="fa fa-edit"></i>
                                    ثبت آگهی جدید</a>
                                <!--end::Action-->
                            </div>
                            <!--begin::Card header-->
                            <div class="row">
                                <div class="col-md-12">
                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
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
                                                <th class="min-w-125px">وضعیت</th>
                                                <th class="text-end min-w-70px"></th>
                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-semibold text-gray-600">
                                            @if(count($locations) > 0)
                                                @foreach($realEstate->locations as $location)
                                                <tr>
                                                    <!--begin::Name=-->
                                                    <td>
                                                        <a href="#" class="text-gray-800 text-hover-primary mb-1">{{$location->id}}</a>
                                                    </td>
                                                    <!--end::Name=-->
                                                    <!--begin::Name=-->
                                                    <td>
                                                        <a href="{{route('admin.locations.show',[$realEstate,$location])}}" class="text-gray-800 text-hover-primary mb-1">{{$location->title}}</a>
                                                    </td>
                                                    <!--end::Name=-->
                                                    <!--begin::Email=-->
                                                    <td>
                                                        <a href="{{route('admin.locations.show',[$realEstate,$location])}}" class="text-gray-600 text-hover-primary mb-1">{{$location->webPresent()->contract}}</a>
                                                    </td>
                                                    <!--end::Email=-->
                                                    <!--begin::Company=-->
                                                    <td>
                                                        <a href="{{route('admin.locations.show',[$realEstate,$location])}}" class="text-gray-600 text-hover-primary mb-1">{{$location->webPresent()->type}}</a>

                                                    </td>
                                                    <!--end::Company=-->
                                                    <!--begin::Payment method=-->
                                                    <td>
                                                        {!! $location->webPresent()->status !!}
                                                    </td>
                                                    <!--end::Payment method=-->
                                                    <!--begin::Action=-->
                                                    <td>
                                                        <!--begin::Edit-->



                                                        <a href="{{route('admin.locations.show',[$realEstate,$location])}}"
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
                                                        'url' => route('admin.locations.delete',[$realEstate,$location])
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
{{--                                        {!! $realEstate->locations->render() !!}--}}
                                    </div>
                                    <!--end::Card body-->
                                </div>


                            </div>

                        </div>

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::details View-->




@endsection
