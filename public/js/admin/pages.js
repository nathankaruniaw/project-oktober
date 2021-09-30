$(document).ready(function(){

    // Ajax Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    var table = $('#tableData').DataTable({
        order: [0, 'asc'],
        processing: true,
        serverSide: true,
        deferRender: true,
        autoWidth: true,
        // responsive: true,
        dom: '<"datatable-header"fBl><t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        ajax: {
            type: 'GET',
            url: '/admin/halaman/get-data',
        },
        columns: [
            { data: 'idPage', name: 'idPage' },
            { data: 'namaPage', name: 'namaPage' },
            { data: 'action', name: 'action' },
        ]
    });

    table.on('draw.dt', function () {
        var info = table.page.info();
        table.column(0, {
            search: 'applied', order: 'applied', page: 'applied'
        }).nodes().each(function (cell, i) { cell.innerHTML = i + 1 + info.start; });
    });

    $('body').on('click', '.edit-button', function(){

        let idPage = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: '/admin/halaman/edit-data',
            data: {
                idPage: idPage,
            },
            success: function(data) {
                console.error('Success :  ', data);
                $('#EditModal').modal('show');

            },
            error: function(data){
                console.error('Error :  ', data);
            }
        })


    })

    $('#addPage').click(function(){

        $('#AddModal').modal('show');
        $('#namaPage').val('');
    })

    $('#btnTambahPage').click(function(){

        let namaPage = $('#addNamaPage').val();
        let statusPage = $('#addStatusPage').val();

        $.ajax({
            type: 'POST',
            url: '/admin/halaman/add-data',
            data: {
                namaPage: namaPage,
                statusPage: statusPage,
            },
            success: function(data){
                $('#AddModal').modal('hide');

                Swal.fire({
                    icon: 'success',
                    title: 'Page Added',
                    showConfirmButton: false,
                    timer: 500,
                })

                table.draw();
            },
            error: function(data){
                console.log('Error : ', data);
            }
        })
    })

    $('body').on('click', '.delete-button', function() {

        let link = $(this).data('link');

        Swal.fire({
            title: 'Do you want to delete ?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Delete',
            denyButtonText: `Don't Delete`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    type: 'get',
                    url: link,
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Page Deleted',
                            showConfirmButton: false,
                            timer: 500,
                        })

                        table.draw();
                    }
                })
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info');
            }
        })
    })

})
