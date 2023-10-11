<a href="#" data-target="{{$url}}"
   class="btn btn-icon btn-light-danger btn-sm delete-link " data-bs-toggle="tooltip"
   data-bs-custom-class="tooltip-dark" data-bs-placement="bottom"
   title="حذف">
    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
    <span class="svg-icon svg-icon-3">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                fill="currentColor"/>
            <path opacity="0.5"
                  d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                  fill="currentColor"/>
            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                  fill="currentColor"/>
        </svg>
    </span>
    <!--end::Svg Icon-->
</a>

<script>
    $(document).ready(function () {
        $(".delete-link").on('click', function (event) {
            event.preventDefault()
            let url = $(this).attr('data-target');
            Swal.fire({
                title: "حذف",
                text: "از حذف این مورد اطمینان دارید ؟",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#ff0008',
                confirmButtonText: "بله , حذف کن !",
                cancelButtonText: "خیر"
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            Swal.fire({
                                title: "خب",
                                text: "حذف با موفقیت انجام شد",
                                icon: 'success',
                                confirmButtonColor: '#01b131',
                                confirmButtonText: "باشه",
                            });
                            @if(isset($refresh) && $refresh)
                            location.reload();
                            @elseif(isset($parentID))
                            $('#{!! $parentID !!}').fadeOut('slow');
                            @endif
                        },
                        error: function (errors) {
                            Swal.fire({
                                title: "خطا",
                                text: "مشکلی در حذف به وجود آمده است",
                                icon: 'warning',
                                confirmButtonColor: '#F90',
                                cancelButtonColor: '#CCC',
                                confirmButtonText: "باشه",
                            });
                        }
                    });

                }
            });
        })
    });
</script>


