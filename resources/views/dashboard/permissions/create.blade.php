@extends('layouts.default')

{{-- Page title --}}
@section('title')
    Create Permission
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/datatables/css/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom_css/datatables_custom.css')}}">
    <!--end of page level css-->
@stop

{{-- Page content --}}
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add New Permission
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.users.index')}}"> Users</a>
                </li>
                <li>
                    <a href="{{route('dashboard.permissions.index')}}"> Permissions</a>
                </li>
                <li>
                    <a href="#"> Add New Permission</a>
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                    
                        <div class="panel-body">

                            {{ Form::open(array('route' => 'dashboard.permissions.store')) }}

                            <div class="form-group">
                                {{ Form::label('name', 'Permission Name') }}
                                {{ Form::text('name', '', array('class' => 'form-control')) }}
                            </div><br>
                            @if(!$roles->isEmpty())
                            <h4>Assign Permission to Roles</h4>

                            @foreach ($roles as $role)
                                {{ Form::checkbox('roles[]',  $role->id ) }}
                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                            @endforeach
                            @endif
                            <br>
                            {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}
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
                                    'id' => 'formDeleteUser', 
                                    'data-user' => '0',
                                    'data-dismiss' => 'modal',
                                    'action' => ['Dashboard\UserController@destroy', 
                                    $user->id]]) !!}
                                    {!! Form::button( '
                                            <span class="glyphicon glyphicon-ok-sign confirm"></span> Yes', 
                                        [ 'type' => 'submit', 
                                        'class' => 'btn btn-danger delete deleteProduct',
                                        'id' => 'btnDeleteProduct', 
                                        'data-id' => $user->id 
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
            </div>
            {{--end of row--}}
            @include('layouts.right_sidebar')
        </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom_js/datatables_custom.js')}}"></script>

<script type="text/javascript">
// EDIT USER
$('.userEditBtn').on('click', function(event){
    console.log('click');
    var userName = $(this).parent().parent().find('.userName').text();
    var userAddress = $(this).parent().parent().find('.userAddress').text();
    var userDescription = $(this).parent().parent().find('.userDescription').text();
    var userContact = $(this).parent().parent().find('.userContact').data('usercontact');
    var userEmail = $(this).parent().parent().find('.userContact').data('useremail');
    var userActive = $(this).parent().parent().find('.userAddress').text();
    var userId = $(this).data('user');

    var userAddress ='{{ url('dashboard/user') }}' + '/' + userId + '/';
    window.location.href = userAddress;


    $("#formUpdateUser").attr("action", userAddress);
    $('#edit .name').val(userName);
    $('#edit .address').val(userAddress);
    $('#edit .description').text(userDescription);
    $('#edit .contact').val(userContact);
    $('#edit .email').val(userEmail);
    $('#edit .active').val(userActive);
});

// DELETE USER
$('.userDeleteBtn').on('click', function(event){
    var userName = $(this).parent().parent().find('.userName').text();
    var userId = $(this).data('user');
    var warning = 'Are you sure you want to delete '+userName+'?';
    $('#formDeleteUser').data('user', userId);
    $('#confirm').text(warning);

});

$('.deleteProduct').on('click', function(e) {

    var userId = $('#formDeleteUser').data('user');
    var inputData = $('#formDeleteUser').serialize();

    $.ajax({
        url: '{{ url('dashboard/user') }}' + '/' + userId,
        type: 'DELETE',
        data: inputData,
        success: function( msg ) {
            if ( msg.status === 'success' ) {
                console.log( msg.msg );
                user.reload();
                setInterval(function() {
                    user.reload();
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
</script>
    <!-- end of page level js -->
@stop

