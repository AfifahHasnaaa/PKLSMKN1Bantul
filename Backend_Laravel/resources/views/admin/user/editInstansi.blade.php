@extends('layout')

@section('title')
    <title>Edit Instansi - Admin</title>
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
        <h1>Edit Instansi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="user.html">Home</a></li>
                <li class="breadcrumb-item">Instansi</li>
                <li class="breadcrumb-item active">Edit Instansi</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Instansi</h5>
            <form action="{{ route('instansi.update', $instansi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Common Fields -->
                <div id="commonFields">
                    <div class="row mb-3">
                        <label for="inputUsername" class="col-sm-2 col-form-label">Nama Instansi</label>
                        <div class="col-sm-10">
                            <input type="text" id="inputUsername" name="instansi_name" class="form-control"
                                placeholder="Enter your Instansi name" value="{{ old('instansi_name', $instansi->instansi_name) }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputAddress" class="col-sm-2 col-form-label">Alamat Instansi</label>
                        <div class="col-sm-10">
                            <input type="text" id="inputAddress" name="instansi_address" class="form-control"
                                placeholder="Enter your instansi address" value="{{ old('instansi_address', $instansi->instansi_address) }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputContact" class="col-sm-2 col-form-label">Kontak Instansi</label>
                        <div class="col-sm-10">
                            <input type="text" id="inputContact" name="instansi_contact" class="form-control"
                                placeholder="Enter your instansi contact" value="{{ old('instansi_contact', $instansi->instansi_contact) }}" required>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <a href="{{ route('list.instansi') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update Instansi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')

@endsection
