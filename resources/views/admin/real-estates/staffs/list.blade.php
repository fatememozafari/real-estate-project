@extends('layouts.admin')
@section('page-title')

    @include('admin.partials.page-title',[
    'title' => 'مدیریت مشاور املاک',
    'subtitle' => 'نمایش اطلاعات',
])
@endsection
@section('content')

                <!--begin::Navbar-->
            @include('admin.real-estates.top-card')
            <!--end::Navbar-->
                <!--begin::details View-->
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card body-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h3>لیست کارمندان</h3>
                        </div>
                        <!--begin::Card title-->

                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <!--end::Filter-->
                                <!--begin::Add customer-->
                                <a href="{{route('admin.staffs.create', $realEstate)}}" class="btn btn-sm btn-flex btn-primary">
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
                                    <!--end::Svg Icon-->افزودن کارمند جدید</a>
                                <!--end::Add customer-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <div class="card-body p-9">
                        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">

                            <!--begin::Card header-->
                            <div class="row">
                                <div class="col-md-12">

                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                                            <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="min-w-20px">#</th>
                                                <th class="min-w-60px">تصویر</th>
                                                <th class="min-w-125px">نام و نام خانوادگی</th>
                                                <th class="min-w-125px">ایمیل</th>
                                                <th class="min-w-125px">موبایل</th>
                                                <th class="min-w-125px">وضعیت</th>
                                                <th class="min-w-70px"></th>
                                            </tr>
                                            <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-semibold text-gray-600">
                                            @if(count($realEstate->users) > 0)

                                                @foreach($realEstate->users as $staff)

                                                    <tr>
                                                        <td>{{$staff->id}}</td>
                                                        <!--begin::Name=-->
                                                        <td>
                                                            <img src="{!! $staff->webPresent()->avatar !!}" alt="image" width="50">
                                                        </td>
                                                        <!--end::Name=-->
                                                        <!--begin::Name=-->
                                                        <td>
                                                            <a href="{{route('admin.users.show',$staff)}}" class="text-gray-800 text-hover-primary mb-1">{{$staff->name}}</a>

                                                        </td>
                                                        <!--end::Name=-->
                                                        <td>
                                                            <a href="{{route('admin.users.show',$staff)}}" class="text-gray-600 text-hover-primary mb-1 ">{{$staff->email}}</a>

                                                        </td>

                                                        <td>
                                                            <a href="{{route('admin.users.show',$staff)}}" class="text-gray-600 text-hover-primary mb-1 ">{{$staff->mobile}}</a>

                                                        </td>
                                                        <td>
                                                            {!! $staff->webPresent()->status !!}

                                                        </td>

                                                        <!--begin::Action=-->
                                                        <td>
                                                            <!--begin::Edit-->
                                                            <a href="{{route('admin.users.edit',$staff)}}" class="btn btn-icon btn-light-primary w-30px h-30px me-3" >
																	<span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
																			</svg>
																		</span>
                                                                        <!--end::Svg Icon-->
																	</span>
                                                            </a>
                                                            <!--end::Edit-->
                                                            <!--begin::Delete-->
                                                        @include('admin.__components.delete-link',[
                                                           'refresh' => true,
                                                            'url' => route('admin.staffs.delete',[$realEstate,$staff])
                                                             ])
                                                            <!--end::Delete-->
                                                        </td>
                                                        <!--end::Action=-->
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                            </div>

                        </div>

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::details View-->




@endsection

