@extends('layouts.user')
@section('page-title')

    @include('user.partials.page-title',[
    'title' => 'مدیریت کاربران',
    'subtitle' => 'ویرایش اطلاعات',
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
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">ویرایش اطلاعات کاربر</h3>
                        </div>
                        <!--end::Card title-->

                    </div>
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <form method="post" action="{{route('user.users.update',$user)}}" enctype="multipart/form-data" id="kt_ecommerce_add_category_form"
                              class="form d-flex flex-column flex-lg-row"
                              data-kt-redirect="../../demo15/dist/apps/ecommerce/catalog/categories.html">
                        @csrf
                        <!--begin::Main column-->
                            <div class="d-flex flex-column gap-7 gap-lg-10 flex-row-fluid me-lg-10 ">
                                <!--begin::General options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->

                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('user.__components.label',['title'=>'نام و نام خانوادگی', 'class'=> 'required','required'=>1])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('user.__components.input-text',[
                                                        'name'=> 'name',
                                                        'value'=> $user->name,
                                                        ])
                                                <!--end::Input-->
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('user.__components.label',['title'=>'شماره تماس', 'class'=> 'required','required'=>1])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('user.__components.input-text',[
                                                        'name'=> 'mobile',
                                                        'value'=> $user->mobile,
                                                        ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('user.__components.label',['title'=>'آدرس ایمیل', 'class'=> 'required','required'=>1])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('user.__components.input-text',[
                                                        'name'=> 'email',
                                                        'value'=> $user->email,
                                                        ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('user.__components.label',['title'=>'رمز عبور', 'class'=> 'required','required'=>1])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('user.__components.input-text',[
                                                        'type'=> 'password',
                                                        'name'=> 'password',
                                                        ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('user.__components.label',['title'=>'تکرار رمز عبور', 'class'=> 'required','required'=>1])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('user.__components.input-text',[
                                                        'type'=> 'password',
                                                        'name'=> 'password_confirmation',
                                                        ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::General options-->
                                <div class="d-flex justify-content-end">
                                    <!--begin::Button-->
                                    <a href="{{route('user.users.show',$user)}}" type="reset" class="btn btn-secondary me-5">انصراف</a>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                        ویرایش
                                    </button>
                                    <!--end::Button-->
                                </div>

                            </div>
                            <!--end::Main column-->
                            <!--begin::Aside column-->
                            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 ">
                                <!--begin::Status-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2 class="required">وضعیت</h2>
                                        </div>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <div class="rounded-circle bg-success w-15px h-15px"
                                                 id="kt_ecommerce_add_category_status"></div>
                                        </div>
                                        <!--begin::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Select2-->
                                    @include('user.__components.horizontal-radiobutton',[
                                        'items'=> $statuses,
                                        'id'=>'status',
                                        'name'=>'status',
                                        'activeKey'=> $user->status,
                                        ])
                                    <!--end::Select2-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Status-->
                                <!--begin::Thumbnail settings-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>افزودن تصویر</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body text-center pt-0">
                                        <!--begin::Image input-->
                                    @include('user.__components.image-input',[
                                           'name'=>'avatar',
                                          'imageUrl'=> $user->webPresent()->avatar,
                                      ])
                                    <!--end::Card body-->
                                    </div>
                                </div>
                                <!--end::Thumbnail settings-->

                            </div>
                            <!--end::Aside column-->

                        </form>
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
