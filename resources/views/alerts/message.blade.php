@if(session('created_success'))
    <div class="alert alert-success">{{session('created_success')}}</div>
@endif
@if(session('updated_success'))
    <div class="alert alert-success">{{session('updated_success')}}</div>
@endif
@if(session('remove_success'))
    <div class="alert alert-success">{{session('remove_success')}}</div>
@endif

