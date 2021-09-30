$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    const draggables = document.querySelectorAll('.draggable')
    const containers = document.querySelectorAll('#containerChoosenSection')

    draggables.forEach(draggable => {
    draggable.addEventListener('dragstart', () => {
        draggable.classList.add('dragging')
    })

    draggable.addEventListener('dragend', () => {
        draggable.classList.remove('dragging')
    })
    })

    containers.forEach(container => {
    container.addEventListener('dragover', e => {
        e.preventDefault()
        const afterElement = getDragAfterElement(container, e.clientY)
        const draggable = document.querySelector('.dragging')
        if (afterElement == null) {
        container.appendChild(draggable)
        } else {
        container.insertBefore(draggable, afterElement)
        }
    })
    })

    function getDragAfterElement(container, y) {
    const draggableElements = [...container.querySelectorAll('.draggable:not(.dragging)')]

    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect()
        const offset = y - box.top - box.height / 2
        if (offset < 0 && offset > closest.offset) {
        return { offset: offset, element: child }
        } else {
        return closest
        }
    }, { offset: Number.NEGATIVE_INFINITY }).element
    }

    $('#containerButton').hide();

    $('.draggable').on('dragstart', function(){
    console.log('dragstart');
    })

    $('.draggable').on('dragend', function(){
    $('#containerButton').show();
    console.log('dragend');
    })

    $('#buttonSaveList').click(function(){
    let data = [];
    $('.draggable').each(function(item, index) {
        data.push($('.draggable:eq('+item+')').data('id'));
        console.log('Data Pushed');
    });

    console.log('Data : '+data);
    })

    // ------------------
    // Detail Section Page

    function getSection(){
        let idPage = $('#idPage').val();

        $.ajax({
            type: 'post',
            url: '/admin/section/get-section-data',
            data: {
                idPage: idPage,
            },
            success: function(data){

                // Choosen Section
                let containerChoosen = $('#containerChoosenSection');
                containerChoosen.empty();

                for(let i = 0; i < data[0].length; i++){
                    containerChoosen.append('<div class="draggable row" draggable="true" data-id="'+ data[0][i].idPageSection +'"><div class="col-lg-6"><label for="">'+ data[0][i].namaSection +'</label></div><div class="col-lg-6 text-right"><button class="btn btn-edit">Edit</button><button class="btn btn-edit">Hapus</button></div></div>');
                }

                // Section
                let containerSection = $('#containerSection');
                containerSection.empty();

                for(let i = 0; i < data[1].length; i++){
                    containerSection.append('<div class="row"><div class="col-lg-6"><label for="">'+ data[1][i].namaSection +'</label></div><div class="col-lg-6 text-right"><button class="btn btn-edit">Edit</button><button class="btn btn-edit">Hapus</button></div></div>');
                }

            },
            error: function(data){
                console.error('Error : ', data);
            }
        })
    }

    getSection();

})