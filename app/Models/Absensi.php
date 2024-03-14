<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = "absensi";
    protected $primaryKey = "id";
    protected $fillable = ['id_asisten', 'id_materi', 'id_kelas', 'teaching_role', 'date', 'start', 'end', 'duration', 'id_code'];

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'id_materi', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
}
