<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mapel;
use App\Models\Guru;
use App\Models\Kehadiran;
class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agenda';

    protected $hidden = ['id_mapel','id_guru','id_jadwal'];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class,'id_mapel');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class,'id_guru');
    }

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class,'id_agenda');
    }
    
}
