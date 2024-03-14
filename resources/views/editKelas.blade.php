@extends('layouts.dashboard')

@section('content')
    <div class="adminx-content">
        <div class="adminx-main-content">
            <div class="container-fluid">
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb adminx-page-breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Kelas</li>
                    </ol>
                </nav>

                <div class="pb-3">
                    <h1>Edit Kelas</h1>
                </div>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <nav class="card-header-actions">
                            <a class="card-header-action" data-toggle="collapse" href="#card1" aria-expanded="false"
                                aria-controls="card1">
                                <i data-feather="minus-circle"></i>
                            </a>
                        </nav>
                    </div>
                    <div class="card-body collapse show" id="card1">
                        <form method="post" action="{{ route('update-kelas', ['id' => $kelas->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" class="form-control @error('jurusan') is-invalid @enderror"
                                    id="jurusan" name="jurusan" value="{{ $kelas->jurusan }}">
                                @error('jurusan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="fakultas">Fakultas</label>
                                <input type="text" class="form-control @error('fakultas') is-invalid @enderror"
                                    id="fakultas" name="fakultas" value="{{ $kelas->fakultas }}">
                                @error('fakultas')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tingkat">Tingkat</label>
                                <input type="text" class="form-control @error('tingkat') is-invalid @enderror"
                                    id="tingkat" name="tingkat" value="{{ $kelas->tingkat }}">
                                @error('tingkat')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_kelas">Nama Kelas</label>
                                <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror"
                                    id="nama_kelas" name="nama_kelas" value="{{ $kelas->nama_kelas }}">
                                @error('nama_kelas')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Include any scripts needed for this page -->
@endsection

@section('style')
    <!-- Include any styles needed for this page -->
@endsection
