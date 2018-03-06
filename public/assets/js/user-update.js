'use strict';
$(function(){

    // DEFAULTS
    $.fn.editable.defaults.url = '/user';
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.error = function(response, newValue) {
        if(response.status === 500) {
            return 'Service unavailable. Please try later.';
        } else {
            return response.responseText;
        }
    };

    // AJAX SETUP
    var tokenval = $("#_token").data("token");
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': tokenval
      }
    });

    // EDITABLE FIELDS
    $('#name').editable();
    $('#last_name').editable();
    $('#email').editable();
    $('#phone').editable();
    $('#address').editable();
    $('#city').editable();
    $('#state').editable({
        typeahead: {
            name: 'state',
            local: ["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]
        }
    });
    $('#zip').editable();

});