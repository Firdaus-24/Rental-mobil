@extends('template.layouts.auth')

@section('content')
  <h6 class="mb-0 font-weight-bolder text-capitalize ms-2">
    General
  </h6>
  <div class="mb-3 row">
    {{-- <div class="col-xl-3 col-sm-6 mb-xl-0">
      <div class="card">
        <div class="p-3 card-body">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="mb-0 text-sm text-capitalize font-weight-bold">Jumlah User Aktif</p>
                <h5 class="mb-0 font-weight-bolder">
                  {{ $activeUsers }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="text-center shadow icon icon-shape bg-gradient-danger border-radius-md">
                <i class="text-lg fas fa-users opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0">
      <div class="card">
        <div class="p-3 card-body">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="mb-0 text-sm text-capitalize font-weight-bold">Jumlah Divisi Aktif</p>
                <h5 class="mb-0 font-weight-bolder">
                  {{ $activeDivisions }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="text-center shadow icon icon-shape bg-gradient-danger border-radius-md">
                <i class="text-lg fas fa-warehouse opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <h6 class="mb-0 font-weight-bolder text-capitalize ms-2">
    Total Amprah
  </h6>
  <div class="mb-3 row">
    <div class="col-xl-3 col-sm-6 mb-xl-0">
      <div class="card">
        <div class="p-3 card-body">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="mb-0 text-sm text-capitalize font-weight-bold">Semua Amprah</p>
                <h5 class="mb-0 font-weight-bolder">
                  {{ $amprahAll }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="text-center shadow icon icon-shape bg-gradient-danger border-radius-md">
                <i class="text-lg fas fa-book opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0">
      <div class="card">
        <div class="p-3 card-body">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="mb-0 text-sm text-capitalize font-weight-bold">Jumlah Permintaan Baru</p>
                <h5 class="mb-0 font-weight-bolder">
                  {{ $amprahNewRequest }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="text-center shadow icon icon-shape bg-gradient-info border-radius-md">
                <i class="text-lg fas fa-book opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0">
      <div class="card">
        <div class="p-3 card-body">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="mb-0 text-sm text-capitalize font-weight-bold">Jumlah Sedang Proses</p>
                <h5 class="mb-0 font-weight-bolder">
                  {{ $amprahProcess }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="text-center shadow icon icon-shape bg-gradient-warning border-radius-md">
                <i class="text-lg fas fa-book opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0">
      <div class="card">
        <div class="p-3 card-body">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="mb-0 text-sm text-capitalize font-weight-bold">Jumlah Sudah Selesai</p>
                <h5 class="mb-0 font-weight-bolder">
                  {{ $amprahDone }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="text-center shadow icon icon-shape bg-gradient-success border-radius-md">
                <i class="text-lg fas fa-book opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <h6 class="mb-0 font-weight-bolder text-capitalize ms-2">
    Total Surat
  </h6>
  <div class="mb-3 row">
    <div class="col-xl-3 col-sm-6 mb-xl-0">
      <div class="card">
        <div class="p-3 card-body">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="mb-0 text-sm text-capitalize font-weight-bold">Semua Surat</p>
                <h5 class="mb-0 font-weight-bolder">
                  {{ $letterAll }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="text-center shadow icon icon-shape bg-gradient-danger border-radius-md">
                <i class="text-lg fas fa-envelope opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    {{-- <div class="col-xl-3 col-sm-6 mb-xl-0">
      <div class="card">
        <div class="p-3 card-body">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="mb-0 text-sm text-capitalize font-weight-bold">Jumlah Masuk</p>
                <h5 class="mb-0 font-weight-bolder">
                  {{ $letterIn }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="text-center shadow icon icon-shape bg-gradient-info border-radius-md">
                <i class="text-lg fas fa-envelope opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    {{-- <div class="col-xl-3 col-sm-6 mb-xl-0">
      <div class="card">
        <div class="p-3 card-body">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="mb-0 text-sm text-capitalize font-weight-bold">Jumlah Keluar</p>
                <h5 class="mb-0 font-weight-bolder">
                  {{ $letterOut }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="text-center shadow icon icon-shape bg-gradient-warning border-radius-md">
                <i class="text-lg fas fa-envelope opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
  </div>

  {{-- <div class="mb-3 row">
    <div class="col-xl-3 col-sm-6 mb-xl-0">
      <div class="card">
        <div class="p-3 card-body">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="mb-0 text-sm text-capitalize font-weight-bold">Jumlah Arsip</p>
                <h5 class="mb-0 font-weight-bolder">
                  {{ $archive }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="text-center shadow icon icon-shape bg-gradient-danger border-radius-md">
                <i class="text-lg fas fa-archive opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
@endsection
@push('template.pages.dashboard.index')
  <script>
    window.onload = function() {
      var ctx = document.getElementById("chart-bars").getContext("2d");

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
            maxBarThickness: 6
          }, ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 15,
                font: {
                  size: 14,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
                color: "#fff"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false
              },
              ticks: {
                display: false
              },
            },
          },
        },
      });


      var ctx2 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

      var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
      gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: "Mobile apps",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#cb0c9f",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
              maxBarThickness: 6

            },
            {
              label: "Websites",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#3A416F",
              borderWidth: 3,
              backgroundColor: gradientStroke2,
              fill: true,
              data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
              maxBarThickness: 6
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#b2b9bf',
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#b2b9bf',
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });
    }
  </script>
@endpush
