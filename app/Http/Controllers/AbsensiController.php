<?php

namespace App\Http\Controllers;

use App\Exports\ReportExport;
use App\Models\Absensi;
use App\Models\Code;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function absensi(Request $request)
    {
        $validatedData = $request->validate([
            'id_asisten' => 'required',
            'id_kelas' => 'required',
            'id_materi' => 'required',
            'teaching_role' => 'required',
            'id_code' => 'required',
        ]);

        $code = Code::where('code', $validatedData['id_code'])->first();
        if ($code) {
            if (Auth::user()->id != $code->user_id) {
                $code->update([
                    'user_id_get' => Auth::user()->id
                ]);
            } else {
                return redirect()->back()->with('error', 'Tidak boleh menggunakan code generate sendiri!');
            }
        } else {
            return redirect()->back()->with('error', 'Code Invalid!');
        }
        $date = Carbon::today()->toDateString();
        $start = Carbon::now()->toTimeString();

        $absen = Absensi::create([
            'id_asisten' => $validatedData['id_asisten'],
            'id_materi' => $validatedData['id_materi'],
            'id_kelas' => $validatedData['id_kelas'],
            'teaching_role' => $validatedData['teaching_role'],
            'date' => $date,
            'start' => $start,
            'id_code' => $validatedData['id_code']
        ]);
        if ($absen) {
            return redirect()->route('dashboard')->with('success', 'Berhasil Absen!');
        }
        return redirect()->back()->with('error', 'Gagal Absen.');
    }

    public function checkout()
    {
        $today = Carbon::today()->toDateString();
        $absen = Absensi::where('date', $today)->where('end', null)->where('duration', null)->first();
        $end = Carbon::now()->toTimeString();
        $duration = Carbon::parse($end)->diffInMinutes(Carbon::parse($absen->start));
        $absen->update([
            'end' => $end,
            'duration' => $duration
        ]);

        return redirect()->route('dashboard')->with('success', 'Checkout Berhasil.');

    }

    public function riwayat()
    {
        $absensi = Absensi::where('id_asisten', Auth::user()->id_asisten)->paginate(10);
        return view('riwayat', compact('absensi'));
    }

    public function report()
    {
        $start = null;
        $end = null;
        $absensi = Absensi::paginate(10);
        return view('report', compact('absensi', 'start', 'end'));
    }

    public function reportPeriod(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $absensi = Absensi::whereBetween('created_at', [$request->start, $request->end])->paginate(10);
        return view('report', compact('absensi', 'start', 'end'));
    }

    public function exportExcel(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $now = Carbon::today()->toDateString();
        return(new ReportExport($start, $end))->download("reports_{$now}.xlsx");
    }
}
