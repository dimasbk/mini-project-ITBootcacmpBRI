@extends('layouts.dashboard')

@section('content')
    <div class="adminx-content">
        <div class="adminx-main-content">
            <div class="container-fluid">
                <!-- BreadCrumb -->
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb adminx-page-breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Riwayat</li>
                    </ol>
                </nav>

                <div class="pb-3">
                    <h1>Data Riwayat</h1>
                </div>
                <div class="card text-center">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <nav class="card-header-actions">
                            <a class="card-header-action" data-toggle="collapse" href="#card1" aria-expanded="false"
                                aria-controls="card1">
                                <i data-feather="minus-circle"></i>
                            </a>
                        </nav>
                    </div>
                    <div class="card-body collapse show" id="card1">
                        <table id="table" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID Asisten</th>
                                    <th scope="col">Materi</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Teaching Role</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Start</th>
                                    <th scope="col">End</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">ID Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absensi as $data)
                                    <tr>
                                        <td>{{ $data->id_asisten }}</td>
                                        <td>{{ $data->materi->materi }}</td>
                                        <td>{{ $data->kelas->nama_kelas }}</td>
                                        <td>{{ $data->teaching_role }}</td>
                                        <td>{{ $data->date }}</td>
                                        <td>{{ $data->start }}</td>
                                        <td>{{ $data->end }}</td>
                                        <td>{{ $data->duration }} min</td>
                                        <td>{{ $data->id_code }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $absensi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.styles')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css" />
@endsection

@extends('layouts.scripts')
@section('script')
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
@endsection
