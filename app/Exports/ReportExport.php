<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ReportExport implements FromQuery
{
    use Exportable;

    protected $start;
    protected $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function query()
    {
        $query = Absensi::query()
            ->with(['materi', 'kelas']);

        if ($this->start && $this->end) {
            $query->whereBetween('created_at', [$this->start, $this->end]);
        } else {
            $start = Absensi::min('created_at');
            $end = Absensi::max('created_at');
            $query->whereBetween('created_at', [$start, $end]);
        }

        return $query;
    }

    public function map($absensi): array
    {
        return [
            $absensi->materi->materi,
            $absensi->kelas->nama_kelas,
            $absensi->teaching_role,
            $absensi->date,
            $absensi->start,
            $absensi->end,
            $absensi->duration,
            $absensi->id_code,
        ];
    }

    public function headings(): array
    {
        return [
            'Materi',
            'Nama Kelas',
            'Teaching Role',
            'Date',
            'Start',
            'End',
            'Duration',
            'ID Code',
        ];
    }
}
