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
  });
});
