<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script src='fullcalendar/dist/index.global.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.cjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.d.ts"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/LICENSE.md"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/package.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.1/README.md"></script>

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>