$(document).ready(function() {

    // ----------------------
    // Section
    // ----------------------

    // Ajax Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $('#tableData').dataTable();

})
