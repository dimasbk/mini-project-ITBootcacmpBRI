@extends('layouts.dashboard')

@section('content')
    <div class="adminx-content">
        <div class="adminx-main-content">
            <div class="container-fluid">
                <!-- BreadCrumb -->
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb adminx-page-breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Report</li>
                    </ol>
                </nav>

                <div class="pb-3">
                    <h1>Data Report</h1>
                </div>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <form action="{{ route('reportPeriod') }}" method="get" class="form-inline">
                            <div class="form-group mr-2">
                                <label for="start_date" class="mr-2">Start Date:</label>
                                <input type="date" class="form-control" id="start" name="start"
                                    value="{{ $start }}" required>
                            </div>
                            <div class="form-group mr-2">
                                <label for="end_date" class="mr-2">End Date:</label>
                                <input type="date" class="form-control" id="end" name="end"
                                    value="{{ $end }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <form action="{{ route('reportExport') }}" method="get" class="form-inline">
                            <div class="form-group mr-2">
                                <input type="hidden" id="start" name="start" value="{{ $start }}" required>
                            </div>
                            <div class="form-group mr-2">
                                <input type="hidden" id="end" name="end" value="{{ $end }}" required>
                            </div>
                            <button type="submit" class="btn btn-success">Export</button>
                        </form>

                    </div>
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
                                    <td>{{ $data->duration }} Min</td>
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
