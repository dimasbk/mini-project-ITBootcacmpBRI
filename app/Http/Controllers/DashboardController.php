<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Materi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $materi = Materi::all();
        $kelas = Kelas::all();
        $absensi = $this->isCheckedIn();

        return view('home', compact(['materi', 'kelas', 'absensi']));
    }

    public function isCheckedIn()
    {
        $today = Carbon::today()->toDateString();
        $absensi = Absensi::where('date', $today)
            ->where('id_asisten', Auth::user()->id_asisten)
            ->where('end', null)
            ->where('duration', null)->first();

        return $absensi;
    }
}
