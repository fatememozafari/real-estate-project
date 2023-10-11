@extends('layouts.admin')

@section('page-title')


    @include('admin.partials.page-title',[
    'title' => 'مدیریت مشاورین املاک',
    'subtitle' => "ثبت مشاور املاک"
])
@endsection

@section('style')

    <link rel="stylesheet" href="{{asset('admin-assets/assets/plugins/custom/leaflet/leaflet.bundle.rtl.css')}}">
    <script src="{{asset('admin-assets/assets/plugins/custom/leaflet/leaflet.bundle.js')}}"></script>
@endsection

@section('content')

            <form method="post" action="{{route('admin.real-estates.store')}}" enctype="multipart/form-data"
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
                                    @include('admin.__components.label',['title'=>'نام مشاور املاک'])

                                    <!--end::Label-->
                                        <!--begin::Input-->
                                    @include('admin.__components.input-text',[
                                        'name'=> 'name',
                                        'placeholder'=> 'نام مشاور املاک',
                                        ])
                                    <!--end::Input-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                    @include('admin.__components.label',['title'=>'مدیریت'])
                                    <!--end::Label-->
                                        <!--begin::Input-->
                                    @include('admin.__components.select-2-ajax',[
                                            'name'=> 'user_id',
                                            'placeholder'=> ' انتخاب مدیر',
                                            'url'=>route('admin.users.ajax-search')
                                            ])
                                    <!--end::Input-->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                    @include('admin.__components.label',['title'=>'شماره مجوز'])
                                    <!--end::Label-->
                                        <!--begin::Input-->
                                    @include('admin.__components.input-text',[
                                            'name'=> 'license_number',
                                            'placeholder'=> ' شماره مجوز',
                                            ])
                                    <!--end::Input-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                    @include('admin.__components.label',['title'=>'آدرس'])
                                    <!--end::Label-->
                                        <!--begin::Input-->
                                    @include('admin.__components.textarea',[
                                        'name'=> 'address',
                                        'placeholder'=> 'آدرس',
                                        ])
                                    <!--end::Input-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                    @include('admin.__components.label',['title'=>'طول و عرض جغرافیایی'])
                                    <!--end::Label-->
                                        <!--begin::Input-->
                                    @include('admin.__components.leaflet-map',[
                                        'name'=> 'map',
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
                                <a href="{{route('admin.real-estates.all')}}" type="reset"
                                   class="btn btn-secondary me-5">انصراف</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                                    <i class="fa fa-add"></i>
                                    ثبت
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
                            'items'=>$statuses,
                            'id'=>'status',
                            'name'=>'status',
                            'activeKey'=>\App\Contants\Constant::ACTIVE
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
                        <!--begin::Card  body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                        @include('admin.__components.image-input',[
                            'name'=>'avatar',
                            'image_blank'=>asset('admin-assets/assets/media/svg/files/blank-image.svg'),
                            ])
                        <!--end::Image input-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Thumbnail settings-->

                </div>
                <!--end::Aside column-->

            </form>

@endsection
