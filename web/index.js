$(document).ready(function () {


    window.modal = $('.modal');

    // On show modal, set fields
    window.modal.on('shown.bs.modal', function () {

        const clickedDiv = $('#clicked');

        const docName = clickedDiv.find('span:eq(0)').text();
        const docCrm = clickedDiv.find('span:eq(1)').text();

        const name = window.localStorage.getItem('name') || '';
        const cpf = window.localStorage.getItem('cpf') || '';
        const birth = window.localStorage.getItem('birth') || '';
        const source_id = window.localStorage.getItem('source_id') || '';

        window.modal.find('span:eq(0)').text(docName + ' (' + docCrm + ')');
        window.modal.find('input[name=name]').val(name);
        window.modal.find('input[name=cpf]').val(cpf);
        window.modal.find('input[name=birth]').val(birth);
        window.modal.find('select').val(source_id);

        enableAllTooltips();
    });

    // On hide modal, cache fields and unset clicked id
    window.modal.on('hide.bs.modal', function () {

        const form = $('.modal form');

        const name = form.find('input[name=name]').val() || '';
        const birth = form.find('input[name=birth]').val() || '';
        const cpf = form.find('input[name=cpf]').val() || '';
        const source_id = form.find('select[name=source]').val() || '';

        window.localStorage.setItem('name', name);
        window.localStorage.setItem('cpf', cpf);
        window.localStorage.setItem('birth', birth);
        window.localStorage.setItem('source_id', source_id);

        $('#clicked').attr('id', null);
    });

    enableAllTooltips();
});

// Show the form modal and sets 'clicked' as the id of the clicked doctor card
function showModal(event) {
    $('.modal').modal('show');
    const clickedButton = $(event.target);
    const div = clickedButton.parents('.col-auto.mt-3');
    div.attr('id', 'clicked');
}

function hideModal(event) {
    $('.modal').modal('hide');
}

// Toggle visibility of doctors card accordingly to their specialties
function onSelectSpecialty(specialty_id) {

    const results = $('.results').children();

    for (const result of results) {
        const elem = $(result);
        if (elem.attr('specialty-id') == specialty_id) {
            elem.removeClass('d-none');
        } else {
            elem.addClass('d-none');
        }
    }

    const totalCount = $('.results .col-auto.mt-3').length;
    const notDisplayingCount = $('.results .col-auto.mt-3.d-none').length;
    if (totalCount != notDisplayingCount) {
        $('#no-results').addClass('d-none');
    } else {
        $('#no-results').removeClass('d-none');
    }
}

// Try to insert form info on database via AJAX call
function onSubmitForm(event) {

    event.preventDefault(); // prevents page from refresh

    const clicked = $('#clicked');
    const form = $('.modal form');

    const name = form.find('input[name=name]').val();
    const birth = form.find('input[name=birth]').val();
    const cpf = form.find('input[name=cpf]').val();
    const source_id = form.find('select[name=source]').val();

    const professional_id = clicked.attr('professional-id'); 
    const specialty_id = clicked.attr('specialty-id'); 

    const data = {name, birth, cpf, source_id, professional_id, specialty_id};

    $.ajax({
        type: 'POST',
        url: 'form_post.php',
        dataType: "json",
        data: data,
        encode: true,
        success: function (data) {
            hideModal();
            Swal.fire({
                icon: 'success',
                title: 'Enviado!',
                html: 
                    `Seu agendamento foi realizado com sucesso.<br><br>
                    <div class="text-start">
                    Protocolo: ${data.id}<br>
                    Agendado em: ${data.datetime}
                    </div>`
            });
        },
        error: function (xhr, _ajaxOptions, _thrownError) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: xhr.responseText
            });
        }
    });
}

function enableAllTooltips() {
    $('[data-bs-toggle="tooltip"]').tooltip();
}