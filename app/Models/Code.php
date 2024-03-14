<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    protected $table = "codes";
    protected $primaryKey = "id";
    protected $fillable = ['code', 'user_id', 'user_id_get'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function receivedBy()
    {
        return $this->belongsTo(User::class, 'user_id_get', 'id');
    }
}
