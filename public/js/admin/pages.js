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
        console.log('idPage : ', idPage);

        $.ajax({
            type: 'POST',
            url: '/admin/halaman/edit-data',
            data: {
                idPage: idPage,
            },
            success: function(data) {
                console.log('Success :  ', data);
                $('#EditModal').modal('show');

                $('#namaPage').val(data[0].namaPage);
                $('#namaPage').data('id', data[0].idPage);
                $('#statusPage').attr('data-id', data[0].idPage);
                $('#idPage').val(data[0].idPage);

                let status = $('#statusPage');

                status.empty();

                status.append('<option value="'+ data[0].statusPage +'" selected hidden>'+ data[0].statusPage +'</option>');
                status.append('<option value="Online"> Online</option>');
                status.append('<option value="Offline"> Offline</option>');

                let container = $('#containerSubPage');
                container.empty();

                for(let i = 0; i < data[1].length; i++) {
                    container.append('<br><div class="row"><div class="col-lg-4"><input type="text" class="form-control namaPage"placeholder="Sub page name" data-id="'+ data[1][i].idPage +'" data-kolom="namaPage" value="'+ data[1][i].namaPage +'"></div><div class="col-lg-3"><select class="form-control statusPage" data-id="'+ data[1][i].idPage +'" data-kolom="statusPage"><option value="'+ data[1][i].statusPage +'" selected hidden>'+ data[1][i].statusPage +'</option><option value="Online">Online</option><option value="Offline">Offline</option></select></div><div class="col-lg-3"><button class="btn btn-delete subPageDeleteButton" data-id="'+ data[1][i].idPage +'">Delete</button></div></div>');
                }

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

    var timer;
    var timeout = 1000;

    $('body').on('keyup', '.namaPage',function(){
        let idPage = $(this).data('id');
        let kolom = $(this).data('kolom');
        let value = $(this).val();

        clearTimeout(timer);
        if ($(this).val){
            timer = setTimeout(function(){
                console.log('Data : '+ value+ idPage+ kolom);

                $.ajax({
                    type: 'POST',
                    url: '/admin/halaman/update',
                    data: {
                        idPage: idPage,
                        kolom: kolom,
                        value: value,
                    },
                    success: function(data){
                        Swal.fire({
                            icon: 'success',
                            title: 'Data Saved',
                            showConfirmButton: false,
                            timer: 500,
                            position: 'bottom-end',
                        })

                        table.draw();
                    },
                    error: function(data){
                        console.log('Error : ', data);
                    }
                })

            }, timeout);
        }
    })

    $('body').on('change', '.statusPage',function(){

        let idPage = $(this).data('id');
        let kolom = $(this).data('kolom');
        // let value = $('.statusPage[data-id="'+ idPage +'"]').val();
        let value = $("select[data-id='8'] option:selected").val();

        console.log('Data : ', value+ idPage+ kolom);
        $.ajax({
            type: 'POST',
            url: '/admin/halaman/update',
            data: {
                idPage: idPage,
                kolom: kolom,
                value: value,
            },
            success: function(data){
                Swal.fire({
                    icon: 'success',
                    title: 'Data Saved',
                    showConfirmButton: false,
                    timer: 500,
                })
            },
            error: function(data){
                console.log('Error : ', data);
            }
        })
    })

    $('#subPageAddButton').click(function(){

        let namaPage = $('#subPageNama').val();
        let statusPage = $('#subPageStatus :selected').val();
        let idPage = $('#idPage').val();

        $.ajax({
            type: 'POST',
            url: '/admin/halaman/insert-subPage',
            data: {
                namaPage: namaPage,
                statusPage: statusPage,
                idPage: idPage,
            },
            success: function(data){
                console.log('Success', data);

                $('#subPageNama').val('');

                let container = $('#containerSubPage');
                container.empty();

                for(let i=0; i<data.length; i++){
                    container.append('<br><div class="row"><div class="col-lg-4"><input type="text" class="form-control namaPage"placeholder="Sub page name" data-id="'+ data[i].idPage +'" data-kolom="namaPage" value="'+ data[i].namaPage +'"></div><div class="col-lg-3"><select class="form-control statusPage" data-id="'+ data[i].idPage +'" data-kolom="namaPage"><option value="'+ data[i].statusPage +'" selected hidden>'+ data[i].statusPage +'</option><option value="Online">Online</option><option value="Offline">Offline</option></select></div><div class="col-lg-3"><button class="btn btn-delete subPageDeleteButton" data-id="'+ data[i].idPage +'">Delete</button></div></div>');
                }
            },
            error: function(data){
                console.log('Error : ', data);
            }
        })
    })

    $('body').on('click', '.subPageDeleteButton', function(){

        let id = $(this).data('id');
        let idPage = $('#idPage').val();

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
                    type: 'post',
                    url: '/admin/halaman/delete-subPage',
                    data: {
                        idPage: idPage,
                        id: id,
                    },
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Page Deleted',
                            showConfirmButton: false,
                            timer: 500,
                        })

                        let container = $('#containerSubPage');
                        container.empty();

                        for(let i=0; i<data.length; i++){
                            container.append('<br><div class="row"><div class="col-lg-4"><input type="text" class="form-control namaPage"placeholder="Sub page name" data-id="'+ data[i].idPage +'" data-kolom="namaPage" value="'+ data[i].namaPage +'"></div><div class="col-lg-3"><select class="form-control statusPage" data-id="'+ data[i].idPage +'" data-kolom="namaPage"><option value="'+ data[i].statusPage +'" selected hidden>'+ data[i].statusPage +'</option><option value="Online">Online</option><option value="Offline">Offline</option></select></div><div class="col-lg-3"><button class="btn btn-delete subPageDeleteButton" data-id="'+ data[i].idPage +'">Delete</button></div></div>');
                        }

                    }
                })
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info');
            }
        })
    })

})
