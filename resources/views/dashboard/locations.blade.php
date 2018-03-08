@extends('layouts/default')

{{-- Page title --}}
@section('title')
    {{ Route::currentRouteName() }}
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
                    <a href="{{ @route('location.index') }}"> Location</a>
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

                                <table id="datatable" class="table table-striped table-bordered table-hover" width="100%" border="0" cellspacing="0" cellpadding="0" summary="This is a list of the guests.">
                                    <thead>
                                      <tr>
                                        <th>Location Name</th>
                                        <th>Address</th>
                                        <th>Description</th>
                                        <th>Contact</th>
                                        <th>Hours</th>
                                        <th>Active </th>
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
                                            
                                            <button 
                                                class="btn btn-primary btn-xs locationEditBtn"
                                                data-location="{{ $location->id }}" 
                                                data-target="#edit" 
                                                data-placement="top">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                            </button>
                                            
                                            | 
                                            
                                            <button 
                                                class="btn btn-danger btn-xs locationDeleteBtn" 
                                                data-location="{{ $location->id }}"
                                                data-toggle="modal"
                                                data-target="#delete" 
                                                data-placement="top">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                            

                                        </td>
                                      </tr>
                                       @endforeach
                                    </tbody>
                                </table>

                            </div>
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
                                'id' => 'formDeleteLocation', 
                                'data-location' => '0',
                                'data-dismiss' => 'modal',
                                ]) 

                            !!}
                                {!! Form::button( '
                                        <span class="glyphicon glyphicon-ok-sign confirm"></span> Yes', 
                                    [ 'type' => 'submit', 
                                    'class' => 'btn btn-danger delete deleteProduct',
                                    'id' => 'btnDeleteProduct', 
                                    'data-id' => 0 
                                ] ) !!}
                            {!! Form::close() !!}
                            
                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span> No
                            </button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>
        </section>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

{{--end of row--}}
@include('layouts.right_sidebar')
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#datatable').DataTable({
                "responsive": true
            });
        });

        // EDIT LOCATION
        $('.locationEditBtn').on('click', function(event){
            var locationName = $(this).parent().parent().find('.locationName').text();
            var locationAddress = $(this).parent().parent().find('.locationAddress').text();
            var locationDescription = $(this).parent().parent().find('.locationDescription').text();
            var locationContact = $(this).parent().parent().find('.locationContact').data('locationcontact');
            var locationEmail = $(this).parent().parent().find('.locationContact').data('locationemail');
            var locationActive = $(this).parent().parent().find('.locationAddress').text();
            var locationId = $(this).data('location');

            var locationAddress ='{{ url('dashboard/location') }}' + '/' + locationId + '/';
            window.location.href = locationAddress;

            $("#formUpdateLocation").attr("action", locationAddress);
            $('#edit .name').val(locationName);
            $('#edit .address').val(locationAddress);
            $('#edit .description').text(locationDescription);
            $('#edit .contact').val(locationContact);
            $('#edit .email').val(locationEmail);
            $('#edit .active').val(locationActive);
        });

        // DELETE LOCATION
        $('.locationDeleteBtn').on('click', function(event){
            var locationName = $(this).parent().parent().find('.locationName').text();
            var locationId = $(this).data('location');
            var warning = 'Are you sure you want to delete '+locationName+'?';
            $('#formDeleteLocation').data('location', locationId);
            $('#confirm').text(warning);
        });

        $('.deleteProduct').on('click', function(e) {
            var locationId = $('#formDeleteLocation').data('location');
            var inputData = $('#formDeleteLocation').serialize();
            $.ajax({
                url: '{{ url('dashboard/location') }}' + '/' + locationId,
                type: 'DELETE',
                data: inputData,
                success: function( msg ) {
                    if ( msg.status === 'success' ) {
                        console.log( msg.msg );
                        location.reload();
                        setInterval(function() {
                            location.reload();
                        }, 5900);
                    }
                },
                error: function( data ) {
                    if ( data.status === 422 ) {
                        console.log('Cannot delete the category');
                    }
                }
            });

            return false;
        });
/*
        // UPDATE LOCATION
        $('.locationEditBtn').on('click', function(){
            var locationId = $(this).data('location');
            //$('#formUpdateLocation').data('location', locationId);
            var address ='{{ url('dashboard/location') }}' + '/' + locationId + '/';
            $("#formUpdateLocation").attr("action", address);
        });

        $('.btnupdate').on('click', function(event){
            event.preventDefault();
            var locationId = $('#formUpdateLocation').data('location');
            var inputData = $('#formUpdateLocation').serialize();
            var address ='{{ url('dashboard/location') }}' + '/' + locationId + '/';
            var $_token = $('input[name=_token]').val();
            console.log(address);

            $.ajax({
                url: address,
                type: 'PUT',
                cache: false,
                headers: { 'X-XSRF-TOKEN' : $_token }, 
                data: inputData,
                success: function( msg ) {
                    if ( msg.status === 'success' ) {
                        console.log( msg.msg );
                        location.reload();
                        setInterval(function() {
                            location.reload();
                        }, 5900);
                    }
                },
                error: function( data ) {
                    if ( data.status === 422 ) {
                        console.log('Cannot update the category');
                    }
                }
            });
        });
*/
        

        //
        // $('#delete .confirm').on('click', function(){
        //     //var locationId = 
        //     //console.log();
        // });
        
    </script>
@stop

