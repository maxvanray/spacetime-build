"use strict";

$(document).ready(function() {

    $('#datatable').dataTable({
        "responsive": true
    });

    var table = $('#example').DataTable({
        "responsive": true
    });

    $('button.toggle-vis').on('click', function(e) {
        e.preventDefault();

        // Get the column API object
        var column = table.column($(this).attr('data-column'));

        // Toggle the visibility
        column.visible(!column.visible());
    });

});
