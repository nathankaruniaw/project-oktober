$(document).ready(function(){

    // Ajax Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    var table = $('#tableData').DataTable({
        order: [0, 'desc'],
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

    $('body').on('click', '.edit-button', function(){
        $('#EditModal').modal('show');

    })

})
