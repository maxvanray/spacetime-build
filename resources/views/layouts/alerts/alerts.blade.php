@if (count($errors) > 0)
    @include ('errors.list')
@endif

@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {!!Session::get('message')!!}
    </div>
@endif

@if(Session::has('flash_message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {!!Session::get('flash_message')!!}
    </div>
@endif
