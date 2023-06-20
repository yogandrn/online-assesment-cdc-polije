@extends('admin.main')

@section('container')

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-6 col-md-4 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <h5 class="text mb-0 text-uppercase font-weight-bold">Gaya Kepribadian</h5>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="ni ni-app text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <h5 class="text mb-0 text-uppercase font-weight-bold">Minat Karir</h5>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="ni ni-world-2 text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <h5 class="text mb-0 text-uppercase font-weight-bold">User</h5>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-dark shadow-dark text-center rounded-circle">
                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    {{-- <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <img src="{{url('assets/img/dashboard.jpg')}}" style="width: 100%;">
      </div>
    </div> --}}
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="chart-container w-100">
          {{-- Dummy Form untuk mengambil value by id dalam javascript  --}}
          <form action="" method="post">
            <input type="hidden" name="day1" id="day1" value="{{$test[0][0]}}">
            <input type="hidden" name="day2" id="day2" value="{{$test[1][0]}}">
            <input type="hidden" name="day3" id="day3" value="{{$test[2][0]}}">
            <input type="hidden" name="day4" id="day4" value="{{$test[3][0]}}">
            <input type="hidden" name="day5" id="day5" value="{{$test[4][0]}}">
            <input type="hidden" name="day6" id="day6" value="{{$test[5][0]}}">
            <input type="hidden" name="day7" id="day7" value="{{$test[6][0]}}">
            <input type="hidden" name="jml1" id="jml1" value="{{$test[0][1]}}">
            <input type="hidden" name="jml2" id="jml2" value="{{$test[1][1]}}">
            <input type="hidden" name="jml3" id="jml3" value="{{$test[2][1]}}">
            <input type="hidden" name="jml4" id="jml4" value="{{$test[3][1]}}">
            <input type="hidden" name="jml5" id="jml5" value="{{$test[4][1]}}">
            <input type="hidden" name="jml6" id="jml6" value="{{$test[5][1]}}">
            <input type="hidden" name="jml7" id="jml7" value="{{$test[6][1]}}">
          </form>
          <h6 class="chart-heading mt-3 font-weight-bold" style="color: #00081d; text-align: center; font-size: 1rem;">
            Log Aktivitas Test
          </h6>
          <canvas id="testChart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-5 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
          <div class="chart-container w-100">
          {{-- Dummy Form untuk mengambil value by id dalam javascript  --}}
          <form action="" method="post">
            <input type="hidden" name="mahasiswa" id="mahasiswa" value="{{$user['mahasiswa']}}">
            <input type="hidden" name="alumni" id="alumni" value="{{$user['alumni']}}">
            <input type="hidden" name="umum" id="umum" value="{{$user['umum']}}">
          </form>
          <h6 class="chart-heading mt-3 font-weight-bold" style="color: #00081d; text-align: center; font-size: 1rem;">
            Diagram Data User
          </h6>
          <canvas id="userChart" class="mb-4"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script type="text/javascript">

// Diagram Test 
let day1 = document.getElementById('day1');
let day2 = document.getElementById('day2');
let day3 = document.getElementById('day3');
let day4 = document.getElementById('day4');
let day5 = document.getElementById('day5');
let day6 = document.getElementById('day6');
let day7 = document.getElementById('day7');
let jml1 = document.getElementById('jml1');
let jml2 = document.getElementById('jml2');
let jml3 = document.getElementById('jml3');
let jml4 = document.getElementById('jml4');
let jml5 = document.getElementById('jml5');
let jml6 = document.getElementById('jml6');
let jml7 = document.getElementById('jml7');

let testChart = document.getElementById('testChart').getContext('2d');
    let chart1 = new Chart(testChart, {
        type: 'line',
        data: {
            labels: [day1.value, day2.value, day3.value, day4.value, day5.value, day6.value, day7.value],
            datasets: [{
                label: '# Jumlah',
                data : [jml1.value, jml2.value, jml3.value, jml4.value, jml5.value, jml6.value, jml7.value],
                backgroundColor: [
                  'rgba(84, 89, 158, 1)',
                  'rgba(132, 94, 194, 1)',
                  'rgba(214, 93, 177, 1)',
                  'rgba(255, 111, 145, 1)',
                  'rgba(255, 150, 113, 1)',
                  'rgba(255, 199, 95, 1)',
                  'rgba(255, 111, 145, 1)',
                ],
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
            categoryPercentage: 0.8,
            barPercentage: 0.9
        }]
            }
        }
    });


// Diagram User   
let mhs = document.getElementById('mahasiswa');
let alumni = document.getElementById('alumni');
let umum = document.getElementById('umum');

let userChart = document.getElementById('userChart').getContext('2d');
    let chart2 = new Chart(userChart, {
        type: 'doughnut',
        data: {
            labels: ['Umum', 'Mahasiswa Polije', 'Alumni Polije',],
            datasets: [{
                data : [umum.value, mhs.value, alumni.value,],
                // data: [70, 60, 20, 10, 30, 70],
                backgroundColor: [
                  'rgba(255, 199, 95, 1)',
                  'rgba(137, 128, 245, 1)',
                  // 'rgba(132, 94, 194, 1)',
                  'rgba(59, 169, 156, 1)',
                  // 'rgba(255, 111, 145, 1)',
                  // 'rgba(255, 150, 113, 1)',
                ],
                borderColor: [
                  'rgba(255, 199, 95, 1)',
                  'rgba(137, 128, 245, 1)',
                  // 'rgba(132, 94, 194, 1)',
                  'rgba(59, 169, 156, 1)',
                  // 'rgba(255, 111, 145, 1)',
                  // 'rgba(255, 150, 113, 1)',
                ],
                borderWidth: 1,
                borderRadius: Number.MAX_VALUE,
                fill: true,
                borderSkipped: false,
            }]
        },
        // options: {
        //     responsive: true,
        //     scales: {
        //         yAxes: [{
        //             ticks: {
        //                 beginAtZero: true
        //             }
        //         }],
        //         xAxes: [{
        //     categoryPercentage: 0.8,
        //     barPercentage: 0.9
        // }]
        //     }
        // }
    });
</script>
@endsection
