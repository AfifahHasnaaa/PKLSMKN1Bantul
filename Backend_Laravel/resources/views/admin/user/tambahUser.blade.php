  @extends('layout')
  @section('title')
      <title>Tambah User - Admin</title>
  @endsection
  @section('content')
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
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif
      <div class="pagetitle">
          <h1>Tambah User</h1>
          <nav>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="user.html">Home</a></li>
                  <li class="breadcrumb-item">User</li>
                  <li class="breadcrumb-item active">Tambah User</li>
              </ol>
          </nav>
      </div>

      <div class="card">
          <div class="card-body">
              <h5 class="card-title">Tambah User</h5>
              <form enctype="multipart/form-data" action="{{ route('user.store') }}" method="POST">
                  @csrf
                  <!-- Role -->
                  <div class="row mb-3">
                      <label for="selectRole" class="col-sm-2 col-form-label">Role</label>
                      <div class="col-sm-10">
                          <select id="selectRole" name="role" class="form-select" required onchange="toggleFields()">
                              <option value="">Choose role</option>
                              <option value="siswa">Siswa</option>
                              <option value="guru">Guru</option>
                              <option value="instansi">Instansi</option>
                          </select>
                      </div>
                  </div>

                  <!-- Common Fields -->
                  <div id="commonFields">
                      <div class="row mb-3">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                              <input type="text" id="inputName" name="name" class="form-control"
                                  placeholder="Enter your name" required>
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                          <div class="col-sm-10">
                              <input type="text" id="inputUsername" name="username" class="form-control"
                                  placeholder="Enter your username" required>
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="inputUsername" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                              <input type="email" id="email" name="email" class="form-control"
                                  placeholder="Enter your email" required>
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                              <input type="password" id="inputPassword" name="password" class="form-control"
                                  placeholder="Enter your password" required>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="foto_profile" class="col-sm-2 col-form-label">Foto Profil</label>
                          <div class="col-sm-10">
                              <input type="file" name="foto_profile" id="foto_profile" class="form-control" accept="image/*">
                          </div>
                      </div>
                  </div>

                  <!-- Siswa Fields -->
                  <div id="siswaFields" style="display: none;">
                      <div class="row mb-3">
                          <label for="inputKelas" class="col-sm-2 col-form-label">Kelas</label>
                          <div class="col-sm-10">
                              <input type="text" id="inputKelas" name="kelas" class="form-control"
                                  placeholder="Enter class (for students)">
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="selectJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                          <div class="col-sm-10">
                              <select id="selectJurusan" name="jurusan_id" class="form-select">
                                  <option value="">Pilih jurusan</option>
                                  @foreach ($jurusans as $jurusan)
                                      <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="inputNisn" class="col-sm-2 col-form-label">NISN</label>
                          <div class="col-sm-10">
                              <input type="text" id="inputNisn" name="nisn" class="form-control"
                                  placeholder="Enter NISN (for students)">
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="selectPKL" class="col-sm-2 col-form-label">Tempat PKL</label>
                          <div class="col-sm-10">
                              <select id="selectPKL" name="tempat_pkl" class="form-select">
                                  <option value="">Pilih Instansi PKL</option>
                                  @foreach ($instansis as $instansi)
                                      <option value="{{ $instansi->id }}">{{ $instansi->instansi_name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                  </div>

                  <!-- Guru Fields -->
                  <div id="guruFields" style="display: none;">
                      <div class="row mb-3">
                          <label for="inputNip" class="col-sm-2 col-form-label">NIP</label>
                          <div class="col-sm-10">
                              <input type="text" id="inputNip" name="nip" class="form-control"
                                  placeholder="Enter NIP (for teachers)">
                          </div>
                      </div>
                  </div>

                  <!-- Instansi Fields -->
                  <div id="instansiFields" style="display: none;">
                      <div class="row mb-3">
                          <label for="instansi" class="col-sm-2 col-form-label">Instansi</label>
                          <div class="col-sm-10">
                              <select id="instansi" name="instansi_id" class="form-select">
                                  <option value="">Pilih Asal Instansi</option>
                                  @foreach ($instansis as $instansi)
                                      <option value="{{ $instansi->id }}">{{ $instansi->instansi_name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                  </div>

                  <!-- Submit Button -->
                  <div class="row mb-3">
                      <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Tambah Users</button>
                      </div>
                  </div>
              </form>



          </div>
      </div>
  @endsection
  @section('script')
      <script>
          function toggleFields() {
              var selectedRole = document.getElementById('selectRole').value;

              // Menyembunyikan semua fields khusus role
              document.getElementById('siswaFields').style.display = 'none';
              document.getElementById('guruFields').style.display = 'none';
              document.getElementById('instansiFields').style.display = 'none';

              // Menonaktifkan semua input fields
              var commonFields = document.querySelectorAll('#commonFields input');
              commonFields.forEach(function(input) {
                  input.disabled = false; // Enable common fields
              });

              // Menampilkan fields berdasarkan role yang dipilih
              if (selectedRole === 'siswa') {
                  document.getElementById('siswaFields').style.display = 'block';
              } else if (selectedRole === 'guru') {
                  document.getElementById('guruFields').style.display = 'block';
              } else if (selectedRole === 'instansi') {
                  document.getElementById('instansiFields').style.display = 'block';
              }

              // Menonaktifkan fields jika role tidak dipilih
              if (selectedRole === '') {
                  commonFields.forEach(function(input) {
                      input.disabled = true; // Disable fields if no role is selected
                  });
              }
          }

          // Disable fields initially
          document.addEventListener('DOMContentLoaded', function() {
              toggleFields();
          });
      </script>
  @endsection
