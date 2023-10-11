@extends('layouts.admin')
@section('page-title')

    @include('admin.partials.page-title',[
    'title' => 'مدیریت کاربران',
    'subtitle' => 'پنل مدیریت',
])

@endsection
@section('content')

    <!--begin::Card-->
    <div class="card mb-10">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h3>
                    <i class="fa fa-search fs-4 pl-2"></i>
                    جستجوی پیشرفته
                </h3>
            </div>
            <!--end::Card title-->

        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <form action="" method="get" id="remove-empty-values">
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="form-group">
                            @include('admin.__components.label',['title' => "نام کاربر"])
                            <div class="mb-5">
                                @include('admin.__components.input-text',[
                                     'name' => 'name',
                                     'placeholder' => 'نام کاربر',
                                     'value' => (request()->has('name'))? request('name') : ''
                                 ])
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            @include('admin.__components.label',['title' => "ایمیل "])
                            <div class="mb-5">
                                @include('admin.__components.input-text',[
                                     'name' => 'email',
                                     'placeholder' => 'ایمیل',
                                      'value' => (request()->has('email'))? request('email') : ''
                                 ])
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            @include('admin.__components.label',['title' => "موبایل "])
                            <div class="mb-5">
                                @include('admin.__components.input-text',[
                                     'name' => 'mobile',
                                     'placeholder' => 'موبایل',
                                     'value' => (request()->has('mobile'))? request('mobile') : ''
                                 ])
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mt-10">
                            <a href="{{route('admin.users.all')}}" class="btn btn-sm btn-light-danger">
                                <i class="fa fa-eraser"></i>
                                حذف فیلترها
                            </a>
                            <button type="submit" class="btn btn-sm btn-light-primary">
                                <i class="fa fa-search"></i>
                                جستجو
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h3>فهرست کاربران</h3>
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                    <!--end::Filter-->

                    <!--begin::Add customer-->
                    <a href="{{route('admin.users.create')}}" class="btn btn-sm btn-flex btn-primary">
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
                        <!--end::Svg Icon-->افزودن کاربر جدید</a>
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
                    <th class="min-w-20px">#</th>
                    <th class="min-w-60px">تصویر</th>
                    <th class="min-w-125px">نام و نام خانوادگی</th>
                    <th class="min-w-125px">ایمیل</th>
                    <th class="min-w-125px">موبایل</th>
                    <th class="min-w-70px">وضعیت</th>
                    <th class="min-w-100px"></th>
                </tr>
                <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-semibold text-gray-600">
                @if(count($users) > 0)
                    @foreach($users as $user)
                        <tr>
                            <!--begin::Name=-->
                            <td>
                                <a href="{{route('admin.users.show',$user)}}"
                                   class="text-gray-800 text-hover-primary mb-1">{{$user->id}}</a>
                            </td>
                            <td>
                                <img src="{{$user->webPresent()->avatar}}" class="img-fluid" width="60"
                                     alt="user_{{$user->id}}_image">
                            </td>
                            <!--end::Name=-->
                            <!--begin::Name=-->
                            <td>
                                <a href="{{route('admin.users.show',$user)}}"
                                   class="text-gray-800 text-hover-primary mb-1">{{$user->name}}</a>
                            </td>
                            <!--end::Name=-->
                            <!--begin::Email=-->
                            <td>
                                <a href="{{route('admin.users.show',$user)}}"
                                   class="text-gray-600 text-hover-primary mb-1">{{$user->email}}</a>
                            </td>
                            <!--end::Email=-->
                            <!--begin::Company=-->
                            <td>
                                <a href="{{route('admin.users.show',$user)}}"
                                   class="text-gray-600 text-hover-primary mb-1">{{$user->mobile}}</a>

                        </td>
                        <!--end::Company=-->
                        <!--begin::Payment method=-->
                        <td >
                            {!! $user->webPresent()->status !!}

                        </td>
                        <!--end::Payment method=-->
                        <!--begin::Action=-->
                        <td class="">
                            <!--begin::Edit-->
                            <a href="{{route('admin.users.show',$user)}}"
                               class="btn btn-icon btn-light-dark w-30px h-30px me-3">
                                        <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="مدیریت">
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <i class="fa fa-layer-group"></i>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                </a>
                                <!--end::Edit-->


                                <!--begin::Delete-->
                            {{--   <a href="javascript:;"--}}
                            {{--                                   data-user-id="{{$user->id}}"--}}
                            {{--                                   class="btn btn-icon btn-light-danger w-30px h-30px me-3 confirm-delete"--}}
                            {{--                                   data-bs-toggle="tooltip" data-bs-trigger="hover" title="حذف">--}}
                            {{--                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->--}}
                            {{--                                    <span class="svg-icon svg-icon-3">--}}
                            {{--                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
                            {{--                                                 xmlns="http://www.w3.org/2000/svg">--}}
                            {{--                                            <path--}}
                            {{--                                                d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"--}}
                            {{--                                                fill="currentColor"/>--}}
                            {{--                                            <path opacity="0.5"--}}
                            {{--                                                  d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"--}}
                            {{--                                                  fill="currentColor"/>--}}
                            {{--                                            <path opacity="0.5"--}}
                            {{--                                                  d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"--}}
                            {{--                                                  fill="currentColor"/>--}}
                            {{--                                            </svg>--}}
                            {{--                                        </span>--}}
                            {{--                                    <!--end::Svg Icon-->--}}
                            {{--                                </a>--}}

                            @include('admin.__components.delete-link',[
                                'refresh' => true,
                                'url' => route('admin.users.delete',$user)
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
            {!! $users->withQueryString()->render() !!}
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
@endsection
@section('bottom-scripts')






    <script>


        {{--$(".confirm-delete").on('click', function () {--}}
        {{--    let user_id = $(this).data('user-id');--}}
        {{--    let url = "{{route('admin.users.delete',':user-id')}}";--}}
        {{--    url = url.replace(':user-id', user_id);--}}
        {{--    Swal.fire({--}}
        {{--        title: 'آیا مطمئن هستید ؟',--}}
        {{--        text: "تمامی اطلاعات وابسته حذف خواهد شد",--}}
        {{--        icon: 'warning',--}}
        {{--        showCancelButton: true,--}}
        {{--        cancelButtonText: 'انصراف',--}}
        {{--        confirmButtonColor: '#3085d6',--}}
        {{--        cancelButtonColor: '#d33',--}}
        {{--        confirmButtonText: 'بله حذف کن'--}}
        {{--    }).then((result) => {--}}
        {{--        if (result.isConfirmed) {--}}
        {{--            window.location = url;--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}



        $('#remove-empty-values').submit(function () {
            $(this).find(':input').filter(function () {
                return !this.value;
            }).attr('disabled', 'disabled');
            return true;
        });
    </script>
@endsection
