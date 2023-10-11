
<select class="form-control"
        id="kt_select2_{{ $name }}"
        @if(isset($isMultiple) && $isMultiple)
            multiple="multiple"  name="{{ $name }}[]"
        @else
            name="{{ $name }}"
        @endif
    >

    @if(isset($selectedItems))
        @foreach($selectedItems as $selectedItem)
            <option value="{{$selectedItem->id}}" selected="selected">{{$selectedItem->title}}</option>
        @endforeach
    @endif
</select>
@error($name)
<p class="text-danger">{{$message}}</p>
@enderror

<script>
    $(document).ready(function () {

        function {{ $name }}FormatRepo(repo) {
            console.log(repo, repo.image);
            let url = '{{asset("admin/global_assets/images/placeholders/placeholder.jpg")}}';
            if(repo.image == null){
                let markup =  repo.name;
                return markup;
            }else if(repo.image == ''){
                url = repo.image;

            }else if (repo.image != ''){
                url = repo.image;
            }
            let markup = '<div class="d-flex align-items-center">'+
                            '<div class="symbol symbol-45px me-5">'+
                                '<img src="'+url+'" alt="" class="w-100" />'+
                            '</div>'+
                            '<div class="d-flex justify-content-start flex-column">'+
                                '<a href="#" class="text-dark fw-bold text-hover-primary fs-6">'+ repo.name +'</a>'+
                            '</div>'+
                        '</div>';

            return markup;
        }

        // Format displayed data
        {{--function {{ $name }}FormatRepo(repo) {--}}
        {{--    if (repo.loading) return 'در حال جستجو ...';--}}
        {{--    let markup =  repo.name;--}}
        {{--    return markup;--}}
        {{--}--}}
        // Format selection
        function {{ $name }}FormatRepoSelection(repo) {
            if (repo.name == undefined) return repo.text;
            return repo.name ;
        }
        // Format selection

        $('#kt_select2_{{ $name }}').select2({
            language: {
                inputTooShort: function (args) {
                    let remainingChars = args.minimum - args.input.length;
                    let message = 'حداقل ' + remainingChars + ' حرف یا بیشتر برای جستجو وارد کنید';
                    return message;
                },
                noResults: function () {
                    return 'نتیجه ای یافت نشد !';
                },
            },
            allowClear: true,
            placeholder: "{{ (isset($placeholder))  ? $placeholder : '' }}",
            @if(isset($isMultiple) && $isMultiple)
                tags: true,
            @endif
            minimumInputLength: 3,
            ajax: {

                url: "{{ $url }}",
                dataType: 'json',
                delay: 20,
                data: function (params) {
                    return {
                        q: params.term, // search term
                    };
                },
                processResults: function (response, params) {
                    let {{ $name }} = response.data;
                    params.page = params.page || 1;
                    return {
                        results: {{ $name }},
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) {
                return markup;
            }, // let our custom formatter work
            templateResult: {{ $name }}FormatRepo, // omitted for brevity, see the source of this page
            templateSelection: {{ $name }}FormatRepoSelection // omitted for brevity, see the source of this page

        });

    })
</script>



