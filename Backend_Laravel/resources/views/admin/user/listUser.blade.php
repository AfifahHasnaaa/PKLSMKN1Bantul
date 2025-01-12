
  @extends('layout')
  @section('title')
  <title>User - Admin</title>
  @endsection
  @section('content')
    <div class="pagetitle">
      <h1>Daftar user</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="user.html">Home</a></li>
          <li class="breadcrumb-item">User</li>
          <li class="breadcrumb-item active">Daftar User</li>
        </ol>
      </nav>
    </div>

    <table class="table table-striped table-hover datatable">
      <thead class="table-dark">
        <tr>
          <th scope="col">Username</th>
          <th scope="col">Password</th>
          <th scope="col">Tanggal Pembuatan</th>
          <th scope="col">Terakhir Login</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Brandon</td>
          <td>bnnjfu</td>
          <td>2016-05-10</td>
          <td>2016-05-25</td>
          <td>
            <button class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#editModal"
              title="Edit">
              <i class="bi bi-pencil"></i>
            </button>
            <button class="btn btn-danger btn-sm delete-btn" data-bs-toggle="modal"
              data-bs-target="#deleteModal" title="Hapus">
              <i class="bi bi-trash"></i>
            </button>
          </td>
        </tr>
        <tr>
          <td>Bridie</td>
          <td>ghjklf</td>
          <td>2014-12-01</td>
          <td>2014-12-05</td>
          <td>
            <button class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#editModal"
              title="Edit">
              <i class="bi bi-pencil"></i>
            </button>
            <button class="btn btn-danger btn-sm delete-btn" data-bs-toggle="modal"
              data-bs-target="#deleteModal" title="Hapus">
              <i class="bi bi-trash"></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  @endsection

  
  @section('modal')
  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="edit-form">
            <div class="mb-3">
              <label for="edit-goal" class="form-label">Username</label>
              <input type="text" class="form-control" id="edit-goal" required>
            </div>
            <div class="mb-3">
              <label for="edit-goal" class="form-label">Password</label>
              <input type="password" class="form-control" id="edit-goal" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Hapus Jurnal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin ingin menghapus user ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-danger" id="confirm-delete">Hapus</button>
        </div>
      </div>
    </div>
  </div>
  @endsection

 