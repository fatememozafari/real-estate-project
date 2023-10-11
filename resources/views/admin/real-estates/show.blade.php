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
                                    <h3 class="fw-bold m-0">اطلاعات مشاور املاک</h3>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Action-->
                                <a href="{{route('admin.real-estates.edit',$realEstate)}}" class="btn btn-sm btn-primary align-self-center">
                                    <i class="fa fa-edit"></i>
                                    ویرایش اطلاعات</a>
                                <!--end::Action-->
                            </div>
                            <!--begin::Card header-->
                            <div class="row">
                                <div class="col-md-12">
                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
                                        <!--begin::Row-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-semibold text-muted">نام مشاور املاک</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <span class="fw-bold fs-6 text-gray-800">{{$realEstate->name}}</span>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Input group-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-semibold text-muted">آدرس</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <span class="fw-semibold text-gray-800 fs-6">{{$realEstate->address}}</span>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-semibold text-muted">شماره مجوز</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <span class="fw-semibold text-gray-800 fs-6">{{$realEstate->license_number}}</span>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-semibold text-muted">مدیر
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 d-flex align-items-center">
                                                <span class="fw-bold fs-6 text-gray-800 me-2">{{$realEstate->manager->name}}</span>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-semibold text-muted">شماره تماس
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 d-flex align-items-center">
                                                <span class="fw-bold fs-6 text-gray-800 me-2">{{$realEstate->manager->mobile}}</span>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-7">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 fw-semibold text-muted">وضعیت</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">
                                                    {!! $realEstate->webPresent()->status !!}</a>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="flex-lg-row-fluid ms-lg-15">--}}
{{--                                        <div class="card card-flush" id="kt_contacts_list">--}}
{{--                                            <!--begin::Card header-->--}}
{{--                                            <div class="card-header pt-7" id="kt_contacts_list_header">--}}
{{--                                                <!--begin::Form-->--}}
{{--                                                <h3>لیست کارمندان</h3>--}}
{{--                                                <!--end::Form-->--}}
{{--                                            </div>--}}
{{--                                            <!--end::Card header-->--}}
{{--                                            <!--begin::Card body-->--}}
{{--                                            <div class="card-body pt-5" id="kt_contacts_list_body">--}}
{{--                                                <!--begin::List-->--}}
{{--                                                <div class="scroll-y me-n5 pe-5 h-300px h-xl-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_contacts_list_header" data-kt-scroll-wrappers="#kt_content, #kt_contacts_list_body" data-kt-scroll-stretch="#kt_contacts_list, #kt_contacts_main" data-kt-scroll-offset="5px" style="max-height: 602px;">--}}
{{--                                                    <!--begin::User-->--}}
{{--                                                    @if(count($realEstate->users) > 0)--}}
{{--                                                    @foreach($realEstate->users as $user)--}}
{{--                                                        <div class="d-flex flex-stack py-4">--}}
{{--                                                            <!--begin::Details-->--}}

{{--                                                            <div class="d-flex align-items-center">--}}
{{--                                                                <!--begin::Avatar-->--}}
{{--                                                                <div class="symbol symbol-40px symbol-circle">--}}
{{--                                                                    <img src="{{$user->webPresent()->avatar}}" alt="image" />--}}

{{--                                                                </div>--}}
{{--                                                                <!--end::Avatar-->--}}
{{--                                                                <!--begin::Details-->--}}
{{--                                                                <div class="ms-4">--}}
{{--                                                                    <a href="{{route('admin.users.show',$user)}}" class="fs-6 fw-bold text-gray-900 text-hover-primary mb-2">--}}
{{--                                                                        {{$user->name}}--}}
{{--                                                                    </a>--}}
{{--                                                                    <div class="fw-semibold fs-7 text-muted">--}}
{{--                                                                        {{$user->mobile}}--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <!--end::Details-->--}}
{{--                                                            </div>--}}

{{--                                                            <!--end::Details-->--}}
{{--                                                        </div>--}}
{{--                                                @endforeach--}}
{{--                                                @endif--}}
{{--                                                <!--end::User-->--}}
{{--                                                    <!--begin::Separator-->--}}
{{--                                                    <div class="separator separator-dashed d-none"></div>--}}
{{--                                                    <!--end::Separator-->--}}
{{--                                                </div>--}}
{{--                                                <!--end::List-->--}}
{{--                                            </div>--}}
{{--                                            <!--end::Card body-->--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
                            </div>

                        </div>

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::details View-->





@endsection
