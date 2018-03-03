@extends('layouts/default')

{{-- Page title --}}
@section('title')
    {{ Route::currentRouteName() }}
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
            <h1>Add Media</h1>

           <?php /* {!! Form::open(['route' => 'media.post', 'files' => true]) !!}

            {{ Form::label('media', 'E-Mail Address', ['class' => 'media']) }}
            {{ Form::file('media') }}
            {{ Form::submit('Click Me!') }}
            {!! Form::close() !!} */ ?>

            <ol class="breadcrumb">
                <li>
                    <a href="index">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="active">
                    Add Media
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['route' => 'media.post', 'files' => true, 'id' => 'media']) !!}

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">
                            Name
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control"
                                   placeholder="Enter a name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">
                            Description
                        </label>
                        <div class="col-md-6">
                            <textarea id="description" name="description" rows="7"
                                      class="form-control resize_vertical"
                                      placeholder="Enter a description"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label">Categories:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="categories" id="categories" class="demo-default" value="image">
                            <p>Add Category tags to help make the images searchable.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="media">
                            <strong>Upload Media:</strong> AllowedFileExtensions (JPG, PNG and GIF )
                        </label>
                        <div class="col-md-6">
                            <input name="media" type="file" class="dropify" data-allowed-file-extensions="jpg png gif" data-max-file-size="2M" />
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

            $('#media').bootstrapValidator({
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
                $('#media').data('bootstrapValidator').resetForm();
            });
    });
</script>
@stop
