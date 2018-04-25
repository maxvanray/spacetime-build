@extends('layouts.default')

{{-- Page title --}}
@section('title')
    Images
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/fancybox/jquery.fancybox.css')}}" media="screen"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animated-masonry-gallery.css')}}" />
@stop

{{-- Page content --}}
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Media Library</h1>
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
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <a href="{{ @route('dashboard.images.create') }}" class="btn btn-success pull-right">Add New Image</a>
            </div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#list" aria-controls="list" role="tab" data-toggle="tab">List</a></li>
                <li role="presentation"><a href="#gallery" id="gallery-tab" aria-controls="gallery" role="tab" data-toggle="tab">Gallery</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="list">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered table-hover" width="100%" border="0" cellspacing="0" cellpadding="0" summary="This is a list of the images.">
                                            <thead>
                                            <tr>
                                                <th>Image Name</th>
                                                <th>Description</th>
                                                <th>Key Words</th>
                                                <th>Thumbnail</th>
                                                <th>Edit</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($images as $image)
                                                <tr>
                                                    <td class="name">{{ $image->name }}</td>
                                                    <td class="description">{{ $image->description }}</td>
                                                    <td class="keys">{{ $image->categories }}</td>
                                                    <td class="thumb">
                                                        <img rel="popover" style="width: 50px;" src="{{ url('/') }}/{{ $image->location.'/'.$image->filename }}">
                                                    </td>
                                                    <td class="edit" data-id="{{ $image->id }}">
                                                        <a href="{{ route('dashboard.images.edit', $image->id) }}" class="btn btn-primary btn-xs" >
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </a>
                                                        |
                                                        <button
                                                                class="btn btn-danger btn-xs deleteBtn"
                                                                data-id="{{ $image->id }}"
                                                                data-name="{{ $image->name }}"
                                                                data-url="{{ route('dashboard.images.destroy', $image->id) }}"
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
                                            'data-dismiss' => 'modal',
                                            ]) !!}
                                        {!! Form::button( '
                                                <span class="glyphicon glyphicon-ok-sign confirm"></span> Yes',
                                            [ 'type' => 'submit',
                                            'class' => 'btn btn-danger delete',
                                            'onclick' => 'form_submit()'
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
                </div>
                <div role="tabpanel" class="tab-pane fade" id="gallery">
                    <div class="row" id="slim">
                        <div id="gallery">
                            <div class="row m-b-10">
                                <div class="col-md-5 col-xs-12" id="gallery-header-center-left-title">
                                    All Media
                                </div>
                                <div class="pull-right">
                                    <div class="col-xs-12">
                                        <button type="button" id="filter-all" class="btn btn-responsive btn-info btn-xs">
                                            All
                                        </button>
                                        @foreach($clean_categories as $k => $v)
                                            <button type="button" id="filter-{{$v}}"
                                                    class="btn btn-responsive btn-primary btn-xs">{{$v}}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div id="gallery-content">
                                <div id="gallery-content-center">
                                    @foreach($images as $m )
                                        <a class="fancybox img-responsive"
                                           href="{{ url('/') }}/{{ $m->location.'/'.$m->filename }}"
                                           data-fancybox-group="gallery"
                                           title="Name: {{ $m->name }} | ID: {{ $m->id }} | {{ $m->description }}">
                                            <img alt="gallery" src="{{ url('/') }}/{{ $m->location.'/'.$m->filename }}" class="all @php
                                                $media_categories = $m->categories;
                                                $categories_array = explode(",", $media_categories);
                                                foreach($categories_array as $mcat){
                                                    $text = strtolower(htmlentities($mcat));
                                                    $text = str_replace(get_html_translation_table(), "-", $text);
                                                    $text = str_replace(" ", "-", $text);
                                                    $text = preg_replace("/[-]+/i", "-", $text);
                                                    echo ' '.$text.' ';
                                                }
                                            @endphp "/>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>




@stop

@section('footer_scripts')

    <script type="text/javascript" src="{{asset('assets/js/jquery.isotope.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fancybox/jquery.fancybox.pack.js')}}" ></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fancybox/helpers/jquery.fancybox-buttons.js')}}" ></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fancybox/jquery.fancybox.js')}}"></script>
    <script>
        var form_submit = function() {
            document.getElementById("formDelete").submit();
        };

        $( document ).ready(function() {
            var button = 'all';
            var container = $('#gallery-content-center');
            //container.isotope({ itemSelector: 'img' });
            $('#gallery-tab').on('click', function (e) {
                //container.isotope('destroy');
                //container.isotope('layout');
                container.delay(200).isotope({ itemSelector: 'img' });
                console.log('vvv');
            });

            $('.fancybox').fancybox();

            $("#filter-all").on('click', function() {
                container.isotope({ filter: '.all' });
                $("#gallery-header-center-left-title").html('All Media');
                button = 'all';
            });
            @foreach($clean_categories as $k => $v)
                $("#filter-{{$v}}").on('click', function() {
                    container.isotope({ filter: '.{{$v}}' });
                    $("#gallery-header-center-left-title").html('{{$v}}');
                    button = {{$v}};
                });
            @endforeach
            $('img[rel=popover]').popover({
                placement: 'left',
                html: true,
                trigger: 'hover',
                content: function () {
                    return '<div class="row"><img style="max-width: 200px;" src="'+$(this).attr('src') + '" /></div>';
                }
            });
        });
        $('.deleteBtn').on('click', function(event){
            $('#formDelete').attr("action", $(this).data('url'));
            $('#confirm').text('Are you sure you want to delete '+$(this).data('name')+'?');
        });

    </script>
@stop
