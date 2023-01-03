<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= APP_TITLE . $title ?></title>

    <link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/admin/font-awesome/css/all.css" rel="stylesheet">

    <link href="/assets/admin/css/animate.css" rel="stylesheet">
    <link href="/assets/admin/css/style.css" rel="stylesheet">
    <script src="/assets/admin/js/jquery-3.1.1.min.js"></script>
    <link href="/assets/admin/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="/assets/admin/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="/assets/admin/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>

    <link rel="shortcut icon" href="/assets/img/favicon.png">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                                <img alt="image" class="img-circle" src="/<?= $_SESSION['imagem'] ?>" style="width:40%;">
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $_SESSION['nome'] ?></strong>
                                    </span> <span class="text-muted text-xs block"> <?= $_SESSION['acesso'] ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?= URL_ADMIN ?>/account">Meus Dados</a></li>
                                <li><a href="<?= URL_ADMIN ?>/logout">Sair</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li <?php if (stripos($_SERVER['REQUEST_URI'], 'inicio') !== false) {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?= URL_ADMIN ?>"><i class="fal fa-tachometer-alt-fastest"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li <?php if (stripos($_SERVER['REQUEST_URI'], 'calendario') !== false) {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?= URL_ADMIN ?>/calendario"><i class="fal fa-calendar-check"></i> <span class="nav-label">Compromissos</span> </a>
                    </li>
                    <li <?php if (stripos($_SERVER['REQUEST_URI'], 'configuracoes') !== false) {
                            echo 'class="active"';
                        } ?>>
                        <a href="<?= URL_ADMIN ?>/configuracoes"><i class="fal fa-cogs"></i> <span class="nav-label">Configurações do Sistema</span> </a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-success " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="<?= URL_ADMIN ?>/logout">
                                <i class="fa fa-sign-out"></i> Sair
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Calendário de Compromissos</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <strong>compromissos</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="wrapper wrapper-content">
                <div class="row animated fadeInDown">
                    <div class="col-lg-10">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/assets/admin/js/plugins/fullcalendar/moment.min.js"></script>
    <script src="/assets/admin/js/bootstrap.min.js"></script>
    <script src="/assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/assets/admin/js/inspinia.js"></script>
    <script src="/assets/admin/js/plugins/pace/pace.min.js"></script>


    <!-- Custom and plugin javascript -->

    <!-- jQuery UI  -->
    <script src="/assets/admin/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- iCheck -->
    <script src="/assets/admin/js/plugins/iCheck/icheck.min.js"></script>

    <!-- Full Calendar -->
    <script src="/assets/admin/js/plugins/fullcalendar/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function() {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            /* initialize the external events
             -----------------------------------------------------------------*/


            $('#external-events div.external-event').each(function() {

                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1111999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });

            });


            /* initialize the calendar
             -----------------------------------------------------------------*/
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({

                header: {
                    locale: 'pt',
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar
                drop: function() {
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
                events: [{
                        title: 'All Day Event',
                        start: new Date(y, m, 1)
                    },
                    {
                        title: 'Long Event',
                        start: new Date(y, m, d - 5),
                        end: new Date(y, m, d - 2)
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d - 3, 16, 0),
                        allDay: false
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d + 4, 16, 0),
                        allDay: false
                    },
                    {
                        title: 'Meeting',
                        start: new Date(y, m, d, 10, 30),
                        allDay: false
                    },
                    {
                        title: 'Lunch',
                        start: new Date(y, m, d, 12, 0),
                        end: new Date(y, m, d, 14, 0),
                        allDay: false
                    },
                    {
                        title: 'Birthday Party',
                        start: new Date(y, m, d + 1, 19, 0),
                        end: new Date(y, m, d + 1, 22, 30),
                        allDay: false
                    },
                    {
                        title: 'Click for Google',
                        start: new Date(y, m, 28),
                        end: new Date(y, m, 29),
                        url: 'http://google.com/'
                    }
                ]
            });


        });
    </script>
</body>

</html>