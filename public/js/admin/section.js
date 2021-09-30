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
            url: '/admin/section/get-data',
        },
        columns: [
            { data: 'idPage', name: 'idPage' },
            { data: 'statusPage', name: 'statusPage' },
            { data: 'namaPage', name: 'namaPage' },
            { data: 'subPage', name: 'subPage' },
            { data: 'action', name: 'action' },
        ]
    });

    table.on('draw.dt', function () {
        var info = table.page.info();
        table.column(0, {
            search: 'applied', order: 'applied', page: 'applied'
        }).nodes().each(function (cell, i) { cell.innerHTML = i + 1 + info.start; });
    });
})
