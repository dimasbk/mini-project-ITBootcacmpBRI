@extends('layouts.dashboard')

@section('content')
    <div class="adminx-content">
        <div class="adminx-main-content">
            <div class="container-fluid">
                <!-- BreadCrumb -->
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb adminx-page-breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>

                <div class="pb-3">
                    <h1>Dashboard</h1>
                </div>
                <div class="row">
                    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'PJ' || Auth::user()->role == 'Staff')
                        <div class="col-lg-6">
                            <div class="card text-center">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div class="card-header-title">
                                        Generate Code
                                    </div>
                                    <nav class="card-header-actions">
                                        <a class="card-header-action" data-toggle="collapse" href="#card1"
                                            aria-expanded="false" aria-controls="card1">
                                            <i data-feather="minus-circle"></i>
                                        </a>
                                    </nav>
                                </div>
                                <div class="card-body collapse show" id="card1">
                                    <h4 class="card-title">
                                        Klik Disini Untuk Generate Code
                                    </h4>
                                    <button id="button-code" class="btn btn-primary">Generate</button>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">Absen</div>
                            <div class="card-body">
                                <h2 class="card-title text-center">
                                    Selamat Datang {{ Auth::user()->name }}!
                                </h2>
                                <h2 id="clock" class="text-center"></h2>
                                @php
                                    use Carbon\Carbon;
                                    $date = Carbon::now()->isoFormat('dddd, D MMMM YYYY');
                                @endphp
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
                                <h2 class="text-center">{{ $date }}</h2>
                                <form action="{{ route('check-in') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="id_asisten">ID Asisten</label>
                                        <input type="text" name="id_asisten" id="id_asisten" class="form-control"
                                            value="{{ Auth::user()->id_asisten }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <select name="id_kelas" id="id_kelas" class="form-control"
                                            @if ($absensi) disabled @endif>
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="materi">Materi</label>
                                        <select name="id_materi" id="id_materi" class="form-control"
                                            @if ($absensi) disabled @endif>
                                            @foreach ($materi as $m)
                                                <option value="{{ $m->id }}">{{ $m->materi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="teaching_role">Peran jaga</label>
                                        <select name="teaching_role" id="teaching_role" class="form-control"
                                            @if ($absensi) disabled @endif>
                                            <option value="Ketua">Ketua</option>
                                            <option value="Tutor">Tutor</option>
                                            <option value="Asisten Baris">Asisten Baris</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_code">Kode Absen</label>
                                        <input type="string" name="id_code" id="id_code" class="form-control"
                                            @if ($absensi) readonly @endif>
                                    </div>
                                    @if (!$absensi)
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary">Absen</button>
                                        </div>
                                    @endif
                                </form>
                                @if ($absensi)
                                    <div class="form-group text-center">
                                        <a href="{{ route('check-out') }}" type="button"
                                            class="btn btn-success">Checkout</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function updateClock() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();

                hours = hours < 10 ? '0' + hours : hours;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;

                $('#clock').text(hours + ':' + minutes + ':' + seconds);
            }

            setInterval(updateClock, 1000);

            updateClock();
            $('#button-code').click(function() {
                axios.get('/code/generate')
                    .then(function(response) {
                        console.log()
                        Swal.fire({
                            title: "Code Berhasil Generate!",
                            text: response.data[0],
                            icon: "success"
                        });
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            });
        });
    </script>
@endsection

@extends('layouts.styles')
@section('style')
@endsection

@extends('layouts.scripts')
@section('script')
@endsection
