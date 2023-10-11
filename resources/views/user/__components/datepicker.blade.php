<div class="form-group">
    <div class="form-group">
        <div class="input-group" id="date_{{$name}}">
            <input id="{{$name}}" type="text" class="form-control"
                   placeholder="Alt Field">
        </div>
    </div>

{{--    <input type="text" class="form-control" id="_{{$name}}" />--}}
{{--    <input type="text" class="form-control" id="{{$name}}"--}}
{{--           name="{{$name}}"--}}
{{--           placeholder="{{ isset($placeholder) ? $placeholder : "لطفا تاریخ را انتخاب کنید" }}"--}}
{{--           @if(isset($value))--}}
{{--                value="{{ old($name, $value) }}"--}}
{{--           @else--}}
{{--                value="{{old($name)}}"--}}
{{--            @endif />--}}
</div>
@error($name)
<p class="text-danger">{{$message}}</p>
@enderror

<script type="text/javascript">


    $(document).ready(function() {


        $("#date_{{$name}}").persianDatepicker({
            initialValue : true,
            altField: '#{{$name}}',
            format: 'L',
            altFormat: 'L',

        });




    });


</script>
