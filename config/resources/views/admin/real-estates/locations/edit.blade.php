@extends('layouts.admin')

@section('page-title')

    @include('admin.partials.page-title',[
    'title' => 'مدیریت آگهی ها',
    'subtitle' => 'ویرایش اطلاعات',
])
@endsection
@section('style')

    <link rel="stylesheet" href="{{asset('admin-assets/assets/plugins/custom/leaflet/leaflet.bundle.rtl.css')}}">
    <script src="{{asset('admin-assets/assets/plugins/custom/leaflet/leaflet.bundle.js')}}"></script>
@endsection
@section('content')
    <!--begin::Navbar-->
    @include('admin.real-estates.locations.top-card')
    <!--end::Navbar-->
    <!--begin::details View-->
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">ویرایش اطلاعات آگهی</h3>
            </div>
            <!--end::Card title-->

        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-9">
            <form method="post" action="{{route('admin.locations.update',[$realEstate,$location ])}}"
                  enctype="multipart/form-data" id="kt_ecommerce_add_category_form"
                  class="form d-flex flex-column flex-lg-row"
                  data-kt-redirect="../../demo15/dist/apps/ecommerce/catalog/categories.html">
            @csrf
            <!--begin::Main column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 flex-row-fluid me-lg-10 ">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                    @include('admin.__components.label',['title'=>'عنوان آگهی'])

                                    <!--end::Label-->
                                        <!--begin::Input-->
                                    @include('admin.__components.input-text',[
                                        'name'=> 'title',
                                        'value'=> $location->title,
                                        ])
                                    <!--end::Input-->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                    @include('admin.__components.label',['title'=>'نوع تقاضا'])
                                    <!--end::Label-->
                                        <!--begin::Input-->
                                    @include('admin.__components.select-2',[
                                        'id'=>'contract',
                                        'name'=>'contract',
                                        'items'=>$contracts,
                                        'selectedItems'=>[$location->contract],
                                        ])
                                    <!--end::Input-->
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                    @include('admin.__components.label',['title'=>'نوع ملک'])
                                    <!--end::Label-->
                                        <!--begin::Input-->
                                    @include('admin.__components.select-2',[
                                      'name'=>'type',
                                      'id'=>'type',
                                      'items'=>$types,
                                      'selectedItems'=>[$location->type],

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
                                      'activeKey'=>[$location->house_type],
                                          ])
                                    <!--end::Input-->
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-10 fv-row for-sale-wrapper">
                                        <!--begin::Label-->
                                    @include('real-estate.__components.label',['title'=>'قیمت'])
                                    <!--end::Label-->
                                        <!--begin::Input-->
                                    @include('real-estate.__components.input-text',[
                                       'name'=> 'purchase_price',
                                       'placeholder'=> ' قیمت',
                                       'value'=>$location->purchase_price,
                                        ])
                                    <!--end::Input-->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-10 fv-row for-rent-wrapper" style="display: none">
                                        <!--begin::Label-->
                                    @include('real-estate.__components.label',['title'=>'مبلغ رهن'])
                                    <!--end::Label-->
                                        <!--begin::Input-->
                                    @include('real-estate.__components.input-text',[
                                       'name'=> 'mortgage',
                                       'placeholder'=> ' مبلغ رهن',
                                       'value'=>$location->mortgage,
                                        ])
                                    <!--end::Input-->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-10 fv-row for-rent-wrapper" style="display: none">
                                        <!--begin::Label-->
                                    @include('real-estate.__components.label',['title'=>'مبلغ اجاره'])
                                    <!--end::Label-->
                                        <!--begin::Input-->
                                    @include('real-estate.__components.input-text',[
                                       'name'=> 'rent',
                                       'placeholder'=> ' مبلغ اجاره',
                                       'value'=>$location->rent,
                                        ])
                                    <!--end::Input-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-10 fv-row land-wrapper">
                                        <!--begin::Label-->
                                    @include('admin.__components.label',['title'=>'طبقه'])
                                    <!--end::Label-->
                                        <!--begin::Input-->
                                    @include('admin.__components.input-text',[
                                       'type'=> 'number',
                                       'name'=> 'floor_number',
                                       'value'=> $location->floor_number,
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
                                      'activeKey'=>$location->has_parking,
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
                                       'value'=> $location->tatal_metrage,

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
                                       'items'=>$directionTypes,
                                       'selectedItems'=>[$location->house_type]

                                       ])
                                    <!--end::Input-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-10 fv-row land-wrapper">
                                        <!--begin::Label-->
                                    @include('admin.__components.label',['title'=>'متراژ بنا','required'=>'required'])
                                    <!--end::Label-->
                                        <!--begin::Input-->
                                    @include('admin.__components.input-text',[
                                       'name'=> 'infrastructure_metrage',
                                       'value'=> $location->infrastructure_metrage,
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
                                          'value'=> $location->construction_year,
                                           ])

                                    <!--end::Input-->
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
                                       'value'=> $location->room_count,
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
                                       'activeKey'=>$location->has_elevator,
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
                                        'items'=>$floorMaterials,
                                        'selectedItems'=>[$location->floor_material],

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
                                       'items'=>$cabinetMaterials,
                                       'selectedItems'=>[$location->cabinet_material],
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
                                        'activeKey'=>$location->has_yard,
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
                                        'value'=> $location->yard_metrage,
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
                                    @include('admin.__components.input-text',[
                                       'name'=> 'address',
                                       'value'=> $location->address,
                                          ])
                                    <!--end::Input-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                    @include('admin.__components.label',['title'=>' طول و عرض جغرافیایی'])
                                    <!--end::Label-->
                                        @include('admin.__components.leaflet-map',[
                                             'name'=> 'map',
                                              'value'=> ['lat'=> $realEstate->latitude , 'lng'=> $realEstate->longitude],
                                             ])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                    @include('admin.__components.label',['title'=>'توضیحات'])
                                    <!--end::Label-->
                                        <!--begin::Input-->
                                    @include('admin.__components.textarea',[
                                       'name'=> 'description',
                                       'value'=> $location->description,
                                          ])
                                    <!--end::Input-->
                                    </div>
                                </div>

                            </div>
                            <!--end::Input  group-->
                        </div>
                        <!--end::Card header-->
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <!--begin::Button-->
                                <a href="{{route('admin.locations.all',$realEstate)}}" type="reset" class="btn btn-light me-5">انصراف
                                </a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                    ویرایش آگهی
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
                            'items'=>$statuses,
                            'id'=>'status',
                            'name'=>'status',
                            'activeKey'=>$location->status,
                                ])
                        <!--end::Select2-->
                            <!--begin::Datepicker-->
                            <div class="d-none mt-10">
                                <label for="kt_ecommerce_add_category_status_datepicker" class="form-label">Select
                                    publishing date and time</label>
                                <input class="form-control" id="kt_ecommerce_add_category_status_datepicker"
                                       placeholder="Pick date & time"/>
                            </div>
                            <!--end::Datepicker-->
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
                                <h2>انتخاب تصویر</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card  body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                        @include('admin.__components.image-input',[
                            'name'=>'banner',
                            'image_blank'=>asset('admin-assets/assets/media/svg/files/blank-image.svg'),
                            'imageUrl'=>$location->webPresent()->avatar,
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
                    $("input[name='yard_metrage']").attr("readonly", "readonly");
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
                    $("input[name='house_type']").attr("readonly", "readonly");
                    $("#house_type").css('opacity', '0.3');
                }
            });
        });
    </script>

@endsection
