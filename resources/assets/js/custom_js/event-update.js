'use strict';
$(function(){

    $('#floor').editable({
        type: 'text',
        title: 'Enter Address',
        ajaxOptions: {
            type: 'put'
        }
    });

});