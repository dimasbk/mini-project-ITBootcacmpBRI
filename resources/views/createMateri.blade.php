@extends('layouts.dashboard')

@section('content')
<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb adminx-page-breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Materi</li>
                </ol>
            </nav>

            <div class="pb-3">
                <h1>Data Materi</h1>
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
                    <form method="POST" action="{{ route('store-materi') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="materi">Materi</label>
                            <input type="text" class="form-control @error('materi') is-invalid @enderror" id="materi"
                                name="materi" value="{{ old('materi') }}">
                            @error('materi')
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