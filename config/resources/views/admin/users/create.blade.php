@extends('layouts.admin')
@section('page-title')

    @include('admin.partials.page-title',[
    'title' => 'مدیریت کاربران',
    'subtitle' => 'ثبت کاربر',
])

@endsection

@section('content')

    <form method="post" action="{{route('admin.users.store')}}" enctype="multipart/form-data"
          id="kt_ecommerce_add_category_form"
          class="form d-flex flex-column flex-lg-row"
          data-kt-redirect="../../demo15/dist/apps/ecommerce/catalog/categories.html">
    @csrf
    <!--begin::Main column-->
        <div class="d-flex flex-column gap-7 gap-lg-10 flex-row-fluid me-lg-10 ">
            <!--begin::General options-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>درج اطلاعات</h2>
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                            @include('admin.__components.label',['title'=>'نام و نام خانوادگی', 'class'=> 'required','required'=>1])
                            <!--end::Label-->
                                <!--begin::Input-->
                            @include('admin.__components.input-text',[
                                    'name'=> 'name',
                                    'placeholder'=> 'نام و نام خانوادگی',
                                    ])
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
                                     'class'=>'form-control mb-2' ,
                                    'type'=> 'text',
                                    'name'=> 'mobile',
                                    'placeholder'=> 'شماره تماس',
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
                                     'class'=>'form-control mb-2' ,
                                    'type'=> 'text',
                                    'name'=> 'email',
                                    'placeholder'=> 'آدرس ایمیل',
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
                                     'class'=>'form-control mb-2' ,
                                    'type'=> 'password',
                                    'name'=> 'password',
                                    'placeholder'=> 'رمز عبور',
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
                                     'class'=>'form-control mb-2' ,
                                    'type'=> 'password',
                                    'name'=> 'password_confirmation',
                                    'placeholder'=> 'رمز عبور',
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
                        <a href="{{route('admin.users.all')}}" class="btn btn-secondary me-5">انصراف
                        </a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-user-plus"></i>
                            ثبت کاربر
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
            </div>
            <!--end::General options-->


        </div>
        <!--end::Main column-->
        <!--begin::Aside column-->
        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 "
             style="background-color: rgba(238,243,247,0.37); padding: 5px">
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
                    'activeKey'=>\App\Contants\Constant::ACTIVE,
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
                    ])
                <!--end::Card body-->
                </div>
                <!--end::Thumbnail settings-->

            </div>
            <!--end::Aside column-->
        </div>

    </form>

@endsection
