@extends('layouts.real-estate')
@section('page-title')

    @include('real-estate.partials.page-title',[
    'title' => 'مدیریت مشاور املاک',
    'subtitle' => 'نمایش اطلاعات',
])
@endsection
@section('content')

                <!--begin::Navbar-->
            @include('real-estate.real-estates.top-card')
            <!--end::Navbar-->
                <!--begin::details View-->
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card body-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h3>لیست کارمندان</h3>
                        </div>
                        <!--begin::Card title-->

                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <!--end::Filter-->
                                <!--begin::Add customer-->
                                <a href="{{route('real-estate.staffs.create', $realEstate)}}" class="btn btn-sm btn-flex btn-primary">
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
                                    <!--end::Svg Icon-->افزودن کارمند جدید</a>
                                <!--end::Add customer-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <div class="card-body p-9">
                        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">

                            <!--begin::Card header-->
                            <div class="row">
                                <div class="col-md-12">

                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                                            <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="min-w-20px">#</th>
                                                <th class="min-w-60px">تصویر</th>
                                                <th class="min-w-100px">نام و نام خانوادگی</th>
                                                <th class="min-w-100px">ایمیل</th>
                                                <th class="min-w-100px">موبایل</th>
                                                <th class="min-w-70px">وضعیت</th>
                                                <th class="min-w-50px">عملیات</th>
                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-semibold text-gray-600">
                                            @if(count($realEstate->users) > 0)

                                            @foreach($realEstate->users as $staff)

                                                <tr>
                                                    <td>{{$staff->id}}</td>
                                                    <!--begin::Name=-->
                                                    <td>
                                                        <img src="{!! $staff->webPresent()->avatar !!}" alt="image" width="50">
                                                    </td>
                                                    <!--end::Name=-->
                                                    <!--begin::Name=-->
                                                    <td>
                                                        <a href="{{route('real-estate.users.show',[$realEstate,$staff])}}" class="text-gray-800 text-hover-primary mb-1">{{$staff->name}}</a>

                                                    </td>
                                                    <!--end::Name=-->
                                                    <td>
                                                        <a href="{{route('real-estate.users.show',[$realEstate,$staff])}}" class="text-gray-600 text-hover-primary mb-1 ">{{$staff->mobile}}</a>

                                                    </td>

                                                    <td>
                                                        <a href="{{route('real-estate.users.show',[$realEstate,$staff])}}" class="text-gray-600 text-hover-primary mb-1 ">{{$staff->email}}</a>

                                                    </td>
                                                    <td>
                                                       {!! $staff->webPresent()->status !!}

                                                    </td>

                                                    <!--begin::Action=-->
                                                    <td>
                                                        <!--begin::Edit-->
                                                        <a href="{{route('real-estate.users.show',[$realEstate,$staff])}}"
                                                           class="btn btn-icon btn-light-dark w-30px h-30px me-3">
                                                                <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                      title="مدیریت">
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
                                                         'url' => route('real-estate.staffs.delete',[$realEstate,$staff])
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


