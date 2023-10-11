<input class="form-control form-control-lg form-control-solid"
       type="{{ (isset($type)) ? $type : 'text' }}"
       name="{{ $name }}"
       @if(isset($placeholder)) placeholder="{{ $placeholder }}" @endif
       @if(isset($value)) value="{{old($name,$value)}}" @else value="{{old($name)}}" @endif

       autocomplete="off" />
@error($name)
<p class="text-danger">{{$message}}</p>
@enderror

