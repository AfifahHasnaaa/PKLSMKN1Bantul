  @extends('layout')
  @section('title')
      <title>Edit User</title>
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
          <h1>Edit User</h1>
          <nav>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('list.siswa') }}">List User</a></li>
                  <li class="breadcrumb-item active">Edit User</li>
              </ol>
          </nav>
      </div>

      <div class="card">
          <div class="card-body">
              <h5 class="card-title">Edit User</h5>
              <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Common Fields --}}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-select" required disabled>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                <option value="guru" {{ $user->role == 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="instansi" {{ $user->role == 'instansi' ? 'selected' : '' }}>Instansi</option>
            </select>
        </div>

        {{-- Role-Based Forms --}}
        @if ($user->role == 'admin')
            {{-- Admin Form --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
        @elseif ($user->role == 'siswa')
            {{-- Siswa Form --}}
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" name="nisn" id="nisn" class="form-control" value="{{ old('nisn', $user->nisn) }}">
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control" value="{{ old('kelas', $user->kelas) }}">
            </div>
            <div class="mb-3">
                <label for="jurusan_id" class="form-label">Jurusan</label>
                <select name="jurusan_id" id="jurusan_id" class="form-select">
                    @foreach ($jurusans as $jurusan)
                        <option value="{{ $jurusan->id }}" {{ $user->jurusan_id == $jurusan->id ? 'selected' : '' }}>
                            {{ $jurusan->nama_jurusan }}
                        </option>
                    @endforeach
                </select>
            </div>
        @elseif ($user->role == 'guru')
            {{-- Guru Form --}}
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" name="nip" id="nip" class="form-control" value="{{ old('nip', $user->nip) }}">
            </div>
        @elseif ($user->role == 'instansi')
            {{-- Instansi Form --}}
            <div class="mb-3">
                <label for="instansi_name" class="form-label">Nama Instansi</label>
                <input type="text" name="instansi_name" id="instansi_name" class="form-control" value="{{ old('instansi_name', $user->instansi_name) }}">
            </div>
            <div class="mb-3">
                <label for="instansi_address" class="form-label">Alamat Instansi</label>
                <input type="text" name="instansi_address" id="instansi_address" class="form-control" value="{{ old('instansi_address', $user->instansi_address) }}">
            </div>
            <div class="mb-3">
                <label for="instansi_contact" class="form-label">Kontak Instansi</label>
                <input type="text" name="instansi_contact" id="instansi_contact" class="form-control" value="{{ old('instansi_contact', $user->instansi_contact) }}">
            </div>
        @endif

        {{-- Foto Profile --}}
        <div class="mb-3">
            <label for="foto_profile" class="form-label">Foto Profil</label>
            @if ($user->foto_profile)
                <div class="mb-2">
                    <img src="{{ asset('assets/img/foto_profile/' . $user->foto_profile) }}" alt="Foto Profil" width="150">
                </div>
            @endif
            <input type="file" name="foto_profile" id="foto_profile" class="form-control">
        </div>

        <a href="{{ $user->role == 'siswa' ? route('list.siswa') : ($user->role == 'guru' ? route('list.guru') : ($user->role == 'instansi' ? route('list.pembimbing.instansi') : '#')) }}" 
        class="btn btn-primary">
        Back
        </a>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>


          </div>
      </div>
  @endsection
@section('script')


@endsection