@extends('layouts.admin-auth')
@section('content')
    @include('alerts.error')
    <form class="form w-100" method="post" action="{{route('admin.login')}}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">ورود به پنل ادمین</h1>
            <!--end::Title-->
        </div>
        <!--begin::Heading-->

        <!--begin::Separator-->
        <div class="separator separator-content my-14">
            <span class="w-125px text-gray-500 fw-semibold fs-7">ورود با ایمیل</span>
        </div>
        <!--end::Separator-->
        <!--begin::Input group=-->
        <div class="fv-row mb-8">
            <!--begin::Email-->
           @include('admin.__components.input-text',[
            'name'=>'email',
            'placeholder'=>'Email',
            ])
            <!--end::Email-->
        </div>
        <!--end::Input group=-->
        <div class="fv-row mb-3">
            <!--begin::Password-->
            @include('admin.__components.input-text',[
           'name'=>'password',
           'placeholder'=>'password',
           'type'=>'password'
           ])
            <!--end::Password-->
        </div>
        <!--end::Input group=-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>
            <!--begin::Link-->
            <a href="{{route('admin.reset-password.form')}}" class="link-primary">رمز عبور خود را فراموش کردید؟</a>
            <!--end::Link-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                <!--begin::Indicator label-->
                <span class="indicator-label">ورود</span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
            </button>
        </div>
        <!--end::Submit button-->
    </form>

@endsection
