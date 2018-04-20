@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Locations
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.css')}}"/>
@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            Locations
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-fw fa-home"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ @route('dashboard.locations.index') }}"> Locations</a>
            </li>
        </ol>
    </section>
        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered table-hover" width="100%" border="0" cellspacing="0" cellpadding="0" summary="This is a list of the locations.">
                                <thead>
                                  <tr>
                                    <th>Location Name</th>
                                    <th>Address</th>
                                    <th>Description</th>
                                    <th>Contact</th>
                                    <th>Hours</th>
                                    <th>Active</th>
                                    <th>Edit</th>
                                  </tr>
                                </thead>
                                <tbody>
                                   @foreach($locations as $location)
                                    <tr>
                                        <td class="locationName">{{ $location->name }}</td>
                                        <td class="locationAddress">{{ $location->address }}</td>
                                        <td class="locationDescription">{{ $location->description }}</td>
                                        <td class="locationContact"
                                            data-locationcontact="{{ $location->contact }}"
                                            data-locationemail="{{ $location->email }}"
                                            >{{ $location->contact }} {{ $location->email }}</td>
                                        <td></td>
                                        <td class="locationActive">{{ $location->active }}</td>
                                        <td class="locationEdit" data-location="{{ $location->id }}">
                                            <a href="{{ route('dashboard.locations.edit', $location->id) }}" class="btn btn-primary btn-xs userEditBtn" >
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            @if (!\App\Calendar::where('location', '=', $location->id)->exists())
                                            |
                                            <button
                                                class="btn btn-danger btn-xs deleteBtn"
                                                data-id="{{ $location->id }}"
                                                data-name="{{ $location->name }}"
                                                data-url="{!! URL::route('dashboard.locations.destroy', $location->id) !!}"
                                                data-toggle="modal"
                                                data-target="#delete"
                                                data-placement="top">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ @route('dashboard.locations.create') }}" class="btn btn-success">Add New Location</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .modal-dialog -->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-location="0">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title custom_align" id="Heading5">Delete this entry</h4>
                        </div>
                        <div class="modal-body">
                            <div id="confirm" class="alert alert-info" data-location="0" >
                                <span class="glyphicon glyphicon-info-sign"></span>&nbsp;  this record ?
                            </div>
                        </div>
                        <div class="modal-footer ">
                            {!! Form::open([
                                'method' => 'DELETE',
                                'id' => 'formDelete',
                                'data-location' => '0',
                                'data-dismiss' => 'modal',
                                ]) !!}
                                {!! Form::button( '
                                        <span class="glyphicon glyphicon-ok-sign confirm"></span> Yes',
                                    [ 'type' => 'submit',
                                    'class' => 'btn btn-danger delete',
                                ]) !!}
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove"></span> No
                                </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div>
        </div>
        @include('layouts.right_sidebar')
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom_js/datatables_custom.js')}}"></script>
<script type="text/javascript">
    $('.deleteBtn').on('click', function(event){
        $('#formDelete').data('location', $(this).data('id'));
        $('#formDelete').attr("action", $(this).data('url'));
        $('#confirm').text('Are you sure you want to delete '+ $(this).data('name') +'?');
    });
</script>
@stop

