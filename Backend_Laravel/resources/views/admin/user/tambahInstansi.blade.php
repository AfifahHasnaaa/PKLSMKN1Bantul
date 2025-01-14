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
              <form action="{{ route('instansi.store') }}" method="POST">
                  @csrf

                  <!-- Common Fields -->
                  <div id="commonFields">
                      <div class="row mb-3">
                          <label for="inputUsername" class="col-sm-2 col-form-label">Nama Instansi</label>
                          <div class="col-sm-10">
                              <input type="text" id="inputUsername" name="instansi_name" class="form-control"
                                  placeholder="Enter your Instansi name" required>
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="inputUsername" class="col-sm-2 col-form-label">Alamat Instansi</label>
                          <div class="col-sm-10">
                              <input type="text" id="email" name="instansi_address" class="form-control"
                                  placeholder="Enter your instansi address" required>
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="inputUsername" class="col-sm-2 col-form-label">Kontak Instansi</label>
                          <div class="col-sm-10">
                              <input type="text" id="email" name="instansi contact" class="form-control"
                                  placeholder="Enter your instansi contact" required>
                          </div>
                      </div>
                  </div>

                  <!-- Submit Button -->
                  <div class="row mb-3">
                      <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Tambah Instansi</button>
                      </div>
                  </div>
              </form>



          </div>
      </div>
  @endsection
  @section('script')
 
  @endsection
