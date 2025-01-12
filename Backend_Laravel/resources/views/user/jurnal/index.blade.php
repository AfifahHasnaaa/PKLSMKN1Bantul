  @extends('layout')
  @section('title')
  <title>Jurnal Harian</title>
  @endsection
  @section('content')

    <div class="pagetitle">
      <h1>Jurnal Harian</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="user.html">Home</a></li>
          <li class="breadcrumb-item">Jurnal</li>
          <li class="breadcrumb-item active">Jurnal Harian</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title">Daftar Jurnal Harian</h5>
                <div>
                  <button class="btn btn-success btn-sm" id="download-btn">Download 
                    <i class="bi bi-download"></i>
                  </button>
                </div>
              </div>

              <table class="table table-striped table-hover datatable">
                <thead class="table-dark">
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
                  <tr>
                    <td>2025/01/11</td>
                    <td>Meningkatkan pemahaman materi algoritma</td>
                    <td>Belajar membuat flowchart</td>
                    <td><span class="badge bg-success">Sudah</span></td>
                    <td>--</td>
                    <td>
                      <button class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#editModal"
                        title="Edit">
                        <i class="bi bi-pencil"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>2025/01/10</td>
                    <td>Meningkatkan keterampilan coding</td>
                    <td>Mempraktikkan CRUD pada Laravel</td>
                    <td><span class="badge bg-success">Sudah</span></td>
                    <td>--</td>
                    <td>
                      <button class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#editModal"
                        title="Edit">
                        <i class="bi bi-pencil"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
   @endsection
   @section('modal')
  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Jurnal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="edit-form">
            <div class="mb-3">
              <label for="edit-desc" class="form-label">Deskripsi</label>
              <textarea class="form-control" id="edit-desc" rows="3" ></textarea>
            </div>
            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Status</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                  <label class="form-check-label" for="gridRadios1">
                    Sudah
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                  <label class="form-check-label" for="gridRadios2">
                    Belum
                  </label>
                </div>
              </div>
            </fieldset>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
   @endsection
