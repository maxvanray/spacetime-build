'use strict';
$(function(){

    // TIME SELECT
    $(".timeselect").timeDropper({
        primaryColor: "#48CFAD",
        borderColor: "#48CFAD",
        textColor: "#48CFAD",
        meridians: true,
        format: "hh:mm A",
        setCurrentTime: false
    });

    // CHECKBOX
    $('input[type="checkbox"].custom-checkbox, input[type="radio"].custom-radio').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue',
        increaseArea: '20%'
    });

    // CLOSED
    $(".content").find('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
    $('input').on('ifChecked', function(event){
        $(this).parent().parent().parent().parent().find('.from').hide();
        $(this).parent().parent().parent().parent().find('.to').hide();
    });
    $('input').on('ifUnchecked', function(event){
        $(this).parent().parent().parent().parent().find('.from').show();
        $(this).parent().parent().parent().parent().find('.to').show();
    });
    $("input[type=checkbox]:checked").each(function(){
        $(this).parent().parent().parent().parent().find('.from').hide();
        $(this).parent().parent().parent().parent().find('.to').hide();
    });
    

    // DEFAULTS 
    var tokenval = $("#_token").data("token");
    $.fn.editable.defaults.url = '/location';
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.error = function(response, newValue) {
        if(response.status === 500) {
            return 'Service unavailable. Please try later.';
        } else {
            return response.responseText;
        }
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': tokenval
      }
    });


    // EDITABLE FIELDS
    $('#name').editable({
        type: 'text',
        title: 'Enter Location Name',
        ajaxOptions: {
            type: 'put'
        }
    });
    $('#address').editable({
        type: 'text',
        title: 'Enter Location Address',
        ajaxOptions: {
            type: 'put'
        }
    });
    $('#city').editable({
        type: 'text',
        title: 'Enter Location City',
        ajaxOptions: {
            type: 'put'
        }
    });
    $('#state').editable({
        typeahead: {
            name: 'state',
            local: ["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]
        }
    });
    $('#zip').editable({
        type: 'text',
        title: 'Enter Address',
        ajaxOptions: {
            type: 'put'
        }
    });
    $('#floor').editable({
        type: 'text',
        title: 'Enter Address',
        ajaxOptions: {
            type: 'put'
        }
    });
    $('#contact').editable({
        type: 'text',
        title: 'Enter Location Contact Name',
        ajaxOptions: {
            type: 'put'
        }
    });
    $('#email').editable({
        type: 'text',
        title: 'Enter Location Contact Name',
        ajaxOptions: {
            type: 'put'
        }
    });
    $('#phone').editable({
        type: 'text',
        title: 'Enter Location Phone Number',
        ajaxOptions: {
            type: 'put'
        }
    });
    $('#description').editable({
        type: 'text',
        title: 'Enter Location Phone Number',
        ajaxOptions: {
            type: 'put'
        }
    });


    var saveTimes = function(times){
        var id = $('#hours-of-operation').data('id');
        var CSRF_TOKEN = $('#_token').data('token');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        //console.log(times);
        $.ajax({
            method: 'POST',
            url: '/dashboard/location/'+id,
            data: JSON.stringify(times), // convert array to JSON
            dataType: 'json',
            cache: false,
            timeout: 100000,
            success: function (data) {

                console.log("SUCCESS : ", data);

            },
            error: function (e) {

                console.log("ERROR : ", e);

            }

        });
    };

    $('#update-hours').on('click', function(e){

        var collection = {};

        $('input[type=checkbox]').each(function(){
            var name = $(this).val();
            var value = (this.checked ? name : "");
            collection[name] = value;
        });

        $('input[type=text]').each(function(){
            var name = $(this).attr('name');
            var value = $(this).val();
            collection[name] = value;
        });
        
        // saveTimes(collection);
        var id = $('#hours-of-operation').data('id');
        var CSRF_TOKEN = $('#_token').data('token');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        //console.log(times);
        $.ajax({
            method: 'POST',
            url: '/dashboard/location/schedule/'+id,
            data: collection, // convert array to JSON
            dataType: 'json',
            cache: false,
            timeout: 100000,
            success: function (data) {

                console.log("SUCCESS : ", data);
                
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "1000",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "swing",
                  "showMethod": "show"
                }
                toastr["success"]("Hours of Operation have been successfully updated.", "Successfully Updated")

            },
            error: function (e) {

                console.log("ERROR : ", e);

            }

        });

    });

});