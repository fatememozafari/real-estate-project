@extends('layouts.real-estate')
@section('page-title')

    @include('real-estate.partials.page-title',[
    'title' => 'مدیریت مشاور املاک',
    'subtitle' => 'افزودن آگهی',
])
@endsection

@section('content')

                <!--begin::Navbar-->
            @include('real-estate.real-estates.top-card')
            <!--end::Navbar-->
                <!--begin::details View-->
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <form method="post" action="{{route('real-estate.staffs.store',$realEstate)}}"
                              enctype="multipart/form-data"
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
                                            <h2>ثبت کاربر جدید</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <form method="post"
                                                      action="{{route('real-estate.staffs.store',$realEstate)}}"
                                                      enctype="multipart/form-data"
                                                      id="kt_ecommerce_add_category_form"
                                                      class="form d-flex flex-column flex-lg-row"
                                                      data-kt-redirect="../../demo15/dist/apps/ecommerce/catalog/categories.html">
                                                @csrf
                                                <!--begin::Main column-->
                                                    <div
                                                        class="d-flex flex-column gap-7 gap-lg-10 flex-row-fluid me-lg-10 ">
                                                        <!--begin::General options-->
                                                        <div class="card card-flush py-4">
                                                            <!--begin::Card body-->
                                                            <div class="card-body pt-0">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-10 fv-row">
                                                                            <!--begin::Label-->
                                                                        @include('real-estate.__components.label',['title'=>'نام و نام خانوادگی'])
                                                                        <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                        @include('real-estate.__components.input-text',[
                                                                             'name'=>'name',
                                                                             'placeholder'=>'نام و نام خانوادگی'
                                                                                 ])
                                                                        <!--end::Input-->
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-10 fv-row">
                                                                            <!--begin::Label-->
                                                                        @include('real-estate.__components.label',['title'=>'موبایل'])
                                                                        <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                        @include('real-estate.__components.input-text',[
                                                                             'name'=>'mobile',
                                                                             'placeholder'=>'موبایل'
                                                                                 ])
                                                                        <!--end::Input-->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-10 fv-row">
                                                                            <!--begin::Label-->
                                                                        @include('real-estate.__components.label',['title'=>'ایمیل'])
                                                                        <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                        @include('real-estate.__components.input-text',[
                                                                             'name'=>'email',
                                                                             'placeholder'=>'ایمیل'
                                                                                 ])
                                                                        <!--end::Input-->
                                                                        </div>
{{--                                                                        <div class="mb-10 fv-row">--}}
{{--                                                                            <!--begin::Label-->--}}
{{--                                                                        @include('real-estate.__components.label',['title'=>'انتخاب کارمند'])--}}
{{--                                                                        <!--end::Label-->--}}
{{--                                                                            <!--begin::Input-->--}}
{{--                                                                        @include('real-estate.__components.select-2-ajax',[--}}
{{--                                                                                'name'=> 'user_id',--}}
{{--                                                                                'placeholder'=> ' کارمند',--}}
{{--                                                                                'url'=>route('admin.users.ajax-search')--}}
{{--                                                                                ])--}}
{{--                                                                        <!--end::Input-->--}}
{{--                                                                        </div>--}}
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-10 fv-row">
                                                                            <!--begin::Label-->
                                                                        @include('real-estate.__components.label',['title'=>'وضعیت'])
                                                                        <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                        @include('real-estate.__components.horizontal-radiobutton',[
                                                                             'items'=>$statuses,
                                                                             'id'=>'status',
                                                                             'name'=>'status',
                                                                             'activeKey'=>\App\Contants\Constant::ACTIVE
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
                                                                    <a href="{{route('real-estate.real-estates.all',$realEstate)}}"
                                                                       type="reset"
                                                                       class="btn btn-secondary me-5">انصراف</a>
                                                                    <!--end::Button-->
                                                                    <!--begin::Button-->
                                                                    <button type="submit" id="kt_ecommerce_add_category_submit"
                                                                            class="btn btn-primary">
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

                                                </form>

                                            </div>
                                        </div>


                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::General options-->


                            </div>
                            <!--end::Main column-->

                        </form>

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::details View-->



@endsection
@section('bottom-scripts')


@endsection
