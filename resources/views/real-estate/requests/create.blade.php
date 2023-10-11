@extends('layouts.real-estate')
@section('page-title')

    @include('real-estate.partials.page-title',[
    'title' => 'مدیریت مشاور املاک',
    'subtitle' => 'ایجاد درخواست جدید',
])
@endsection
@section('style')

    <link rel="stylesheet" href="{{asset('admin-assets/assets/plugins/custom/leaflet/leaflet.bundle.rtl.css')}}">
    <script src="{{asset('admin-assets/assets/plugins/custom/leaflet/leaflet.bundle.js')}}"></script>
@endsection
@section('content')


                <!--begin::Navbar-->
            @include('real-estate.real-estates.top-card')
            <!--end::Navbar-->
                <!--begin::details View-->
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <form method="post" action="{{route('real-estate.requests.store',$realEstate)}}"
                                                     class="form d-flex flex-column flex-lg-row">
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
                                        <!--begin::Input group-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('real-estate.__components.label',['title'=>'نام و نام خانوادگی', 'required'=> 'required'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.input-text',[
                                                        'name'=> 'user_name',
                                                        'placeholder'=> 'نام و نام خانوادگی',
                                                        ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('real-estate.__components.label',['title'=>'شماره موبایل', 'required'=> 'required'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.input-text',[
                                                        'name'=> 'mobile',
                                                        'placeholder'=> 'شماره موبایل',

                                                        ])
                                                <!--end::Input-->
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('real-estate.__components.label',['title'=>'آدرس ایمیل', 'required'=> 'required'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.input-text',[
                                                        'name'=> 'email',
                                                        'placeholder'=> 'آدرس ایمیل',

                                                        ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('real-estate.__components.label',['title'=>'تاریخ پایان درخواست', 'required'=> 'required'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.datepicker',[
                                                        'name'=> 'expired_date',
                                                        ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Card body-->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('real-estate.__components.label',['title'=>'عنوان '])

                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.input-text',[
                                                    'name'=> 'title',
                                                    'placeholder'=> 'عنوان ',

                                                    ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('real-estate.__components.label',['title'=>'نوع تقاضا'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.select-2',[
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
                                                @include('real-estate.__components.label',['title'=>'نوع ملک','required'=>'required'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.select-2',[
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
                                                @include('real-estate.__components.label',['title'=>'نوع خانه شخصی'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.horizontal-radiobutton',[
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
                                                <div class="mb-10 fv-row land-wrapper">
                                                    <!--begin::Label-->
                                                @include('real-estate.__components.label',['title'=>'طبقه'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.input-text',[
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
                                                @include('real-estate.__components.label',['title'=>' پارکینگ'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.horizontal-radiobutton',[
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
                                                @include('real-estate.__components.label',['title'=>'متراژ'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.input-text',[
                                                   'name'=> 'total_metrage',
                                                   'placeholder'=> ' متراژ ',

                                                    ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                @include('real-estate.__components.label',['title'=>'نوع جهت'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.select-2',[
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
                                                @include('real-estate.__components.label',['title'=>'متراژ بنا'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.input-text',[
                                                   'name'=> 'infrastructure_metrage',
                                                   'placeholder'=> ' متراژ بنا',

                                                    ])
                                                <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row land-wrapper">
                                                    <!--begin::Label-->
                                                @include('real-estate.__components.label',['title'=>'سال ساخت'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                    @include('real-estate.__components.datepicker',[
                                                      'name'=> 'construction_year',
                                                       ])
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-10 fv-row land-wrapper">
                                                    <!--begin::Label-->
                                                @include('real-estate.__components.label',['title'=>'تعداد اتاق'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.input-text',[
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
                                                @include('real-estate.__components.label',['title'=>'آسانسور'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.horizontal-radiobutton',[
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
                                                @include('real-estate.__components.label',['title'=>'جنس کف'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.select-2',[
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
                                                @include('real-estate.__components.label',['title'=>'نوع کابینت'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.select-2',[
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
                                                @include('real-estate.__components.label',['title'=>' حیاط'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.horizontal-radiobutton',[
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
                                                @include('real-estate.__components.label',['title'=>'متراژ حیاط'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.input-text',[
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
                                                @include('real-estate.__components.label',['title'=>'آدرس','required'=>'required'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.textarea',[
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
                                                @include('real-estate.__components.label',['title'=>'موقعیت جغرافیایی'])
                                                <!--end::Label-->
                                                    <!--begin::Input-->
                                                @include('real-estate.__components.leaflet-map',[
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
                                                        @include('real-estate.__components.label',['title'=>'توضیحات'])
                                                        <!--end::Label-->
                                                            <!--begin::Input-->
                                                        @include('real-estate.__components.textarea',[
                                                           'name'=> 'description',
                                                           'placeholder'=> 'توضیحات'
                                                              ])
                                                        <!--end::Input-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end::Card body-->

                                    </div>
                                    <!--end::Card header-->
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-end">
                                            <!--begin::Button-->
                                            <a href="{{route('real-estate.requests.all',$realEstate)}}" type="reset"
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

                        </form>

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::details View-->



@endsection


