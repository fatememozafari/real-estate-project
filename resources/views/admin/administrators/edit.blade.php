@extends('layouts.admin')
@section('page-title')

    @include('admin.partials.page-title',[
    'title' => 'مدیریت ادمین ها',
    'subtitle' => 'ویرایش اطلاعات',
])
@endsection
@section('content')

                <!--begin::Navbar-->
            @include('admin.administrators.top-card')
            <!--end::Navbar-->
                <!--begin::details View-->
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">ویرایش اطلاعات ادمین</h3>
                        </div>
                        <!--end::Card title-->

                    </div>
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <form method="post" action="{{route('admin.admins.update',$admin)}}" enctype="multipart/form-data" id="kt_ecommerce_add_category_form"
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
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'نام', 'class'=> 'required','required'=>1])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.input-text',[
                                                        'name'=> 'first_name',
                                                        'value'=> $admin->first_name,
                                                        ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'نام خانوادگی', 'class'=> 'required','required'=>1])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.input-text',[
                                                        'name'=> 'last_name',
                                                        'value'=> $admin->last_name,
                                                        ])
                                                <!--end::Input-->
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'شماره تماس', 'class'=> 'required','required'=>1])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.input-text',[
                                                        'name'=> 'mobile',
                                                        'value'=> $admin->mobile,
                                                        ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'آدرس ایمیل', 'class'=> 'required','required'=>1])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.input-text',[
                                                        'name'=> 'email',
                                                        'value'=> $admin->email,
                                                        ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'رمز عبور', 'class'=> 'required','required'=>1])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.input-text',[
                                                        'type'=> 'password',
                                                        'name'=> 'password',
                                                        ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'تکرار رمز عبور', 'class'=> 'required','required'=>1])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.input-text',[
                                                        'type'=> 'password',
                                                        'name'=> 'password_confirmation',
                                                        ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-end">
                                            <!--begin::Button-->
                                            <a href="{{route('admin.admins.all')}}" type="reset" class="btn btn-secondary me-5">انصراف</a>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                                ویرایش
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::General options-->

                            </div>
                            <!--end::Main column-->
                            <!--begin::Aside column-->
                            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 " style="background-color: rgba(238,243,247,0.37); padding: 5px">
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
                                    @include('admin.__components.horizontal-radiobutton',[
                                        'items'=> $statuses,
                                        'id'=>'status',
                                        'name'=>'status',
                                        'activeKey'=> $admin->status,
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
                                    @include('admin.__components.image-input',[
                                           'name'=>'avatar',
                                          'imageUrl'=> $admin->webPresent()->avatar,
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

@endsection
