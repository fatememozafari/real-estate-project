@extends('layouts.real-estate')
@section('page-title')

    @include('real-estate.partials.page-title',[
    'title' => 'مدیریت مشاور املاک',
    'subtitle' => 'مدیریت درخواست ها',
])
@endsection
@section('content')
    @include('real-estate.real-estates.top-card')
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h3>لیست درخواست ها</h3>
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--end::Filter-->
                    <!--begin::Add customer-->
                    <a href="{{route('real-estate.requests.create', $realEstate)}}" class="btn btn-sm btn-flex btn-primary">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                      rx="5" fill="currentColor"/>
                                <rect x="10.8891" y="17.8033" width="12" height="2"
                                      rx="1" transform="rotate(-90 10.8891 17.8033)"
                                      fill="currentColor"/>
                                <rect x="6.01041" y="10.9247" width="12" height="2"
                                      rx="1" fill="currentColor"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->افزودن درخواست جدید</a>
                    <!--end::Add customer-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                <!--begin::Table head-->
                <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="min-w-50px">#</th>
                    <th class="min-w-125px">نام و نام خانوادگی</th>
                    <th class="min-w-125px">موبایل</th>
                    <th class="min-w-125px">تاریخ انقضای درخواست</th>
                    <th class="min-w-70px"></th>
                </tr>
                <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-semibold text-gray-600">
                @foreach($requests as $request)


                    <tr>
                        <!--begin::Name=-->
                        <td>
                            <a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">{{$request->id}}</a>
                        </td>
                        <!--end::Name=-->
                        <!--begin::Name=-->
                        <td>
                            <a href="javascript:;" class="text-gray-800 text-hover-primary mb-1">
                            {{$request->user->name}}
                            </a>
                        </td>
                        <!--end::Name=-->
                        <!--begin::Email=-->
                        <td>
                            <a href="javascript:;" class="text-gray-600 text-hover-primary mb-1">
                                {{$request->user->mobile}}
                            </a>
                        </td>
                        <!--end::Email=-->
                        <!--begin::Company=-->
                        <td>
                            <a href="javascript:;" class="text-gray-600 text-hover-primary mb-1">{{$request->expired_date}}</a>

                        </td>
                        <!--end::Company=-->
                        <!--begin::Action=-->
                        <td>
                            <!--begin::Edit-->
                            <a href="{{route('real-estate.request-details.show',[$realEstate,$request])}}"
                               class="btn btn-icon btn-light-dark w-30px h-30px me-3">
                                  <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                     title="مدیریت">
                                     <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                         <span class="svg-icon svg-icon-3">
                                              <i class="fa fa-layer-group"></i>
                                         </span>
                                     <!--end::Svg Icon-->
                                  </span>
                            </a>
                            <!--end::Edit-->
                            <!--begin::Delete-->
                        @include('admin.__components.delete-link',[
                             'refresh' => true,
                              'url' => route('real-estate.requests.delete',[$realEstate,$request])
                              ])
                            <!--end::Delete-->
                        </td>
                        <!--end::Action=-->
                    </tr>
                @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

@endsection



