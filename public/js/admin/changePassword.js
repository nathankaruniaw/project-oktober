$(document).ready(function(){

    // Ajax Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $('#changePassword').click(function(){

        $('#changePasswordModal').modal('show');
    })

    

})
