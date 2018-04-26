@extends('layouts/default')

{{-- Page title --}}
@section('title')
    {{ Route::currentRouteName() }}
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/iCheck/css/all.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom_css/advanced_modals.css')}}">
    <meta name="csrf-token" id="_token" data-token="{{ csrf_token() }}" content="{!! csrf_token() !!}" >
@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Location
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-fw fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{route('dashboard.locations.index')}}"> Locations</a>
            </li>
            <li class="active">
                <a href="{{@route('dashboard.locations.index')}}"> Edit Location: </a><a href="#">{{$location->name}}</a>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-info-circle"></i> Location Name and Address
                        </h3>
                    </div>
                    <table id="user" class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <td class="table_simple">Location Name:</td>
                            <td class="table_superuser">
                                <a 
                                href="#" 
                                id="name"
                                class="editable editable-click"
                                name="name" 
                                data-type="text" 
                                data-url="{{route('dashboard.locations.update', ['id'=>$location->id])}}"
                                data-pk="{{ $location->id }}"
                                data-title="Name">{{ $location->name or "<None>" }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_simple">Address:</td>
                            <td class="table_superuser">
                                <a href="#" 
                                    id="address" 
                                    class="editable editable-click"
                                    name="address" 
                                    data-type="text" 
                                    data-url="{{route('dashboard.locations.update', ['id'=>$location->id])}}"
                                    data-pk="{{ $location->id }}"
                                    data-title="Enter Location Address">{{ $location->address or "<None>" }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_simple">Floor:</td>
                            <td class="table_superuser">
                                <a href="#" 
                                    id="floor" 
                                    class="editable editable-click"
                                    name="floor" 
                                    data-type="text" 
                                    data-url="{{route('dashboard.locations.update', ['id'=>$location->id])}}"
                                    data-pk="{{ $location->id }}"
                                    data-title="Enter Location Floor">{{ $location->floor or "<None>" }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_simple">City:</td>
                            <td class="table_superuser">
                                <a href="#" 
                                    id="city" 
                                    class="editable editable-click"
                                    name="city" 
                                    data-type="text" 
                                    data-url="{{route('dashboard.locations.update', ['id'=>$location->id])}}"
                                    data-pk="{{ $location->id }}"
                                    data-title="Enter Location Name">{{ $location->city or "<None>" }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_simple">State:</td>
                            <td class="table_superuser">
                                <a href="#" 
                                    id="state" 
                                    class="editable editable-click"
                                    name="state" 
                                    data-type="typeaheadjs" 
                                    data-url="{{route('dashboard.locations.update', ['id'=>$location->id])}}"
                                    data-pk="{{ $location->id }}"
                                    data-title="Start typing State..">{{ $location->state or "<None>" }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_simple">Zip:</td>
                            <td class="table_superuser">
                                <a href="#" 
                                    id="zip" 
                                    class="editable editable-click"
                                    name="zip" 
                                    data-type="text" 
                                    data-url="{{route('dashboard.locations.update', ['id'=>$location->id])}}"
                                    data-pk="{{ $location->id }}"
                                    data-title="Enter Location Zipcode">{{ $location->zip or "<None>" }}</a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-info-circle"></i> Images
                        </h3>
                    </div>
                    <table id="user" class="table table-bordered table-striped m-t-10">
                        <tbody>
                            <tr>
                                <td class="table_simple">
                                    Images:<br>
                                    <a href="#" data-toggle="modal" data-target="#sidebar_modal">Add | Edit</a>

                                    <div id="sidebar_modal" class="modal fade animated" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                {{ Form::open(['route' => ['dashboard.location.images.update', $location->id], 'class' => 'location_images', 'method' => 'PUT']) }}
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Media Library</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                        @if(!count($allImages)>0)
                                                            <div class="col-md-6">
                                                                <h3>No Media</h3>
                                                            </div>
                                                        @else
                                                            @foreach($allImages as $img)
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>
                                                                            <input type="checkbox" name="image[]" value="{{$img['id']}}" @if(  $location->images->contains($img['id']) ) checked @endif > {{$img['name']}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <img class="img-responsive" src="{{url($img['location'])}}/{{ $img['filename'] }}" class="img-responsive" alt="{{ $img['name'] }}" title="{{ $img['name'] }}">
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        {{ Form::submit('Update', ['class' => 'btn btn-success', 'id'=>'media_save']) }}
                                                        <a type="button" id="media_close" class="btn btn-default" data-dismiss="modal">Close</a>
                                                        <a href="{{route('dashboard.images.create')}}" class="btn btn-primary">New</a>
                                                    </div>
                                                {{ Form::close() }}
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td class="table_superuser">
                                    <div class="row">
                                        @foreach( $location->images as $image)
                                        <div class="col-xs-6 col-md-3">
                                            <a href="#" class="thumbnail">
                                                <img src="{{url($image->location)}}/{{ $image->filename }}" class="img-responsive" alt="{{ $image->name }}" style="padding: 5px">
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-info-circle"></i> Location Contact
                        </h3>
                    </div>
                
                    <table id="user" class="table table-bordered table-striped m-t-10">
                        <tbody>
                        <tr>
                            <td class="table_simple">Location Contact:</td>
                            <td class="table_superuser">
                                <a href="#"
                                    id="contact"
                                    class="editable editable-click"
                                    name="contact"
                                    data-type="text"
                                    data-url="{{route('dashboard.locations.update', ['id'=>$location->id])}}"
                                    data-pk="{{ $location->id }}"
                                    data-title="Enter Location Contact Name">{{ $location->contact or "<None>" }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_simple">Location Email:</td>
                            <td class="table_superuser">
                                <a href="#"
                                    id="email"
                                    class="editable editable-click"
                                    name="email"
                                    data-type="text"
                                    data-url="{{route('dashboard.locations.update', ['id'=>$location->id])}}"
                                    data-pk="{{ $location->id }}"
                                    data-title="Enter Location Contact Email">{{ $location->email or "<None>" }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_simple">Location Phone:</td>
                            <td class="table_superuser">
                                <a href="#"
                                    id="phone"
                                    class="editable editable-click"
                                    name="phone"
                                    data-type="text"
                                    data-url="{{route('dashboard.locations.update', ['id'=>$location->id])}}"
                                    data-pk="{{ $location->id }}"
                                    data-title="Enter Location Phone">{{ $location->phone or "<None>" }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_simple">Location Description:</td>
                            <td class="table_superuser">
                                <a href="#"
                                    id="description"
                                    class="editable editable-click"
                                    name="description"
                                    data-type="text"
                                    data-url="{{route('dashboard.locations.update', ['id'=>$location->id])}}"
                                    data-pk="{{ $location->id }}"
                                    data-title="Enter Business Description">{{ $location->description or "<None>" }}</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{--end of row--}}
        @include('layouts.right_sidebar')
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script type="text/javascript"  src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('assets/vendors/x-editable/js/bootstrap-editable.js')}}"></script>
<script type="text/javascript"  src="{{asset('assets/vendors/x-editable/js/typeahead.js')}}"></script>
<script type="text/javascript"  src="{{asset('assets/vendors/x-editable/js/typeaheadjs.js')}}"></script>
<script type="text/javascript"  src="{{asset('assets/vendors/x-editable/js/address.js')}}"></script>
<script type="text/javascript"  src="{{asset('assets/vendors/iCheck/js/icheck.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/editable-table/js/mindmup-editabletable.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/timedropper/js/timedropper.js')}}" ></script>
<script type="text/javascript" src="{{asset('assets/js/custom_js/advanced_modals.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom_js/location-update.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('input').each(function(){
            $(this).iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_minimal',
                increaseArea: '20%' // optional
            });
        });
        $('#media_save').on('click', function (event) {
            event.preventDefault();
            var form = $('form.location_images');
            var form_content = form.serialize();
            var url = form.attr('action');
            $.ajax({
                url: url,
                type: 'PUT',
                data: form_content,
                success: function(msg){
                    console.log(msg);
                    location.reload();
                }
            });
        });
    });
</script>
@stop
