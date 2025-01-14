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
        <h1>Input Nilai Indikator</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="user.html">Home</a></li>
                <li class="breadcrumb-item">Indikator</li>
                <li class="breadcrumb-item active">Edit Indikator</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Indikator</h5>
            <form action="{{ route('indikator.update.skor', ['id' => $indikator->id]) }}" method="POST">
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

                <!-- Deskripsi -->
                <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" placeholder="Masukkan deskripsi" required>{{ old('deskripsi', $indikator->deskripsi) }}</textarea>
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
