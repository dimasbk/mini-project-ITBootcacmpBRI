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
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-success">
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
                    <a href="{{ route('create-asisten') }}" type="button" class="btn btn-primary">+ Buat Data Baru</a>
                    <div class="card-body collapse show" id="card1">
                        <table id="table" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID Asisten</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Join Date</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id_asisten }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a type="button" href="{{ route('edit-asisten', ['id' => $user->id]) }}"
                                                class="btn btn-primary mr-2">Edit</a>
                                            <button class="btn btn-danger delete-btn"
                                                data-id="{{ $user->id }}">Delete</button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle click event of delete button
        var deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent the default action

                // Get the ID of the user to delete
                var userId = button.dataset.id;

                // Show the confirmation modal
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
                        axios.post(
                                '{{ route('delete-asisten') }}', {
                                    id: userId,
                                    _token: '{{ csrf_token() }}'
                                })
                            .then(function(response) {
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


@extends('layouts.styles')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css" />
@endsection

@extends('layouts.scripts')
@section('script')
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
@endsection
