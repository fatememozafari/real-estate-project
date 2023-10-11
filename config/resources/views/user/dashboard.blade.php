@extends('layouts.user')
@section('content')


    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-fluid" id="kt_content_container">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
   @foreach($realEstates as $realEstate)
            <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::Mixed Widget 1-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body p-0">
                            <!--begin::Header-->
                            <div class="px-9 pt-7 card-rounded h-275px w-100 bg-primary">
                                <!--begin::Heading-->
                                <div class="d-flex flex-stack">
                                    <h3 class="m-0 text-white fw-bold fs-3">{{$realEstate->name}}</h3>
                                    <div class="ms-1">
                                        <!--begin::Menu-->
                                        <button type="button"
                                                class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color-danger border-0 me-n3"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                            <span class="svg-icon svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                     height="24px" viewBox="0 0 24 24">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="5" y="5" width="5" height="5" rx="1"
                                                                              fill="currentColor"></rect>
																		<rect x="14" y="5" width="5" height="5" rx="1"
                                                                              fill="currentColor" opacity="0.3"></rect>
																		<rect x="5" y="14" width="5" height="5" rx="1"
                                                                              fill="currentColor" opacity="0.3"></rect>
																		<rect x="14" y="14" width="5" height="5" rx="1"
                                                                              fill="currentColor" opacity="0.3"></rect>
																	</g>
																</svg>
															</span>
                                            <!--end::Svg Icon-->
                                        </button>

                                        <!--end::Menu-->
                                    </div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Balance-->
                                <div class="d-flex text-center flex-column text-white pt-8">
                                    <span class="fw-semibold fs-7 fw-bold">مدیریت </span>
                                 <span class="fw-bold fs-2x pt-1">{{$realEstate->manager->name}}</span>
                                </div>
                                <!--end::Balance-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Items-->
                            <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1"
                                 style="margin-top: -100px">
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-6">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-45px w-40px me-5">
														<span class="symbol-label bg-lighten">
														<i class="fa fa-sign-in"></i>
														</span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center flex-wrap w-100">
                                        <!--begin::Title-->
                                        <div class="mb-1 pe-3 flex-grow-1">
                                            <a href="{{route('real-estate.login',$realEstate)}}" class="fs-5 text-gray-800 text-hover-primary fw-bold">ورود به
                                                پنل مشاور املاک</a>
                                        </div>
                                        <!--end::Title-->

                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Item-->

                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
                <!--end::Col-->
        @endforeach
            </div>
            <!--end::Row-->


            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>


@endsection
