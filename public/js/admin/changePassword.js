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

    function changePassword(){

        let emailUser = $('#emailUser').val();
        let password = $('#password').val();
        let confirmPassword = $('#confirmPassword').val();
        console.log('emailUser : ', emailUser);
        console.log('password : ', password);
        console.log('confirmPassword : ', confirmPassword);

        if (password != confirmPassword){
            Swal.fire({
                icon: 'error',
                title: 'Password tidak sama dengan Confirm Password!',
                timer: 500,
            })
        } else if (password == confirmPassword){

            $.ajax({
                type: 'POST',
                url: '/admin/change-pasword',
                data: {
                    emailUser: emailUser,
                    password: password
                },
                success: function(data) {
                    console.log('Success :  ', data);
                    Swal.fire({
                        icon: 'success',
                        title: 'Password Berhasil Diganti!',
                        timer: 900,
                    })
                    $('#changePassword').modal('hide');
                },
                error: function(data){
                    console.error('Error :  ', data);
                }
            })
        }
    }

})
