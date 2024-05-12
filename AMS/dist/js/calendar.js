document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      height: '100%', 
      initialView: 'dayGridMonth',
      events: 'bdayevents.php'
    });
    calendar.render();
  });