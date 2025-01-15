@extends('layout')
@section('title')
    <title>Tambah Indikator - Admin</title>
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
        <h1>Tambah Indikator</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('semua.siswa') }}">List Semua Siswa</a></li>
                <li class="breadcrumb-item"><a href="{{ route('show.jurnal',['id' => $jurnal->id]) }}">Jurnal</a></li>
                <li class="breadcrumb-item active">Tambah Indikator</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Buat Indikator</h5>
            <form action="{{ route('indikator.store',['id' => $jurnal->id]) }}" method="POST">
                @csrf
                <!-- Indikator -->
                <div class="row mb-3">
                    <label for="indikator" class="col-sm-2 col-form-label">Indikator</label>
                    <div class="col-sm-10">
                        <input type="text" id="indikator" name="indikator" class="form-control"
                            placeholder="Masukkan indikator pembelajaran" required>
                    </div>
                </div>

                <!-- Deskripsi -->
                {{-- <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3"
                            placeholder="Masukkan deskripsi" required></textarea>
                    </div>
                </div> --}}

                <!-- Status -->
                <input type="hidden" id="status" name="status" class="form-control"
                            placeholder="Masukkan status" value="Belum" required>

                <!-- Skor -->
                        <input type="hidden" id="skor" name="skor" class="form-control"
                            placeholder="Masukkan skor" value="0" required>


                <!-- Submit Button -->
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <a href="{{ route('show.jurnal',['id' => $jurnal->id]) }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Tambah Indikator</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
@endsection
