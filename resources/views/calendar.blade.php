@extends('home')

@section('calendar')

<div>

  <h2>Simple Calendar</h2>
  
  <div id="calendar"></div>

</div>



<script type="text/javascript">
  const today = new Date();
  let currentMonth = today.getMonth();
  let currentYear = today.getFullYear();

  const calendar = document.getElementById('calendar');

  function generateCalendar(month, year) {
    const startDate = new Date(year, month, 1);
    const endDate = new Date(year, month + 1, 0);

    const daysInMonth = endDate.getDate();
    const startDay = startDate.getDay();

    let html = '<table>';
    html += '<tr><th colspan="7">' + getMonthName(month) + ' ' + year + '</th></tr>';
    html += '<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>';
    html += '<tr>';

    let day = 1;
    for (let i = 0; i < 6; i++) {
      for (let j = 0; j < 7; j++) {
        if (i === 0 && j < startDay) {
          html += '<td></td>';
        } else if (day > daysInMonth) {
          break;
        } else {
          html += '<td>' + day + '</td>';
          day++;
        }
      }
      if (day > daysInMonth) {
        break;
      } else {
        html += '</tr><tr>';
      }
    }
    html += '</tr></table>';

    calendar.innerHTML = html;
  }

  function getMonthName(month) {
    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    return monthNames[month];
  }

  generateCalendar(currentMonth, currentYear);

</script>
@endsection
