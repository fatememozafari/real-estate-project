@extends('layouts.admin')
@section('page-title')

    @include('admin.partials.page-title',[
    'title' => 'مدیریت مشاور املاک',
    'subtitle' => 'افزودن آگهی',
])
@endsection

@section('content')

    <!--begin::Navbar-->
          @include('admin.real-estates.top-card')
    <!--end::Navbar-->
    <!--begin::details View-->
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">

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
                            <form method="post" action="{{route('admin.staffs.store',$realEstate)}}"
                                  enctype="multipart/form-data"
                                  class="form d-flex flex-column flex-lg-row">
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
                                                    @include('admin.__components.label',['title'=>'انتخاب کارمند'])
                                                    <!--end::Label-->
                                                        <!--begin::Input-->
                                                    @include('admin.__components.select-2-ajax',[
                                                            'name'=> 'user_id',
                                                            'placeholder'=> ' کارمند',
                                                            'url'=>route('admin.users.ajax-search')
                                                            ])
                                                    <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                    @include('admin.__components.label',['title'=>'وضعیت'])
                                                    <!--end::Label-->
                                                        <!--begin::Input-->
                                                    @include('admin.__components.horizontal-radiobutton',[
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
                                                <a href="{{route('admin.real-estates.staffList',$realEstate)}}"
                                                   type="reset"
                                                   class="btn btn-secondary me-5">انصراف</a>
                                                <!--end::Button-->
                                                <!--begin::Button-->
                                                <button type="submit"
                                                        id="kt_ecommerce_add_category_submit"
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

    </div>
    <!--end::details View-->


@endsection
