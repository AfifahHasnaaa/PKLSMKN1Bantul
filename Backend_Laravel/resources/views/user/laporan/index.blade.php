  @extends('layout')
  @section('title')
  <title>Nilai Akhir Laporan</title>
  @endsection
  @section('content')

    <div class="pagetitle">
      <h1>Nilai</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="user.html">Home</a></li>
          <li class="breadcrumb-item">Laporan</li>
          <li class="breadcrumb-item active">Nilai</li>
        </ol>
      </nav>
    </div>
    <div class="row text-center">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="card-title">Daftar Nilai</h5>
        @hasrole('guru')
        <div>
          <a href="{{ route('nilai.input',['id' => $jurnal->id_siswa] ) }}" class="btn btn-success btn-sm">Input Nilai <i class="bi bi-plus"></i>
          </a>
        </div>
        @endhasrole
      </div>
      <div class="col-xl-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title" style="font-weight: bolder;">Nilai Jurnal</h5>
            <p style="font-weight: bold;font-size:xx-large;">{{ $nilaiJurnal }}</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered" style="font-weight:300;font-size:small;">
              Lihat Detail
            </button>
            <div class="modal fade" id="verticalycentered" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Nilai Jurnal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    {{ $nilaiJurnal }} 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title" style="font-weight: bolder;">Nilai Presentasi</h5>
            <p style="font-weight: bold;font-size:xx-large;">{{ $nilaiPresentasi }}</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered" style="font-weight:300;font-size:small;">
              Lihat Detail
            </button>
            <div class="modal fade" id="verticalycentered" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Nilai Presentasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    {{ $nilaiPresentasi }}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><div class="col-xl-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title" style="font-weight: bolder;">Nilai Laporan</h5>
            <p style="font-weight: bold;font-size:xx-large;">{{ $nilaiLaporan }}</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered" style="font-weight:300;font-size:small;">
              Lihat Detail
            </button>
            <div class="modal fade" id="verticalycentered" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Nilai Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    {{ $nilaiLaporan }} 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title" style="font-weight: bolder;">Nilai Aakhir</h5>
            <p style="font-weight: bold;font-size:xx-large;">{{ $nilaiAkhir }}</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered" style="font-weight:300;font-size:small;">
              Lihat Detail
            </button>
            <div class="modal fade" id="verticalycentered" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Nilai Akhir</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    {{ $nilaiAkhir }} 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  @endsection

@section('modal')
  <!-- Unduh Nilai -->
  <div class="modal fade" id="unduhModal" tabindex="-1" aria-labelledby="unduhModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="card-title">Nilai</h5>
          </div>
          <table class="table">
            <thead>
              <tr class="table-primary">
                <th scope="col">No</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <tr class="table-light">
                <th scope="row">1</th>
                <td>Nilai Jurnal</td>
                <td>98</td>
              </tr>
              <tr class="table-info">
                <th scope="row">2</th>
                <td>Nilai Presentasi</td>
                <td>99</td>
              </tr>
              <tr class="table-light">
                <th scope="row">3</th>
                <td>Nilai Laporan</td>
                <td>100</td>
              </tr>
              <tr class="table-info">
                <th scope="row">4</th>
                <td>Nilai Akhir</td>
                <td>98,45</td>
              </tr>
            </tbody>
          </table>
          <div class="modal-footer">
            <button class="btn btn-success btn-sm"title="Unduh">
              Download <i class="bi bi-download"></i>
            </button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
