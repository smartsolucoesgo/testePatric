<?php
$title = 'Calendário';
$css = [
    'assets/admin/css/plugins/fullcalendar/fullcalendar.min.css',
];
$script = [
    'assets/admin/js/plugins/fullcalendar/fullcalendar.min.js'
];
require APP . 'view/admin/_templates/initFile.php';
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-md-12">
        <i class="fa fa-users fa-3x pull-right icon-heading"></i>
        <h2>Calendário</h2>
    </div>
</div>

<div class="col-md-12 m-t-md">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <a href="<?= URL_ADMIN ?>/agenda/novo" class="btn btn-primary btn-sm">Novo</a>
        </div>
        
        <div class="ibox-content">
            <div id="calendar"></div>
        </div>
    </div>
</div>

<?php include('app/application/view/admin/elements/modal_adicionar_eventos.php') ?>

<script>
    $(function() {
        var baseUrl = '<?= URL_ADMIN ?>';
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            locale: 'pt-br',
            themeSystem: 'bootstrap',
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                // tratamento de datas
                const dateSplit = start.startStr.split('-');
                const ano = dateSplit[0];
                const mes = dateSplit[1];
                const dia = dateSplit[2];

                // imprime a data do calendário no input
                $('#data_inicio').val(ano + "-" + mes + "-" + dia);
                $('#data_final').val(ano + "-" + mes + "-" + dia);

                // abre o modal
                $('#modalCriarCompromisso').modal('show');
            },
            events: baseUrl + '/calendario/listar',
            eventDrop: function(info) {
                Swal.fire({
                    title: 'Você tem certeza sobre essa mudança?',
                    // text: "Você moverá o compromisso para outra data!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, tenho certeza!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        modifyEvent(info.event);
                    }
                })
            },
        });

        calendar.render();

        function modifyEvent(event) {
            var start = moment(event.start).format();
            var end = moment(event.end).format();

            $.ajax({
                type: 'post',
                url: "/agenda/data/update",
                data: {
                    "id": event.id,
                    "start": start,
                    "end": end
                },
                traditional: true,
                success: function(response) {
                    if (response.code == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                },
                error: function(msg) {
                    Swal.fire({
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
        }
    })
</script>

<?php
require APP . 'view/admin/_templates/endFile.php';
?>