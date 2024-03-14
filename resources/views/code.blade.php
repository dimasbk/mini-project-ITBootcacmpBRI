@extends('layouts.dashboard')

@section('content')
    <div class="adminx-content">
        <div class="adminx-main-content">
            <div class="container-fluid">
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb adminx-page-breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Materi</li>
                    </ol>
                </nav>

                <div class="pb-3">
                    <h1>Codes Table</h1>
                </div>
                <div class="card mt-4">
                    <button id="button-code" class="btn btn-primary">Generate</button>
                    <div class="card-header">
                        <h3 class="card-title">Codes Table</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Code</th>
                                    <th>Created By</th>
                                    <th>Received By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($codes as $code)
                                    <tr>
                                        <td>{{ $code->id }}</td>
                                        <td>{{ $code->code }}</td>
                                        <td>{{ $code->createdBy->name }} ({{ $code->user_id }})</td>
                                        <td>{{ $code->receivedBy ? $code->receivedBy->name : 'N/A' }}
                                            ({{ $code->user_id_get }})
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $codes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#button-code').click(function() {
                axios.get('/code/generate')
                    .then(function(response) {
                        Swal.fire({
                            title: "Code Berhasil Generate!",
                            text: response.data[0],
                            icon: "success"
                        }).then(function() {
                            location.reload();
                        });
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            });
        });
    </script>
@endsection

@section('script')
    <!-- Include any scripts needed for this page -->
@endsection

@section('style')
    <!-- Include any styles needed for this page -->
@endsection
