  @extends('layout')
  @section('title')
  <title>Role - Admin</title>
  @endsection
  @section('content')

    <div class="pagetitle">
      <h1>Daftar Role</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="user.html">Home</a></li>
          <li class="breadcrumb-item">Role</li>
          <li class="breadcrumb-item active">Daftar Role</li>
        </ol>
      </nav>
    </div>

    <table class="table table-striped table-hover datatable">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Role</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Siswa</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Pembimbing</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Instansi</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Admin</td>
        </tr>
      </tbody>
    </table>


   @endsection