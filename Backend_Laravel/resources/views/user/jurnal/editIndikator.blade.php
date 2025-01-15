@extends('layout')
@section('title')
    <title>Edit Indikator - Admin</title>
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
        <h1>Edit Indikator</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('semua.siswa') }}">List Semua Siswa</a></li>
                <li class="breadcrumb-item"><a href="{{ route('show.jurnal',['id' => $indikator->id_jurnal]) }}">Jurnal</a></li>
                <li class="breadcrumb-item active">Edit Indikator</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Indikator</h5>
            <form action="{{ route('indikator.update', ['id' => $indikator->id]) }}" method="POST">
                @csrf
                @method('PUT') <!-- Method Override for PUT request -->
                
                <!-- Indikator -->
                <div class="row mb-3">
                    <label for="indikator" class="col-sm-2 col-form-label">Indikator</label>
                    <div class="col-sm-10">
                        <input type="text" id="indikator" name="indikator" class="form-control"
                            placeholder="Masukkan indikator pembelajaran" value="{{ old('indikator', $indikator->indikator) }}" required>
                    </div>
                </div>

                {{-- <!-- Deskripsi -->
                <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" placeholder="Masukkan deskripsi" required>{{ old('deskripsi', $indikator->deskripsi) }}</textarea>
                    </div>
                </div>

                <!-- Status -->
                <div class="row mb-3">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select id="status" name="status" class="form-control" required>
                            <option value="sudah" {{ old('status', $indikator->status) == 'sudah' ? 'selected' : '' }}>Sudah</option>
                            <option value="belum" {{ old('status', $indikator->status) == 'belum' ? 'selected' : '' }}>Belum</option>
                        </select>
                    </div>
                </div>

                <!-- Skor -->
                <div class="row mb-3">
                    <label for="skor" class="col-sm-2 col-form-label">Skor</label>
                    <div class="col-sm-10">
                        <input type="number" id="skor" name="skor" class="form-control"
                            placeholder="Masukkan skor" value="{{ old('skor', $indikator->skor) }}" required>
                    </div>
                </div>

                <!-- Tanggal Submit -->
                <div class="row mb-3">
                    <label for="tanggal_submit" class="col-sm-2 col-form-label">Tanggal Submit</label>
                    <div class="col-sm-10">
                        <input type="date" id="tanggal_submit" name="tanggal_submit" class="form-control" value="{{ old('tanggal_submit', $indikator->tanggal_submit->toDateString()) }}" required>
                    </div>
                </div> --}}

                <!-- Submit Button -->
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <a href="{{ route('show.jurnal',['id' => $indikator->id_jurnal]) }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
