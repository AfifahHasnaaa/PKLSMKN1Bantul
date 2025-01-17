  @extends('layout')
  @section('title')
      <title>Jurnal Harian</title>
  @endsection
  @section('css')
      <style>
          .dataTables_filter {
              margin-bottom: 1rem;
              /* Atur jarak sesuai kebutuhan */
          }
      </style>
  @endsection
  @section('content')
      <div class="pagetitle">
          <h1>Jurnal Harian</h1>
          <nav>
              <ol class="breadcrumb">
                  @if (auth()->user()->hasRole('guru') || auth()->user()->hasRole('instansi'))
                      <li class="breadcrumb-item"><a href="{{ route('semua.siswa') }}">List Semua Siswa</a></li>
                  @endif
                  <li class="breadcrumb-item active">Jurnal Harian</li>
              </ol>
          </nav>
      </div>

      <section class="section">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <div>
                              @if ($errors->any())
                                  <div class="alert alert-danger">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                              @endif
                              @if (session('success'))
                                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                      {{ session('success') }}
                                      <button type="button" class="btn-close" data-bs-dismiss="alert"
                                          aria-label="Close"></button>
                                  </div>
                              @endif

                              <h5 class="card-title" type="button" data-bs-toggle="collapse"
                                  data-bs-target="#detailKegiatan" aria-expanded="false" aria-controls="detailKegiatan">
                                  Lihat Detail Kegiatan
                              </h5>
                              <div class="collapse mt-3" id="detailKegiatan">
                                  <div class="ms-4" style="font-size: 0.8rem;">
                                      <p><strong>Nama Peserta Didik:</strong> {{ $jurnal->siswa->name }}</p>
                                      <p><strong>Dunia Kerja Tempat PKL:</strong> {{ $jurnal->instansi->instansi_name }}</p>
                                      <p><strong>Nama Instruktur:</strong> {{ $pembimbingInstansi }}</p>
                                      <p><strong>Nama Guru Pembimbing:</strong> {{ $jurnal->guru->name }}</p>
                                      <p><strong>Pekerjaan/ Proyek:</strong> {{ $jurnal->posisi_magang }}</p>
                                  </div>
                              </div>
                          </div>

                          <div class="d-flex justify-content-between align-items-center mb-3">
                              <h5 class="card-title">Daftar Jurnal Harian</h5>
                              @hasrole('guru')
                                  <div>
                                    <a href="{{ route('jurnal.export', ['id' => $jurnal->id]) }}"
                                      class="btn btn-success btn-sm">
                                      Export Excel <i class="bi bi-file-earmark-excel"></i>
                                  </a>
                                      <a href="{{ route('indikator.tambah', ['id' => $jurnal->id]) }}"
                                          class="btn btn-success btn-sm" id="download-btn">Tambah Indikator
                                          <i class="bi bi-plus-square-dotted"></i>
                                      </a>
                                  </div>
                              @endhasrole
                          </div>

                          <table class="table table-striped table-hover datatable pt-2" style="font-size: 0.8rem;"
                              id="indikatorTable">
                              <thead class="table-primary">
                                  <tr>
                                      <th>Tanggal</th>
                                      <th>Tujuan Pembelajaran</th>
                                      <th>Deskripsi</th>
                                      <th>Status</th>
                                      <th>Skor</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  @endsection
  @section('script')
      <script>
          $(document).ready(function() {
              $('#indikatorTable').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: "{{ route('indikator.data', ['id' => $jurnal->id]) }}",
                  columnDefs: [{
                          targets: 0,
                          width: '100px'
                      }, // Lebar kolom Tanggal
                      {
                          targets: 1,
                          width: '250px'
                      }, // Lebar kolom Tujuan Pembelajaran
                      {
                          targets: 2,
                          width: '250px'
                      }, // Lebar kolom Deskripsi
                      {
                          targets: 3,
                          width: '120px'
                      }, // Lebar kolom Status
                      {
                          targets: 4,
                          width: '100px'
                      }, // Lebar kolom Skor
                      {
                          targets: 5,
                          width: '150px'
                      } // Lebar kolom Aksi
                  ],
                  columns: [{
                          data: 'tanggal_submit',
                          name: 'tanggal_submit'
                      },
                      {
                          data: 'indikator',
                          name: 'indikator'
                      },
                      {
                          data: 'deskripsi',
                          name: 'deskripsi'
                      },
                      {
                          data: 'status',
                          name: 'status'
                      },
                      {
                          data: 'skor',
                          name: 'skor'
                      },
                      {
                          data: 'action',
                          name: 'action',
                          orderable: false,
                          searchable: false
                      }
                  ]
              });
          });
      </script>
  @endsection
