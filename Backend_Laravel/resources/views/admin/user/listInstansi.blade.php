
  @extends('layout')
  @section('title')
  <title>Daftar Instansi</title>
  @endsection
  @section('css')
  <style>
    .dataTables_filter {
        margin-bottom: 1rem; /* Atur jarak sesuai kebutuhan */
    }
  </style>
  @endsection
  @section('content')
    <div class="pagetitle">
      <h1>Daftar Instansi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Daftar Instansi</li>
        </ol>
      </nav>
    </div>

        <table id="instansi-table" class="table table-striped table-hover pt-2 " style="font-size: 0.8rem;">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kontak</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data akan diisi secara dinamis -->
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

 @section('script')
 <script>
  $(document).ready(function() {
            $('#instansi-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('data.instansi') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'instansi_name', name: 'instansi_name' },
                    { data: 'instansi_address', name: 'instansi_address' },
                    { data: 'instansi_contact', name: 'instansi_contact' },
                    { data: 'opsi', name: 'opsi', orderable: false, searchable: false }
                ]
            });
        });
 </script>

 @endsection