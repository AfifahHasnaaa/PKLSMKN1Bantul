@extends('layout')
@section('title')
    <title>Edit Jurnal - Admin</title>
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
        <h1>Edit Jurnal</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="user.html">Home</a></li>
                <li class="breadcrumb-item">Jurnal</li>
                <li class="breadcrumb-item active">Edit Jurnal</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Jurnal</h5>
            <form action="{{ route('update.jurnal', $jurnal->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- Method untuk update data --}}

                <!-- Relasi ke Model User (Siswa) -->
                <div class="row mb-3">
                    <label for="id_siswa" class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-10">
                          <select id="id_siswa" name="id_siswa" class="form-control" required>
                                  <!-- Pastikan variabel $siswa di-passing dari controller -->
                                  <option value="{{ $siswa->id }}">{{ $siswa->name }}</option>
                          </select>
                      </div>
                </div>

                <!-- Relasi ke Model User (Guru) -->
                <div class="row mb-3">
                    <label for="id_guru" class="col-sm-2 col-form-label">Nama Guru</label>
                    <div class="col-sm-10">
                        <select id="id_guru" name="id_guru" class="form-control" required>
                            <option value="" disabled>Pilih Guru</option>
                            @foreach ($guru as $g)
                                <option value="{{ $g->id }}" {{ $g->id == $jurnal->id_guru ? 'selected' : '' }}>
                                    {{ $g->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Relasi ke Model Instansi -->
                <div class="row mb-3">
                    <label for="id_instansi" class="col-sm-2 col-form-label">Nama Instansi</label>
                    <div class="col-sm-10">
                        <select id="id_instansi" name="id_instansi" class="form-control" required>
                            <option value="" disabled>Pilih Instansi</option>
                            @foreach ($instansi as $i)
                                <option value="{{ $i->id }}" {{ $i->id == $jurnal->id_instansi ? 'selected' : '' }}>
                                    {{ $i->instansi_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Durasi Magang -->
                <div class="row mb-3">
                    <label for="durasi_magang" class="col-sm-2 col-form-label">Durasi Magang (Bulan)</label>
                    <div class="col-sm-10">
                        <input type="number" id="durasi_magang" name="durasi_magang" class="form-control"
                            placeholder="Masukkan durasi magang"
                            value="{{ old('durasi_magang', $jurnal->durasi_magang) }}" required>
                    </div>
                </div>

                <!-- Posisi Magang -->
                <div class="row mb-3">
                    <label for="posisi_magang" class="col-sm-2 col-form-label">Posisi Magang</label>
                    <div class="col-sm-10">
                        <input type="text" id="posisi_magang" name="posisi_magang" class="form-control"
                            placeholder="Masukkan posisi magang"
                            value="{{ old('posisi_magang', $jurnal->posisi_magang) }}" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
@endsection
