@extends('layout')
@section('title')
    <title>Tambah Nilai - Admin</title>
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
        <h1>Tambah Nilai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="user.html">Home</a></li>
                <li class="breadcrumb-item">Nilai</li>
                <li class="breadcrumb-item active">Tambah Nilai</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Buat Nilai</h5>
            <form action="{{ route('nilai.store', ['id' => $id]) }}" method="POST">
                @csrf

                <!-- Nilai Laporan -->
                <div class="row mb-3">
                    <label for="nilai_laporan" class="col-sm-2 col-form-label">Nilai Laporan</label>
                    <div class="col-sm-10">
                        <input type="number" id="nilai_laporan" name="nilai_laporan" class="form-control"
                            placeholder="Masukkan nilai laporan (0-100)" min="0" max="100" required>
                    </div>
                </div>

                <!-- Nilai Presentasi -->
                <div class="row mb-3">
                    <label for="nilai_presentasi" class="col-sm-2 col-form-label">Nilai Presentasi</label>
                    <div class="col-sm-10">
                        <input type="number" id="nilai_presentasi" name="nilai_presentasi" class="form-control"
                            placeholder="Masukkan nilai presentasi (0-100)" min="0" max="100" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan Nilai</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
@endsection
