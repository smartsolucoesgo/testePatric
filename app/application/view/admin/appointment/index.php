<?php
$title = 'Compromissos - Painel de Controle';
$css = [
    'assets/admin/css/plugins/fullcalendar/fullcalendar.css',
];
$script = [
    'assets/admin/js/plugins/fullcalendar/moment.min.js',
    'assets/admin/js/plugins/fullcalendar/fullcalendar.min.js',
    'assets/admin/js/appointments/appointment.js'
];

require APP . 'view/admin/_templates/initFile.php';
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center m-t-lg">
                <h1>
                    Painel do Sistema - <?= APP_TITLE ?>
                </h1>

            </div>
        </div>
        <div class="col-lg-12 h-full">
            <div class="ibox-content h-full">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>

<?php
require APP . 'view/admin/appointment/_includes/modal-appointment.php';
require APP . 'view/admin/_templates/endFile.php';
?>