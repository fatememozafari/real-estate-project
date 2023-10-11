<div class="mt-3">
<!--begin::Checkboxes-->
@foreach($items as $item)
<label class="d-flex   mb-5 cursor-pointer align-items-start">

    <!--begin::Checkbox-->
    <span class="form-check form-check-custom form-check-solid me-10">
        <input class="form-check-input h-20px w-20px"
               type="checkbox"
               name="{{$name}}[]"
               value="{{$item['id']}}"
               @if(isset($item['isActive']) && $item['isActive'])  checked="checked" @endif
               />
        <span class="form-check-label fw-bold">{{$item['title']}}</span>
    </span>
    <!--end::Checkbox-->

</label>


<!--end::Checkboxes-->
@endforeach
</div>
@error($name)
<p class="text-danger">{{$message}}</p>
@enderror

