  @extends('layout')
  @section('title')
  <title>Dashboard - Admin</title>
  @endsection
  @section('style')
  <style>
    .headeer {
        background-color: #ffffff;
        padding: 20px;
        width: 100%;
        height: auto;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    h3{
      padding-top: 2%;
      font-size:x-large;
      font-weight: bold;
    }
    .header h1 {
        font-size: 24px;
        color: #333;
    }
    .header p {
        font-size: 16px;
        color: #666;
    }
    .progress-container {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }
    .cardd {
        background-color: #4A90E2;
        color: #fff;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        flex: 1 1 calc(33.333% - 20px);
        max-width: 300px;
        min-width: 200px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
    .cardd h2 {
        font-size:large;
        margin-bottom: 10px;
    }
    .cardd p {
        font-size:medium;
    }

    @media (max-width: 768px) {
        .cardd {
            flex: 1 1 calc(50% - 20px);
        }
    }

    @media (max-width: 480px) {
        .cardd {
            flex: 1 1 100%;
        }
    }
  </style>
  @endsection
  @section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>


    <div>
      <div class="headeer">
      <h1>Selamat Datang</h1>
      <p>di Website PKL TKJ SMKN 1 Bantul</p>
    </div>
    <h3>Pengguna Website</h3>
    <div class="progress-container">
      <div class="cardd">
          <h2>{{ $siswa }}</h2>
          <p><span><i class="bi-person"></i></span>Siswa</p>
      </div>
      <div class="cardd">
          <h2>{{ $guru }}</h2>
          <p><span><i class="bi-person"></i></span>Pembimbing</p>
      </div>
      <div class="cardd">
          <h2>{{ $instansi }}</h2>
          <p><span><i class="bi-person"></i></span>Instansi</p>
      </div>
    </div>

    <h3>Laporan</h3>
     <!-- Reports -->
     <div class="col mt-3 ms-3 me-3">
      <div class="card p-3">

        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>

        <div class="card-body">
          <h5 class="card-title">Reports <span>/Today</span></h5>
          <div id="reportsChart"></div>
    </div>
  @endsection

  @section('script')
  <script>
document.addEventListener("DOMContentLoaded", function () {
    fetch("{{ url('/chart-data') }}")
        .then(response => response.json())
        .then(data => {
            let years = data.map(item => item.year);
            let siswaData = data.map(item => item.siswa);
            let guruData = data.map(item => item.guru);
            let instansiData = data.map(item => item.instansi);

            new ApexCharts(document.querySelector("#reportsChart"), {
                series: [
                    { name: 'Siswa', data: siswaData },
                    { name: 'Guru', data: guruData },
                    { name: 'Instansi', data: instansiData }
                ],
                chart: {
                    height: 350,
                    type: 'area',
                    toolbar: { show: false }
                },
                markers: { size: 4 },
                colors: ['#4154f1', '#2eca6a', '#ff771d'],
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.4,
                        stops: [0, 90, 100]
                    }
                },
                dataLabels: { enabled: false },
                stroke: { curve: 'smooth', width: 2 },
                xaxis: { categories: years, type: 'category' },
                tooltip: { x: { format: 'yyyy' } }
            }).render();
        })
        .catch(error => console.error("Error fetching chart data:", error));
});
</script>
  @endsection