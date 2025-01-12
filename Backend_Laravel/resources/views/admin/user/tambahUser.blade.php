  @extends('layout')
  @section('title')
  <title>Tambah User - Admin</title>
  @endsection
  @section('content')

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
        <form>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputNumber" class="col-sm-2 col-form-label">File Upload (*isi otomatis dengan excel)</label>
            <div class="col-sm-10">
              <input class="form-control" type="file" id="formFile">
            </div>
          </div>
          
          <div class="row mb-3">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit Form</button>
            </div>
          </div>

        </form>

      </div>
    </div>

  @endsection