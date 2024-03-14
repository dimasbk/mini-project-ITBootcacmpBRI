<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReportExport implements FromQuery, WithHeadings, WithMapping
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

        return $query->with('materi')->with('kelas');
    }

    public function headings(): array
    {
        return [
            'ID',
            'ID Asisten',
            'Materi',
            'Nama Kelas',
            'Teaching Role',
            'Date',
            'Start',
            'End',
            'Duration',
            'ID Code',
            'Data Created',
            'Data Updated'
        ];
    }
    public function map($absensi): array
    {
        return [
            $absensi->id,
            $absensi->id_asisten,
            $absensi->materi->materi,
            $absensi->kelas->nam_kelas,
            $absensi->teaching_role,
            $absensi->date,
            $absensi->start,
            $absensi->end,
            strval($absensi->duration),
            $absensi->id_code,
            $absensi->created_at,
            $absensi->updated_at,
        ];
    }
}
