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
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card text-center">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <nav class="card-header-actions">
                            <a class="card-header-action" data-toggle="collapse" href="#card1" aria-expanded="false"
                                aria-controls="card1">
                                <i data-feather="minus-circle"></i>
                            </a>
                        </nav>
                    </div>
                    <a href="{{ route('create-materi') }}" type="button" class="btn btn-primary">+ Buat Data Baru</a>
                    <div class="card-body collapse show" id="card1">
                        <table id="table" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Materi</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materi as $m)
                                    <tr>
                                        <td>{{ $m->id }}</td>
                                        <td>{{ $m->materi }}</td>
                                        <td>
                                            <a type="button" href="{{ route('edit-materi', ['id' => $m->id]) }}"
                                                class="btn btn-primary mr-2">Edit</a>
                                            <button class="btn btn-danger delete-btn"
                                                data-id="{{ $m->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $materi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    var materiId = button.dataset.id;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If user confirms, perform the delete action
                            axios.post(
                                    '{{ route('delete-materi') }}', {
                                        id: materiId,
                                        _token: '{{ csrf_token() }}'
                                    })
                                .then(function(response) {
                                    // If delete action is successful, show success message and reload the page
                                    Swal.fire(
                                        'Deleted!',
                                        'Your data has been deleted.',
                                        'success'
                                    ).then((result) => {
                                        location.reload();
                                    });
                                })
                                .catch(function(error) {
                                    Swal.fire(
                                        'Error!',
                                        'Failed to delete data. Please try again later.',
                                        'error'
                                    );
                                });
                        }
                    });
                });
            });
        });
    </script>
@endsection

@extends('layouts.styles')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css" />
@endsection
