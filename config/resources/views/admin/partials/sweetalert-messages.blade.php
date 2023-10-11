<script>
    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'عملیات موفق',
        text: "{{session('success')}}",
        confirmButtonText: 'باشه'
    })
    @endif

    @if(session('error'))
    Swal.fire({
        icon: 'danger',
        title: 'عملیات ناموفق',
        text: "{{session('error')}}",
        confirmButtonText: 'باشه'
    })
    @endif
</script>
>
