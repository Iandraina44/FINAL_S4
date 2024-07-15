<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calendrier des Réservations</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales/fr.js'></script>
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div id='calendar'></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'fr',
                events: function(fetchInfo, successCallback, failureCallback) {
                    $.ajax({
                        url: '<?= base_url("calendrier_c/obtenir_reservations") ?>',
                        dataType: 'json',
                        success: function(data) {
                            successCallback(data);
                        },
                        error: function() {
                            failureCallback();
                        }
                    });
                },
                dateClick: function(info) {
                    var dateStr = info.dateStr;
                    window.location.href = '<?= base_url("InsertionCalendrier_c/index?date=") ?>' + dateStr;
                },
                eventDidMount: function(info) {
                    if (info.event.extendedProps.description) {
                        tippy(info.el, {
                            content: info.event.extendedProps.description,
                            placement: 'top'
                        });
                    }
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>
