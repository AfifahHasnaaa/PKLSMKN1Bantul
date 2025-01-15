@extends('layout')
@section('title')
    <title>Update Jurnal Harian</title>
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
        <h1>Isi Indikator</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('show.jurnal',['id' => $indikator->id_jurnal]) }}">Jurnal Harian</a></li>
                <li class="breadcrumb-item active">Update Jurnal Harian</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Isi Indikator</h5>
            <form action="{{ route('indikator.isi.update', ['id' => $indikator->id]) }}" method="POST">
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
