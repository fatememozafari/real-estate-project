@extends('layouts.user')
@section('page-title')

    @include('user.partials.page-title',[
    'title' => 'مدیریت کاربران',
    'subtitle' => 'نمایش اطلاعات',
])
@endsection
@section('content')
    <!--begin::Wrapper-->
    <div class="d-flex flex-column flex-row-fluid">

        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Container-->
            <div class="container-fluid" id="kt_content_container">
                <!--begin::Navbar-->
            @include('user.users.top-card')
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
                                    <h3 class="fw-bold m-0">جزئیات</h3>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Action-->
                                <a href="{{route('user.users.edit',$user)}}" class="btn btn-sm btn-primary align-self-center">
                                    <i class="fa fa-edit"></i>
                                    ویرایش پروفایل</a>
                                <!--end::Action-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body p-9">
                                <!--begin::Row-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">نام و نام خانوادگی</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">{{$user->name}}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">ایمیل</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{$user->email}}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">شماره موبایل
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <span class="fw-bold fs-6 text-gray-800 me-2">{{$user->mobile}}</span>
                                        <span class="badge badge-success">تایید شده</span>
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
                                        <a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">{!! $user->webPresent()->status !!}</a>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::details View-->


            </div>
            <!--end::Container-->
        </div>
        <!--end::Content-->
    </div>

@endsection
