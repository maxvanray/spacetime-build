@extends('layouts.default')

{{-- Page title --}}
@section('title')
    Create Image
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/selectize/css/selectize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/dropify/css/dropify.css')}}">
@stop

{{-- Page content --}}
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Add New Image</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="active">
                    <a href="{{route('dashboard.images.index')}}">
                        Image Library
                    </a>
                </li>
                <li class="active">
                    <a href="{{route('dashboard.images.create')}}">
                        Add New Image
                    </a>
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['route' => 'dashboard.images.store', 'files' => true, 'id' => 'new_image_form']) !!}

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">
                            Name
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="name" class="form-control" name="name" placeholder="Enter a name" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">
                            Description
                        </label>
                        <div class="col-md-6">
                            <textarea id="description" name="description" rows="3"
                                      class="form-control resize_vertical"
                                      placeholder="Enter a description"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label">Key Words:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="categories" id="categories" class="demo-default">
                            <p>Add Key Words to help make the images searchable.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="image">
                            <strong>Upload Image:</strong> AllowedFileExtensions (JPG, PNG and GIF )
                        </label>
                        <div class="col-md-6">
                            <input name="image" type="file" class="dropify" data-allowed-file-extensions="jpg png gif" data-max-file-size="2M" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10">
                            {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
            {{--end of row--}}
            @include('layouts.right_sidebar')
        </section>
@stop

@section('footer_scripts')
<script type="text/javascript" src="{{asset('assets/vendors/selectize/js/standalone/selectize.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/dropify/js/dropify.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#categories').selectize({
            plugins: ['remove_button'],
            delimiter: ',',
            persist: false,
            create: function (input) {
                return {
                    value: input,
                    text: input
                }
            }
        });

        $('.dropify').dropify();

        $('#new_image_form').bootstrapValidator({
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'The name is required and cannot be empty'
                        }
                    }
                }
            }
        }).on('reset', function (event) {
            $('#new_image_form').data('bootstrapValidator').resetForm();
        });
    });
</script>
@stop
