<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Jam;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $hidden = ['id_kelas','id_jam'];


    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'id_kelas');
    }
    public function jam()
    {
        return $this->belongsTo(Jam::class,'id_kelas');
    }
}
