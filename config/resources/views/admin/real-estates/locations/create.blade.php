@extends('layouts.admin')
@section('page-title')

    @include('admin.partials.page-title',[
    'title' => 'مدیریت مشاور املاک',
    'subtitle' => 'افزودن آگهی',
])
@endsection
@section('style')

    <link rel="stylesheet" href="{{asset('admin-assets/assets/plugins/custom/leaflet/leaflet.bundle.rtl.css')}}">
    <script src="{{asset('admin-assets/assets/plugins/custom/leaflet/leaflet.bundle.js')}}"></script>
@endsection
@section('content')

                <!--begin::Navbar-->
            @include('admin.real-estates.top-card')
            <!--end::Navbar-->
                <!--begin::details View-->
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <form method="post" action="{{route('admin.locations.store',$realEstate)}}" enctype="multipart/form-data"
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
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'عنوان آگهی','required'=>'required'])

                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.input-text',[
                                                    'name'=> 'title',
                                                    'placeholder'=> 'عنوان آگهی',

                                                    ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'نوع تقاضا','required'=>'required'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.select-2',[
                                                     'id'=>'contract',
                                                    'name'=>'contract',
                                                    'placeholder'=>'نوع تقاضا',
                                                    'items'=>$contracts,
                                                    'value'=> old('contract'),
                                                    ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'نوع ملک','required'=>'required'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.select-2',[
                                                  'id'=>'type',
                                                  'name'=>'type',
                                                  'placeholder'=>'نوع ملک',
                                                  'items'=>$types,
                                                  'value'=> old('type'),
                                                  ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6 " id="house_type">
                                                <div class="mb-10 fv-row house-type-wrapper">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'نوع خانه شخصی'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.horizontal-radiobutton',[
                                                  'items'=>$houseTypes,
                                                  'id'=>'house_type',
                                                  'name'=>'house_type',
                                                  'activeKey'=>\App\Contants\Constant::HOUSE,
                                                      ])
                                                <!--end::Input-->
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-10 fv-row for-sale-wrapper">
                                                    <!--begin::Label-->
                                                @include('real-estate.__components.label',['title'=>'قیمت','required'=>'required'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.input-text',[
                                                   'name'=> 'purchase_price',
                                                   'placeholder'=> ' قیمت',
                                                    ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row for-rent-wrapper" style="display: none">
                                                    <!--begin::Label-->
                                                @include('real-estate.__components.label',['title'=>'مبلغ رهن','required'=>'required'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.input-text',[
                                                   'name'=> 'mortgage',
                                                   'placeholder'=> ' مبلغ رهن',
                                                    ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row for-rent-wrapper" style="display: none">
                                                    <!--begin::Label-->
                                                @include('real-estate.__components.label',['title'=>'مبلغ اجاره','required'=>'required'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.input-text',[
                                                   'name'=> 'rent',
                                                   'placeholder'=> ' مبلغ اجاره',
                                                    ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'طبقه'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.input-text',[
                                                   'type'=> 'number',
                                                   'name'=> 'floor_number',
                                                   'placeholder'=> 'طبقه',

                                                    ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row land-wrapper">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>' پارکینگ'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.horizontal-radiobutton',[
                                                  'items'=>$parking,
                                                  'id'=>'has_parking',
                                                  'name'=>'has_parking',
                                                  'activeKey'=>\App\Contants\Constant::NO,
                                                      ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'متراژ'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.input-text',[
                                                   'name'=> 'total_metrage',
                                                   'placeholder'=> ' متراژ ',

                                                    ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'نوع جهت'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.select-2',[
                                                   'name'=>'direction_type',
                                                   'placeholder'=>'نوع جهت',
                                                   'items'=>$directionTypes,

                                                   ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row land-wrapper">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'متراژ بنا'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.input-text',[
                                                   'name'=> 'infrastructure_metrage',
                                                   'placeholder'=> ' متراژ بنا',

                                                    ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row land-wrapper">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'سال ساخت'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                    @include('admin.__components.datepicker',[
                                                      'name'=> 'construction_year',
                                                       ])
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row land-wrapper">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'تعداد اتاق'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.input-text',[
                                                   'type'=> 'number',
                                                   'name'=> 'room_count',
                                                   'placeholder'=> 'تعداد اتاق',

                                                    ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row land-wrapper">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'آسانسور'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.horizontal-radiobutton',[
                                                   'items'=>$elevator,
                                                   'id'=>'has_elevator',
                                                   'name'=>'has_elevator',
                                                   'activeKey'=>\App\Contants\Constant::NO,
                                                   ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row land-wrapper">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'جنس کف'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.select-2',[
                                                    'name'=>'floor_material',
                                                    'placeholder'=>'جنس کف',
                                                     'items'=>$floorMaterials,
                                                    ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row land-wrapper">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'نوع کابینت'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.select-2',[
                                                   'name'=>'cabinet_material',
                                                   'placeholder'=>'نوع کابینت',
                                                   'items'=>$cabinetMaterials,

                                                   ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row land-wrapper">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>' حیاط'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.horizontal-radiobutton',[
                                                    'items'=>$yard,
                                                    'name'=>'has_yard',
                                                    'activeKey'=>\App\Contants\Constant::YES,
                                                    ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="yard_input">
                                                <div class="mb-10 fv-row land-wrapper yard-wrapper">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'متراژ حیاط'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.input-text',[
                                                   'name'=> 'yard_metrage',
                                                   'placeholder'=> 'متراژ حیاط',

                                                    ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'آدرس','required'=>'required'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.textarea',[
                                                   'name'=> 'address',
                                                   'placeholder'=> 'آدرس'
                                                      ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('admin.__components.label',['title'=>'موقعیت جغرافیایی'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('admin.__components.leaflet-map',[
                                                       'name'=> 'map',
                                                      ])
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-10 fv-row">
                                                            <!--begin::Label-->
                                                        @include('admin.__components.label',['title'=>'توضیحات'])
                                                        <!--end::Label-->
                                                            <!--begin::Input-->
                                                        @include('admin.__components.textarea',[
                                                           'name'=> 'description',
                                                           'placeholder'=> 'توضیحات'
                                                              ])
                                                        <!--end::Input-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Card body-->
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

                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Select2-->
                                    @include('admin.__components.horizontal-radiobutton',[
                                        'items'=>$statuses,
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
                                            <h2>افزودن تصویر </h2>
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

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::details View-->




@endsection
@section('bottom-scripts')
    <script>
        $(document).ready(function () {


            // event change on select contract
            $("select[name='contract']").on('change', function () {


                let contract = $(this).val();

                if (contract == 'for_rent') {
                    //$(".for-sale-wrapper").css('display','block');
                    $(".for-rent-wrapper").fadeIn();
                    $(".for-sale-wrapper").fadeOut();
                } else {
                    //$(".for-sale-wrapper").css('display','none');
                    $(".for-sale-wrapper").fadeIn();
                    $(".for-rent-wrapper").fadeOut();
                }

            });


        });
    </script>

    <script>
        $(document).ready(function () {
            // event change on select contract
            $("select[name='type']").on('change', function () {

                let type = $(this).val();

                if (type == 'land') {
                    $(".land-wrapper").fadeOut();
                } else if (type == 'garden') {
                    $(".land-wrapper").fadeOut();
                } else if (type == 'shop') {
                    $(".land-wrapper").fadeOut();
                } else {
                    $(".land-wrapper").fadeIn();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $("input[name='has_yard']").on('change', function () {

                let has_yard = $(this).val();
                if (has_yard == 'no') {
                    $("input[name='yard_metrage']").attr("readonly","readonly");
                    $("#yard_input").css('opacity', '0.3');
                } else {
                    $("input[name='yard_metrage']").removeAttr("readonly");
                    $("#yard_input").css('opacity', 1);
                }
            });



            // event change on select contract
            $("select[name='type']").on('change', function () {

                let type = $(this).val();

                if (type == 'house') {
                    $("input[name='house_type']").removeAttr("readonly");
                    $("#house_type").css('opacity', 1);
                } else {
                    $("input[name='house_type']").attr("readonly","readonly");
                    $("#house_type").css('opacity', '0.3');
                }
            });
        });
    </script>

@endsection
