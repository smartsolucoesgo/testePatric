$(document).ready(function () {
  var calendar = $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay,listMonth",
    },
    editable: true,
    events: "/ajax?controller=Appointment&action=getAppointments&param=",
    displayEventTime: true,
    editable: true,
    eventRender: function (event, element, view) {
      if (event.allDay === "true") {
        event.allDay = true;
      } else {
        event.allDay = false;
      }
    },
    selectable: true,
    selectHelper: true,

    select: function (start, end, allDay) {
      var formattedStartDate = moment(start).format("YYYY-MM-DD");
      var formattedEndDate = moment(end).format("YYYY-MM-DD");

      $("#modal-appointment").modal("show");

      $("#btnSubmit").on("click", function () {
        var data = {
          start: formattedStartDate,
          end: formattedEndDate,
          title: "teste",
        };

        $.ajax({
          url: "/ajax",
          data: {
            controller: "Appointment",
            action: "store",
            param: data,
          },
          type: "POST",
          success: function (data) {
            setTimeout(() => {
              window.location.reload();
            }, 1000);
          },
        });

        calendar.fullCalendar("unselect");
      });
    },
    eventDrop: function (event, delta) {
      var start = $.fullCalendar.formatDate(event.start, "DD/MM/Y");
      var end = $.fullCalendar.formatDate(event.end, "DD/MM/Y");

      $.ajax({
        url: "/admin/update-to-calendar",
        data:
          "title=" +
          event.title +
          "&start=" +
          start +
          "&end=" +
          end +
          "&id=" +
          event.id,
        type: "POST",
        success: function (response) {
          toastr.info("Esse Agendamento foi Atualizado");
        },
      });
    },
  });

  function displayMessage(message) {
    $(".response").html("" + message + "");
    setInterval(function () {
      $(".success").fadeOut();
    }, 1000);
  }
});
