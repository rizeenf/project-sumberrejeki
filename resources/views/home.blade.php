@extends('layout')

@section('content')    
<style>
  table {
    border-collapse: collapse;
  }

  th, td {
    border: 1px solid #ddd;
    padding: 1.5rem;
    text-align: center;
    cursor: pointer;
  }
  th {
    background-color: #f2f2f2;
  }
  td{
    background-color: #fff;
  }

  td:hover {
    background-color: #d8d8d8;
  }
</style>

<div class="content">
  <h1>Dashboard</h1>
    <div class="mt-1 row row-cols-1 row-cols-md-3 g-3">
      <div class="col">
        <div class="card h-100 d-lg-flex flex-row">
          <div class="card-body d-flex flex-column justify-content-around flex-grow-1 ">
            <div class="title d-flex flex-row gap-2 mb-3">
              <img src="{{asset('images/logo/Sedap-Mantap-Logo.png')}}" alt="Logo" class="cardImage">
              <h5 class="card-title">Total User</h5>
            </div>
            <div class="desc">
              {{-- DYNAMIC FROM DB --}}
              <span class="bigText">{{ $numStaff }}</span>
              <span class="smallText">users</span>
            </div>
            <a href="{{ route('staff.index') }}" class="btn btn-light rounded-lg p-1 px-3">View all</a>
          </div>
          <div class="right flex-grow-1 d-flex flex-column align-items-center justify-content-center">
            <span class="svgBarChart">
            @include('svg.barchart')
            </span>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 d-lg-flex flex-row">
          <div class="card-body d-flex flex-column justify-content-around flex-grow-1 ">
            <div class="title d-flex flex-row gap-2 mb-3">
              <img src="{{asset('images/logo/Sedap-Mantap-Logo.png')}}" alt="Logo" class="cardImage">
              <h5 class="card-title">Total Customer</h5>
            </div>
            <div class="desc">
              {{-- DYNAMIC FROM DB --}}
              <span class="bigText">{{ $numCust }}</span>
              <span class="smallText">customers</span>
            </div>
            <a href="{{ route('customer.index') }}" class="btn btn-light rounded-lg p-1 px-3">View all</a>
          </div>
          <div class="right flex-grow-1 d-flex flex-column align-items-center justify-content-center">
            <span class="svgBarChart">
            @include('svg.barchart')
            </span>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 d-lg-flex flex-row">
          <div class="card-body d-flex flex-column justify-content-around flex-grow-1 ">
            <div class="title d-flex flex-row gap-2 mb-3">
              <img src="{{asset('images/logo/Sedap-Mantap-Logo.png')}}" alt="Logo" class="cardImage">
              <h5 class="card-title">Total Visit</h5>
            </div>
            <div class="desc">
              {{-- DYNAMIC FROM DB --}}
              <span class="bigText">{{ $numVisit }}</span>
              <span class="smallText">visitor</span>
            </div>
            <a href="{{ route('call') }}" class="btn btn-light rounded-lg p-1 px-3">View all</a>
          </div>
          <div class="right flex-grow-1 d-flex flex-column align-items-center justify-content-center">
            <span class="svgBarChart">
            @include('svg.barchart')
            </span>
          </div>
        </div>
        
      </div>

      

      <div class="col">
        <div class="card h-100 d-lg-flex flex-row">
          <div class="card-body d-flex flex-column justify-content-around flex-grow-1 ">
            <div class="title d-flex flex-row gap-2 mb-3">
            </div>
            {!! $totalUserChart->container() !!}
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 d-lg-flex flex-row">
          <div class="card-body d-flex flex-column justify-content-around flex-grow-1 ">
            <div class="title d-flex flex-row gap-2 mb-3">
            </div>
            {!! $totalVisitorChart->container() !!}
          </div>
        </div>
      </div>


      <div class="col d-flex flex-column gap-2">
        <div class="card h-50 d-lg-flex flex-row">
          <div class="card-body d-flex flex-column justify-content-around flex-grow-1 ">
            <div class="title d-flex flex-row gap-2 mb-3">
              <!-- <img src="{{asset('images/logo/Sedap-Mantap-Logo.png')}}" alt="Logo" class="cardImage"> -->
              <h5 class="card-title">Mulai Kunjungan Toko</h5>
            </div>
            <!-- <div class="desc">
              {{-- DYNAMIC FROM DB --}}
              <span class="bigText">14</span>
              <span class="smallText">visitor</span>
            </div> -->
            <a href="{{ route('visit.listCustomer') }}" class="btn btn-light rounded-lg p-1 px-3">Mulai</a>
          </div>
          <!-- <div class="right flex-grow-1 d-flex flex-column align-items-center justify-content-center">
            <span class="svgBarChart">
            @include('svg.barchart')
            </span>
          </div> -->
        </div>
        <div class="card h-50 d-lg-flex flex-row">
          <div class="card-body d-flex flex-column justify-content-around flex-grow-1 ">
            <div class="title d-flex flex-row gap-2 mb-3">
              <!-- <img src="{{asset('images/logo/Sedap-Mantap-Logo.png')}}" alt="Logo" class="cardImage"> -->
              <h5 class="card-title">Mulai Campaign</h5>
            </div>
            <!-- <div class="desc">
              {{-- DYNAMIC FROM DB --}}
              <span class="bigText">14</span>
              <span class="smallText">visitor</span>
            </div> -->
            <a href="{{ route('visit.listOutlet') }}" class="btn btn-light rounded-lg p-1 px-3">Mulai</a>
          </div>
          <!-- <div class="right flex-grow-1 d-flex flex-column align-items-center justify-content-center">
            <span class="svgBarChart">
            @include('svg.barchart')
            </span>
          </div> -->
        </div>
        {{-- @yield('calendar') --}}

        
      </div>
      <div>
   
        <div id="calendar"></div>
      
      </div>


      
    </div>
  </div>
</div>


<script src="{{ $totalUserChart->cdn() }}"></script>
<script src="{{ $totalVisitorChart->cdn() }}"></script>

{{ $totalUserChart->script() }}
{{ $totalVisitorChart->script() }}

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

    const taskModal = document.getElementById('taskModal');
    let selectedDate = null;


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

  function showTaskModal() {
  taskModal.style.display = 'block';
}


  generateCalendar(currentMonth, currentYear);

</script>
@endsection
