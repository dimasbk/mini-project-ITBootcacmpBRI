@extends('layouts.dashboard')

@section('content')
    <div class="adminx-content">
        <div class="adminx-main-content">
            <div class="container-fluid">
                <!-- BreadCrumb -->
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb adminx-page-breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Asisten</li>
                    </ol>
                </nav>

                <div class="pb-3">
                    <h1>Data Asisten</h1>
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
                        <form method="POST" action="{{ route('store-asisten') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="id_asisten">ID Asisten</label>
                                <input type="text" class="form-control @error('id_asisten') is-invalid @enderror"
                                    id="id_asisten" name="id_asisten" value="{{ old('id_asisten') }}">
                                @error('id_asisten')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role">Roles</label>
                                <select class="form-control @error('role') is-invalid @enderror" id="role"
                                    name="role">
                                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Staff" {{ old('role') == 'Staff' ? 'selected' : '' }}>Staff</option>
                                    <option value="PJ" {{ old('role') == 'PJ' ? 'selected' : '' }}>PJ</option>
                                    <option value="Asisten" {{ old('role') == 'Asisten' ? 'selected' : '' }}>Asisten
                                    </option>
                                </select>
                                @error('role')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control-file @error('photo') is-invalid @enderror"
                                    id="photo" name="photo">
                                @error('photo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password">
                                @error('password')
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

<script>
    let table = new DataTable('#table');
</script>

@extends('layouts.styles')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css" />
@endsection

@extends('layouts.scripts')
@section('script')
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
@endsection
