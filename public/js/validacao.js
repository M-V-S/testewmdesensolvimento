(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

$(function() {
    //modal cadastrar
    $("#btn_add_medico").click(function () {
        $("#form_medico")[0].reset();
        $("#modal_medico").modal();
    });

    $("#btn_add_paciente").click(function () {
        $("#form_paciente")[0].reset();
        $("#modal_paciente").modal();
    });

    $("#btn_add_agendamento").click(function () {
        $("#modal_agendamento").modal();
    });

})

